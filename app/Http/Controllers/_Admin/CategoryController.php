<?php

namespace App\Http\Controllers\_Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\_Admin\Category as CategoryRequest;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parent = null)
    {
        if (is_null($parent)) {
            $categories = \App\Category::whereNull('parent_id')->orderBy('id', 'asc')->get();
        } else {
            $categories = \App\Category::where('parent_id', '=', $parent)->orderBy('id', 'asc')->get();
        }

        $catetoryList = $this->getCatetoryList($parent);


        return view('_admin.category.index')
            ->with([
                'categories'    => $categories,
                'parent'        => $parent,
                'catetoryList' =>  $catetoryList,
            ])
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent = null)
    {
        $catetoryList = $this->getCatetoryList($parent);
        $category = new Category();
        $category->parent_id = $parent;
        return view('_admin.category.create')
            ->with([
                'category' =>$category,
                'catetoryList' =>  $catetoryList,
            ])
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest\StoreRequest $request)
    {
        $categoryData = $this->getCategoryData($request);

        if ($categoryData['parent_id'] == '') {
            $categoryData['parent_id'] = null;
        }

        if ($category = Category::create($categoryData)) {
            $request->session()->flash('info', '登録しました。');
            return redirect()
                ->route('categories.index', ['parent' => $category->id])
            ;
        }

        return redirect()
            ->back()
            ->withInput($categoryData)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catetoryList = $this->getCatetoryList($id);
        $category = Category::findOrFail($id);
        return view('_admin.category.edit')
            ->with([
                'category' => $category,
                'catetoryList' =>  $catetoryList,
            ])
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest\StoreRequest $request, $id)
    {
        $categoryData = $this->getCategoryData($request);
        unset($categoryData['parent_id']);
        $category = \App\Category::findOrFail($id);

        if ($category->update($categoryData)){
            return redirect()
                ->route('categories.index', ['parent' => $category->parent_id] )
                ->with(['info' => '更新しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($categoryData)
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Category::findOrFail($id);
        \App\Category::destroy($id);
        return redirect()
            ->route('categories.index', ['parent' => $category->parent_id] )
            ->with(['info' => '削除しました。'])
        ;
    }

    /*
     * @param  \Illuminate\Http\Response
     * @return array  $categoryData
     */
    private function getCategoryData($request)
    {
        $categoryData = $request->only([
            'name', 'parent_id'
        ]);

        return $categoryData;
    }

    private function getCatetoryList($parent)
    {
        $categoryList = [];
        while(! is_null($parent)){
            $parentCategory = \App\Category::findOrFail($parent);
            $categoryList[] = $parentCategory;
            $parent = $parentCategory->parent_id;
        }

        return array_reverse($categoryList);
    }
}
