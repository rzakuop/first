@extends('_admin.layout.master')
@section('title','カテゴリ 編集')

@section('content')

<ol class="breadcrumb">
    <li><a href="{{ route('categories.index') }}">トップ</a></li>
@foreach($catetoryList as $categoryRow)
    <li><a href="{{ route('categories.index', ['parent' => $categoryRow->id] ) }}">{{ $categoryRow->name }}</a></li>
@endforeach
</ol>

<div class="col-md-8">
{{ Form::model($category, ['route' => ['categories.update', 'category' => $category->id] , 'method' => 'put', 'class' => 'form-horizontal']) }}
　　@include('_admin.category._form', ['category' => $category])
    <input type="hidden" name="parent_id" value="{{ $category->parent_id }}">

    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('categories.index', ['parent' => $category->parent_id]) }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary">更新する</button>
      </div>
    </div>

{{ Form::close() }}
</div>
@endsection
