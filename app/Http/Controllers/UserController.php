<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Codeblog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('authdata.register');
    }

    public function blog_create(){
        $photo=request()->file('photo')->store('photo');
        $data=request()->validate([
            'title'=>['required'],
            'slug'=>['required',Rule::unique('codeblogs','slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
            ]);
            $data['user_id']=auth()->id();
            $data['photo']=$photo;
            Codeblog::create($data);
            return redirect('/');
    }

    public function store(){
       $createdata= request()->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password'=>['required']
        ],[
           'name.required'=>'enter your username',
           'email.required'=>'enter your email',
           'password'=>'enter yor password' 
        ]);
         $user=User::create($createdata);
         auth()->login($user);
        return redirect('/')->with('success','Welcome '.$user->name);
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }

    public function login(){
        return view('authdata.login');

    }

    public function post_login(){
       $userdata = request()->validate([
            'email'=>['required',Rule::exists('users','email')],
            'password'=>['required','min:3']
        ]);
       if(auth()->attempt($userdata)){
        $user=auth()->user();
        return redirect('/')->with('success','Welcome Back '.$user->name);
       }else{
        return redirect()->back()->withErrors([
            'password'=>'your email or password is wrong !'
        ]);
       }
    }

    public function admin(){
        if(auth()->guest() || !auth()->user()->is_admin){
            abort(404);
        }
        return view('authdata.admin',[
            'category'=>Category::all()
        ]);
    }
}
