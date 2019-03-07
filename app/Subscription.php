<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = []; // TODO book_id and user_id should not be fillable right?
}
