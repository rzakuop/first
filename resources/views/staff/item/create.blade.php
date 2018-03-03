@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス登録',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<h1>サービス登録</h1>

<div class="col-md-8">
  {!! Form::open( ['route' => 'staff.item.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
    @include('staff.item._form', ['item' => $item])
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <input type="submit" name="submit" value="登録" class="btn btn-success">
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
