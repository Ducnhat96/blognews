<?php

namespace App\Repositories\Catagory;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';
    protected $fillable = ['title','slug'];
    public function news()
    {
        return $this->hasMany('App\Repositories\News\News');
    }

}
