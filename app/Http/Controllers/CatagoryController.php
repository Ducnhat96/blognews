<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CatEditRequest;
use App\Http\Requests\CatAddRequest;

use App\Repositories\Catagory\CatagoryRepositoryInterface;
use Session;

class CatagoryController extends Controller
{
    protected  $CatagoryRepositoryInterface;
    public  function  __construct(CatagoryRepositoryInterface $CatagoryRepositoryInterface)
    {
        $this->CatagoryRepositoryInterface = $CatagoryRepositoryInterface;
    }
    public  function store(CatAddRequest $request) {
        $getCatForm = $this->CatagoryRepositoryInterface->getCatForm();
        $this->CatagoryRepositoryInterface->store($getCatForm);
        Session::flash('flash_add', 'Catagory created successfully !');
        return redirect()->route('catagory.index');

    }

    public function index() {
        $catagory = $this->CatagoryRepositoryInterface->index();
        return view('back-end.catagory.index',compact('catagory'));
    }

    public function create()
    {
        return view('back-end.catagory.create');

    }
    public function edit(Request $request,$id) {
       $CatEdit = $this->CatagoryRepositoryInterface->edit($id);
       return view('back-end.catagory.edit',compact('CatEdit'));
    }
    public function show($id)
    {
        $CatShow = $this->CatagoryRepositoryInterface->show($id);
        return view('back-end.catagory.show',compact('CatShow'));
    }

    public function update(CatEditRequest $request,$id) {
        // Lay du lieu tu cat edit form
        $CatEditForm = $this->CatagoryRepositoryInterface->getCatForm();
        //Update du lieu
        $this->CatagoryRepositoryInterface->update($id,$CatEditForm);
        Session::flash('flash_add', 'Catagory updated successfully !');
        return redirect()->route('catagory.index');
    }
    public  function destroy($id) {
        $this->CatagoryRepositoryInterface->destroy($id);
        Session::flash('flash_add', 'Deleted successfully !');
        return redirect()->route('catagory.index');
    }


}
