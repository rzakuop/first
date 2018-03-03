<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Item as ItemRequest;
use App\Item;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();
        $orders = $orders->orderBy('id', 'desc');

        $orders = $orders->paginate(100)->setPath('');

        return view('order.index')
            ->with([
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show')
            ->with([
            'order' => $order
        ]);
    }

    public function payment(ItemRequest\OrderRequest $request)
    {
        $orderData = $request->only([
            'item_id',
            'hours',
            'prefer_date',
            'prefer_hour',
            'prefer_date2',
            'prefer_hour2',
            'prefer_date3',
            'prefer_hour3',
            'comment'
        ]);

        $user = auth()->user();
        $orderData['user_id'] = $user->id;
        $orderData['status'] = Order::ORDER_STATUS_NEW;

        $item = Item::findOrFail($orderData['item_id']);
        $orderData['price'] = $item->price;
        $orderData['title'] = $item->title;
        $orderData['prefer_at'] = $orderData['prefer_date'] . " " . $orderData['prefer_hour'] . ":00";
        if($orderData['prefer_date2'])
            $orderData['prefer_at2'] = $orderData['prefer_date2'] . " " . $orderData['prefer_hour2'] . ":00";
        if($orderData['prefer_date3'])
            $orderData['prefer_at3'] = $orderData['prefer_date3'] . " " . $orderData['prefer_hour3'] . ":00";

        if ($order = Order::create($orderData)) {
            $request->session()->flash('info', '依頼しました。結果がくるまでしばらくお待ちください。');
            return redirect()
                ->route('root.index')
            ;
        }
        return redirect()
            ->back()
            ->withInput($orderData)
        ;
    }
}
