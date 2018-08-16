<?php

namespace App\Repositories\Tags;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['title','slug'];
    public function product()
    {
        return $this->belongsToMany('App\Repositories\News\News');
    }

}
