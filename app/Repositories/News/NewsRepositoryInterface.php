<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 14/08/2018
 * Time: 03:06
 */

namespace App\Repositories\News;
use Illuminate\Http\Request;


interface NewsRepositoryInterface
{
    public function getImageAdd();
    public function getImageEdit();
    public function getFormNewAdd();
    public function getFormNewEdit();
    public function InsertGetId(array $attributes);

}