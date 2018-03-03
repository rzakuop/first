<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\Order as ItemRequest;
use App\Http\Requests\Staff\Order as OrderRequest;
use App\Item;
use App\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();
        $orders = $orders->orderBy('id', 'desc');

        $orders = $orders->paginate(100)->setPath('');

        return view('staff.order.index')
            ->with([
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('staff.order.show')
            ->with([
            'order' => $order
        ]);
    }

    public function update(OrderRequest\UpdateRequest $request)
    {
        $orderData = $request->only([
            'order_id',
            'ok',
            'prefer',
            'staff_comment'
        ]);

        $staff = auth('staff')->user();
        $order = Order::findOrFail($orderData['order_id']);

        $orderData['status'] = ($orderData['ok'])? Order::ORDER_STATUS_OK : Order::ORDER_STATUS_NG;

        switch ($orderData['prefer']) {
            case 1:
                $orderData['work_at'] = $order->prefer_at;
                break;
            case 2:
                $orderData['work_at'] = $order->prefer_at2;
                break;
            case 3:
                $orderData['work_at'] = $order->prefer_at3;
                break;
        }

        if (
            $order->status == Order::ORDER_STATUS_PAID
            && $order->update($orderData)
        ){
            // send mail for user
            Mail::send(
                ['text' => 'mail.order_replied'],
                compact('order'),
                function ($m) use ($order) {
                    $m->from(
                        config('my.mail.from'),
                        config('my.mail.name')
                    );
                    $m->to($order->user->email, $order->user->getName());
                    $m->subject(
                        config('my.order.replied.mail_subject')
                    );
                }
            );

            $request->session()->flash('info', '返信しました。');
            return redirect()
                ->route('staff.orders.index')
            ;
        }

        return redirect()
            ->back()
            ->withInput($orderData)
        ;
    }
}
