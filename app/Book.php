<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ISBN', 'publication_year', 'publisher', 'subscription_status', 'image'
    ];

    //when you call users() from a Book object, should it return all the Users that EVER subscribed to the User
    public function users(){
        return $this->hasMany(User::class);
    }

    //a book can have many subscription
    public function subcriptions(){
        return $this->hasMany(Subscription::class);
    }

    //a Book can have max 1 user subscribed to it at a time
    public function currentUser(){
        //TODO
    }


    //get the authors of the book
    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors')->withTimestamps();
    }

    //get the comments of the book
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
