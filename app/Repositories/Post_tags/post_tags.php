<?php

namespace App\Repositories\Post_tags;

use Illuminate\Database\Eloquent\Model;

class post_tags extends Model
{

    protected $table = 'post_tags';
    protected $fillable = ['post_id','tag_id'];

}
