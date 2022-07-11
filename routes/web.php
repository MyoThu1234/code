<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/test', function(){
    $faker = Faker\Factory::create();
    for($i = 0; $i < 1; $i++){
        print_r($faker->text($maxNbChars = 24)."<br>");
        // print_r($faker->dayOfWeek() ."<br>");
        // //print_r($faker->timezone()."<br>");
        //print_r($faker->time($format = 'H:i')."<br>");
        //print_r($faker->imageUrl($width = 640, $height = 480) );
        // print_r($faker->amPm());
       // print_r($faker->name);
    }
});

// Article Route
Route::get('/', [ArticleController::class, 'index']);
Route::get('/article/add', [ArticleController::class, 'view']);
Route::post('/article/add', [ArticleController::class, 'create']);
Route::get('/article/delete/{id}', [ArticleController::class, 'delete']);
Route::get('/comment/{id}', [ArticleController::class, 'edit']);
Route::post('/comment', [CommentController::class, 'store']);
Route::get('/comment/delete/{id}', [CommentController::class, 'destory']);

Route::get('/hello/{id}', function($id){
    $comment = Comment::find($id);
    foreach($comment as $data){
        return $data->article;
    }
});

Route::get('/category/{id}', [ArticleController::class, 'show'] );
Route::post('/like/{id}', [LikeController::class, 'store']);

Route::get('/test', function(){
    $like = Like::all();
    foreach($like as $data){
        echo (count($data->user));
        // if($data->user['id'] == 1){
        //     print_r($data->user['name']);
        // }
    }
});

