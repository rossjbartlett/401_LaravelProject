<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ISBN', 'publication_year', 'publisher', 'subscription_status', 'image'
    ];

    //when you call users() from a Book object, it returns all the Users objects subscribed to the User
    //this assumes a Book can have max 1 user subscribed to it at a time
    //if want Book can be subscribed by many Users at a time, change 'belongsTo' to 'hasMany'
    public function books(){
        return $this->belongsTo(User::class);
    }

    //get the authors of the book
    public function authors(){
        return $this->hasMany(Author::class);
    }

    //get the comments of the book
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
