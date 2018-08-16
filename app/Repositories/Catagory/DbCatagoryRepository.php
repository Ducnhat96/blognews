<?php

namespace App\Repositories\Catagory;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;


class DbCatagoryRepository extends BaseRepository implements CatagoryRepositoryInterface
{
    protected $model;
    protected $request;
    public function __construct(Catagory $Catagory,Request $request)
    {
        $this->model = $Catagory;
        $this->request= $request;
    }
    public function getCatForm()
    {
        $attributes = [];
        $attributes['title']= $this->request->title;
        $attributes ['slug']=  str_slug( $this->request->title);
        return $attributes;
    }


}
 //parent::__construct($post);

        //parent::__construct($post);

//    public function getAddTitleCategory(){
//        return $this->model->with('category')->get();
//    }

