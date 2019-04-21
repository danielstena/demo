<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment', 'score','user_id','user_name','prod_id','prod_name'];
}
