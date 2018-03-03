@extends('staff.layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>{{ $order->title }}</h1>

<div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table">
        <tbody>
          <tr>
            <th class="text-right col-xs-3 col-md-4">価格:</th>
            <td class="text-left">{{ $order->price }}</td>
          </tr>
          <tr>
            <th class="text-right col-xs-3 col-md-4">利用時間:</th>
            <td class="text-left">{{ $order->hours }}</td>
          </tr>
          <tr>
            <th class="text-right col-xs-3 col-md-4">コメント:</th>
            <td class="text-left">{{ $order->comment}}</td>
          </tr>

          <tr>
            <th class="text-right col-xs-3 col-md-4">状態:</th>
            <td class="text-left">{{ $order->getStatus() }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  @if ($order->status == App\Order::ORDER_STATUS_PAID)
  {{ Form::model($order, ['route' => ['staff.orders.update', $order->id . '?' . http_build_query($_GET)] , 'method' => 'put', 'class' => 'form-horizontal']) }}
  @include('staff.order._form', ['order' => $order])

  <div class="form-group">
    <div class="col-md-offset-4 col-md-8">
      <button type="submit" class="btn btn-primary"><span>返信する</span></button>
    </div>
  </div>
  {!! Form::close() !!}

</div>
@endif

@endsection
