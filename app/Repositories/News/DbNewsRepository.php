<?php
/**
 * Created by PhpStorm.
 * User: ducchien
 * Date: 14/08/2018
 * Time: 03:06
 */

namespace App\Repositories\News;

use App\Repositories\BaseRepository;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;
use File;

class DbNewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    protected $model;
    protected $request;
    public function __construct(News $News,Request $request)
    {
        $this->model = $News;
        $this->request= $request;
    }
    public  function getImageAdd()
    {
        $file = $this->request->file('newsImg');
        if ($this->request->hasFile('newsImg')) {
            $destinationPath = 'back-end/image/';
            $filename = $file -> getClientOriginalName('newsImg');
            $file->move($destinationPath, $filename);
        }
        return $filename;
    }
    public function getImageEdit()
    {
        $file = $this->request->file('newsImg');
        if ($this->request->hasFile('newsImg')) {
            $ImgCurrent = $this->request->ImgCurrent;
            if (file_exists(public_path() .'/back-end/image/'.$ImgCurrent)) {
                echo public_path() . '/back-end/image/' . $ImgCurrent;
                File::delete(public_path() . '/back-end/image/' . $ImgCurrent);
            }
            $destinationPath = 'back-end/image';
            $filename = $file->getClientOriginalName('ImgCurrent');
            $file->move($destinationPath, $filename);
            return $filename;
        }else{
            $filename = $this->request->ImgCurrent;
            return $filename;
        }

    }

    public function getFormNewAdd()
    {
        $attributes = $this->request->except(['image_url','tag','newsImg']);
        $attributes ['slug']=  str_slug( $this->request->title);
        $attributes ['userid']= $this->request->catagory_id;
        return $attributes;

    }
    public function getFormNewEdit()
    {
        $attributes = $this->request->except(['image_url', 'tag','ImgCurrent']);
        $attributes ['slug'] = str_slug($this->request->title);
        $attributes ['userid'] = $this->request->catagory_id;
        return $attributes;

    }

    public function InsertGetId(array $attributes)
    {
        return $this->model->create($attributes)->id;
    }


}