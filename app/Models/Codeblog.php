<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Codeblog extends Model
{ 
      use HasFactory;

    protected $with=['category','author'];
    protected $fillable=['title','intro','body','slug','category_id'];
        
    public function scopeFilter($query,$data){
      $query->when($data['search']??false,function($query,$data){
             $query->where(function($query)use($data){
               $query->where('title','LIKE','%'.$data.'%')
               ->orWhere('body','LIKE','%'.$data.'%');
             });
      });
      $query->when($data['author']??false,function($query,$data){
           $query->whereHas('author',function($query)use($data){
              $query->where('name',$data);
           });
      });
      $query->when($data['category']??false,function($query,$data){
                $query->whereHas('category',function($query)use($data){
                      $query->where('slug',$data);
                });
      });
    }
    
    public function category(){
       return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment(){
      return $this->hasMany(Comment::class);
    }

    public function subscriber(){
      return $this->belongsToMany(User::class,'codeblogs_users');
    }


    // public function subscribe(){
    //   $this->subscriber()->attach(auth()->id());
    // }

    // public function unsubscribe(){
    //   $this->subscriber()->detach(auth()->id());
    // }
}
