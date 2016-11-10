<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getDashboardComments($user_id)
    {

        $articles = Article::where('user_id', '=', $user_id)->get();

        $comments = [];

        foreach ($articles as $article) {

            $article_comments = Comment::where('article_id', '=', $article->id)->get();
            foreach ($article_comments as $comment) {

                /** @var Comment $comment */
                $comments[] = [

                    'author' => $comment->getAuthor()->name,
                    'comment' => $comment->comment,
                    'created' => $comment->created_at,
                    'article' => $article->title,
                    'link' => '/pages/' . $article->slug


                ];

            }

        }

        return $comments;

    }
}
