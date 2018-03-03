@extends('staff.layout.master')

<?php
    $layout = [
        'title' => 'サービス編集',
        // 'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
<h1>サービス編集</h1>

<div class="col-md-8">
  {!! Form::model($item, ['route' => ['staff.item.update', $item], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal']) !!}
    @include('staff.item._form', ['item' => $item])
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <input type="submit" name="submit" value="更新" class="btn btn-success">
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
