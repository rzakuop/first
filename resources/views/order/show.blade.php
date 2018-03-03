@extends('layout.master')

<?php

    $layout = [
        'title' => '詳細',
        'description' => '○○のページです。',
    ];

?>

@section('content')
<h1>{{ $order->title }}</h1>
価格:{{ $order->price * $order->hours }}<br>
利用時間:{{ $order->hours }}<br>
コメント:<br>
{!! nl2br(e($order->comment)) !!}<br>

状態：{{ $order->getStatus() }}<br>


<br><br><br>
依頼日時：{{ $order->work_at }}<br>
返信内容：<br>
{!! nl2br(e($order->staff_comment)) !!}<br>

@endsection
