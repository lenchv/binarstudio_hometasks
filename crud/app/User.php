<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    
    public function books() {
    	return $this->belongsToMany('App\Book', 'user_book', 'user_id', 'book_id')->withPivot('id');
    }

    /*public function getBooksById($id) {
    	return $this->belongsToMany('App\Book', 'user_book', 'user_id', 'book_id')->where('user.id','=', $id);
    }*/
}
