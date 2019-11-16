<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body'];

    public function user(){
        return $this->belongsTo('App\User');
        //return $this->belongsTo(User::class);
    }

    //define $blog->author
    public function getAuthorAttribute(){
        return !is_null($this->user) ? $this->user->name : 'No Author';
    }
}
