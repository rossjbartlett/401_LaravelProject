<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name', 'department', 'description'
    ];

    //whenever you call user from an object of Course, return the user to which the course belongs
    public function user(){
        return $this->bleongsTo(User::class);
    }
}
