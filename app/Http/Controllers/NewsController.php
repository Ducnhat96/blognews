<?php

namespace App\Http\Controllers;

use App\Repositories\Tags\TagsRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewEditRequest;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Catagory\CatagoryRepositoryInterface;
use App\Repositories\Post_tags\PostTagsRepositoryInterface;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $news;
    protected $cats;
    protected $tags;
    protected $post_tags;

    public function __construct(NewsRepositoryInterface $NewsRepositoryInterface, CatagoryRepositoryInterface $CatagoryRepositoryInterface, TagsRepositoryInterface $TagsRepositoryInterface, PostTagsRepositoryInterface $PostTagsRepositoryInterface)
    {
        $this->news = $NewsRepositoryInterface;
        $this->cats = $CatagoryRepositoryInterface;
        $this->tags = $TagsRepositoryInterface;
        $this->post_tags = $PostTagsRepositoryInterface;
    }

    public function index()
    {
        $news = $this->news->index();
        return view('back-end.news.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagory = $this->cats->index();
        return view('back-end.news.create', compact('catagory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsAddRequest $request)
    {
        $getFormNewAdd = $this->news->getFormNewAdd();
        // Lay ra ten anh
        $getImageAdd = $this->news->getImageAdd();
        $getFormNewAdd['image_url'] = $getImageAdd;
        // them moi tin tuc va lay ra id bai viet
        $post_id = $this->news->InsertGetId($getFormNewAdd);

        //Lay ra du lieu tag tu form
        $getTags = $this->tags->getTag();

        foreach ($getTags as $value) {
            // kiem tra tag da ton tai chua
            $test_tags = $this->tags->find_tag($value);
            if (count($test_tags) == 0) {
                // neu chua ton tai thi them moi va lay ra id the cua the tag
                $tags = [];
                $tags['title'] = $value;
                $tags['slug'] = str_slug($value);
                $tag_id = $this->tags->insertGetId($tags);
                // them tag_id va post_id vao bang post_tag;
                $post_tags = [];
                $post_tags['post_id'] = $post_id;
                $post_tags['tag_id'] = $tag_id;
                $this->post_tags->store($post_tags);
            } else {
                // Khi the tag da ton tai
                $tag_id = $test_tags->id;
                $post_tags = [];
                $post_tags['post_id'] = $post_id;
                $post_tags['tag_id'] = $tag_id;
                $this->post_tags->store($post_tags);
            }

        }
        Session::flash('flash_add', 'News created successfully !');
        return redirect()->route('news.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $NewShow = $this->news->show($id);
        return view('back-end.news.show',compact('NewShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $NewEdit = $this->news->edit($id);
        $CatEdit = $this->cats->index();
        return view('back-end.news.edit', ['NewEdit' => $NewEdit, 'CatEdit' => $CatEdit, 'id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewEditRequest $request, $id)
    {
        $getFormNewEdit = $this->news->getFormNewEdit();
        // Xoa anh cu trong thu muc lue va cap nhap anh moi
        $getImageEdit = $this->news->getImageEdit();
        $getFormNewEdit['image_url'] = $getImageEdit;
       // Cap nhap tin tuc moi
        $this->news->update($id, $getFormNewEdit);
        Session::flash('flash_add', 'News updated successfully !');
        return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->news->destroy($id);
        Session::flash('flash_add', 'Deleted successfully !');
        return redirect()->route('news.index');
    }
}
