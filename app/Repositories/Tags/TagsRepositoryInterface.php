<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 14/08/2018
 * Time: 10:54
 */

namespace App\Repositories\Tags;



interface TagsRepositoryInterface
{

    public function find_tag($value);
    public function getTag();
    public function insertGetId(array $attributes);

}