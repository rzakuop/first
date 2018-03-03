<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Staff\Item as ItemRequest;
use App\Staff;
use App\Category;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->guard('staff')->user();
        $items = Item::where('staff_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->get()
            ;
        return view('staff.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        $categories = Category::topCategories();
        return view('staff.item.create', compact('item', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest\StoreRequest $request)
    {
        $filename = '';
        if ($request->has('image')) {
            $filename = $request->file('image')->move(Item::getImageDir());
            $filename = basename($filename);
        }
        $serviceData = [
            'staff_id' => auth()->guard('staff')->user()->id,
            'category_id' => $request->input('category'),
            'title' => $request->input('title'),
            'image' => $filename,
            'price' => $request->input('price'),
            'max_hours' => $request->input('max_hours'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ];

        if ($item = Item::create($serviceData)) {

            return redirect(route('staff.item.index'))
                ->with('info', 'サービスを登録しました')
                ;
        }

        return redirect()
            ->back()
            ->withErrors('サービスを登録できませんでした')
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
        $item = Item::findOrFail($id);
        $categories = Category::topCategories();
        return view('staff.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest\UpdateRequest $request, $id)
    {
        $item = Item::findOrfail($id);

        $serviceData = [
            'staff_id' => auth()->guard('staff')->user()->id,
            'category_id' => $request->input('category'),
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'max_hours' => $request->input('max_hours'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ];

        if ($request->has('image')) {
            $filename = $request->file('image')->move(Item::getImageDir());
            $serviceData['image'] = basename($filename);
        }

        if ($item->update($serviceData)) {

            return redirect(route('staff.item.index'))
                ->with('info', 'サービスを更新しました')
                ;
        }

        return redirect()
            ->back()
            ->withErrors('サービスを更新できませんでした')
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
        $item = Item::findOrFail($id);
        if ($item->delete($item)) {
            return redirect(route('staff.item.index'))
                ->with('info', 'サービスを削除しました')
                ;
        }
        return redirect()
            ->back()
            ->with('error', 'サービスを削除できませんでして')
            ;
    }
}
