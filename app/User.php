<?php

namespace App;

use App\Course;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'role', 'birthday', 'education_field', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //when you call books() from a User object, it returns all the Book of the User (subscribed to)
    public function books(){
        return $this->hasMany(Book::class);
    }

     //get the comments that the user has made
     public function comments(){
        return $this->hasMany(Comment::class);
    }
}
