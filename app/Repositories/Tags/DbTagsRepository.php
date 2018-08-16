<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 14/08/2018
 * Time: 10:54
 */

namespace App\Repositories\Tags;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;


class DbTagsRepository extends BaseRepository implements TagsRepositoryInterface
{
    protected $model;
    protected $request;
    public function __construct(Tags $tags,Request $request)
    {
        $this->model = $tags;
        $this->request = $request;
    }
    public function find_tag($value)
    {
       $result = $this->model->select('id')->where('title',$value)->first();
       return $result;

    }
    public function getTag()
    {
        $tags = $this->request->tag;
        $str_tag = explode(",",$tags);
        return $str_tag;
    }

    public function insertGetId(array $attributes) {
        return $this->model->create($attributes)->id;
    }

}