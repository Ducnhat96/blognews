<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 14/08/2018
 * Time: 10:51
 */

namespace App\Repositories\Post_tags;
use App\Repositories\BaseRepository;


class DbPostTagsRepository  extends BaseRepository implements PostTagsRepositoryInterface
{
    protected $model;
    public function __construct(post_tags $post_tags)
    {
        $this->model = $post_tags;
    }

}