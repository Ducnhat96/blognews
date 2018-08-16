<?php

namespace App\Repositories\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title','slug','description','content','image_url','check_slide','catagory_id','user_id'];
    public function catagory()
    {
        return $this->belongsTo('App\Repositories\Catagory\Catagory');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Repositories\Tags\Tags');
    }
}
