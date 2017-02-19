<?php

namespace App;

class Comment extends Model
{
    // $comment->article;

    public function post(){
        return $this->belongsTo(Article::class);
    }

}
