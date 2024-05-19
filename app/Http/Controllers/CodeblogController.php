<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Codeblog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodeblogController extends Controller
{
    public function index() {
        return view('codeblog.index',[
            'blogs'=>Codeblog::latest()->filter(request(['search','author','category']))
            
            ->paginate(3)
            ->withQueryString(),   
        ]);
    }

    public function blog_edit(Codeblog $blog){
        return view('authdata.blog_edit',[
            'blog'=>$blog,
            'category'=>Category::all()
        ]);
    }

   public function show(Codeblog $blog){
        return view('codeblog.blog',[
            'blog'=>$blog,
            
        ]);
    }

    public function subscribe(Codeblog $blog){
        if(User::find(auth()->id())->isSubscribe($blog)){
            $blog->subscriber()->detach(auth()->id());
        }else{
                $blog->subscriber()->attach(auth()->id());
            }
       return back();   
    }

    public function edit(){
        return view('authdata.edit-blog',[
            'blog'=>Codeblog::latest()->get(),
        ]);
    }

    public function destory(Codeblog $blog){
        $blog->delete();
        return back();
    }

    public function update(Codeblog $blog){
        $photo=request()->file('photo')?request()->file('photo')->store('photo'):$blog->photo;
        $data=request()->validate([
            'title'=>['required'],
            'slug'=>['required',Rule::unique('codeblogs','slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
            ]);
            $data['user_id']=auth()->id();
            $data['photo']=$photo;
            $blog->update($data);
            return redirect('/');
    }

}
