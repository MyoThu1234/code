<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article =Article::latest()->paginate(5);
        return view('article.index', [
            'articles' => $article
        ]);
    }

    public function view()
    {
        return view('article.create');
    }

    public function create()
    {

        $img = request()->file('image')->getClientOriginalName();
        $article = new Article();
        $article->date = date("F j\, Y\,h:i A");
        $article->content = request()->content;
        $article->image = $img;
        $article->user_id = auth()->user()->id;
        $article->category_id =request()->category_id;
        request()->image->move(public_path('files'),$img);
        $article->save();
        return back();
    }

    public function edit($id)
    {
       $article = Article::find($id);
       return view('comment.index', [ 'articles' => $article]);

    }

    public function show($id){
        $category = Category::find($id);
        return view('category.index', ['categories' => $category]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if($article->user_id == auth()->user()->id){
            $article->delete();
            return back()->with('done', 'Delete Successfully');
        }else{
            return back()->with('article-delete', "{$article->user->name} You can't delete");
        }
    }
}
