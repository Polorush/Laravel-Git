<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


	class CommentsController extends Controller
	{

		public function admin() 
		{

	        $comments = Comment::all();
	        return view('comments.admin', compact('comments'));
    	}

	    public function store(Article $article)
	    {
	        $article->addComment(request('body'));

	        return back();
	    }

	    public function create(Request $request, $id) {

	    	$this->validate($request, array(
            	'body'=> 'required'
        	));

        $article = Article::find($id);
        $comments = new Comment();
        $comments->user_id = Auth::user()->id;
        $comments->article_id = $article->id;
        $comments->body = $request->body;

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $comments->image = $filename;
        }

        $comments->article()->associate($article);
        $comments->save();
        return redirect()->route('article.show', [$article->id])->with('success', 'Commentaire ajouté');
    }

	}