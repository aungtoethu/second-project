<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function codeblog(){
        return $this->hasMany(Codeblog::class);
    }

     public  function getNameAttribute($value){
        return ucwords($value);
     }

     public function setPasswordAttribute($value){
         $this->attributes['password']=bcrypt($value);
     }

     public function subscribeblog(){
        return $this->belongsToMany(Codeblog::class,'codeblogs_users');
     }

     public function isSubscribe($blog){
        return auth()->user()->subscribeblog && auth()->user()->subscribeblog->contains('id',$blog->id);
     }

}
