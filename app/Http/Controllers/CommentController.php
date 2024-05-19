<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Codeblog;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Codeblog $blog){
        $body=request()->validate([
            'body'=>['required','min:3']
        ],[
            'body.required'=>'COmment yay lay',
            'body.min'=>'blog content is needmore!'
        ]);
        $blog->comment()->create(['user_id'=>auth()->id(),'body'=>request('body')]);
        $subscribermail=$blog->subscriber->filter(function($subscriber){
          return $subscriber->id!=auth()->id();
        });
        $subscribermail->each(function($subscriber)use($blog){
                 Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blog/'.$blog->slug);
    }
}
