@extends('layout.master')

<?php

    $layout = [
        'title' => '決済',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>決済</h1>

{{ Form::model($order, ['route' => ['item.order', '?' . http_build_query($_GET)] , 'method' => 'post']) }}
  <input type="hidden" name="ordered_token" value="{{ $order->ordered_token }}">
  <script src="{{ config('my.pay.checkout_url') }}" class="payjp-button" data-key="{{ config('my.pay.public_key') }}"></script>
{!! Form::close() !!}

@endsection
