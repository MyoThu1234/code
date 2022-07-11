<?php

namespace App\Http\Controllers;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($article_id)
    {

        $like = Like::where('article_id', $article_id)->where('user_id', auth()->user()->id)->first();
        //return $like;

        if($like){
            $like->delete();
            return back();
        }else{
            Like::create([
                'article_id' => $article_id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }

        //print_r(auth()->user()->id);

        // $data = Like::all()->where('user_id',$request->id);
        // foreach($data as $aa){
        //     //return $aa->user_id;
        //      if(!isset($aa->user_id )){
        //         return back();
        //      }
        //      else
        //      {
        //              $like = new Like();
        //              $like->article_id = request()->article_id;
        //              $like->user_id = auth()->user()->id;
        //              $like->save();
        //              return back();
        //      }
      //  }

     // $data = Like::all()->where('user_id',$request->id);
           // echo auth()->user()->id;
           //$a =32;
        // if(empty(auth()->user()->id)){
        //         $like = new Like();
        //         $like->article_id = request()->article_id;
        //         $like->user_id = auth()->user()->id;
        //         $like->save();
        //         return back();
        // }
        // else {
        //     return back();
        // }

    }
}
