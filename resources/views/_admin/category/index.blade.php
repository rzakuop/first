@extends('_admin.layout.master')
@section('title','カテゴリ')

@section('content')

<div class="section">
  <form>
    <div class="row">
      <div class="col-md-12 text-right">
       <a href="{{ route('categories.create', ['parent' => $parent]) }}" class="btn btn-secondary btn-sm">新規登録</a>
      </div>
    </div>
  </form>
</div>

<ol class="breadcrumb">
    <li><a href="{{ route('categories.index') }}">トップ</a></li>
@foreach($catetoryList as $category)
    <li><a href="{{ route('categories.index',  ['parent' => $category->id] ) }}">{{ $category->name }}</a></li>
@endforeach
</ol>

  <table class="table table-striped table-condensed">
    <tr>
        <th>カテゴリ名称</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    @foreach($categories as $category)
        <tr>
            <td><a href="{{ route('categories.index', ['parent' => $category->id]) }}">{{ $category->name }}</a></td>
            <td><a href="{{ route('categories.edit', ['category' => $category->id ]) }}" class="btn btn-success btn-sm">編集</a></td>
            <td>
                {{ Form::model($category, ['route' => ['categories.destroy', 'category' => $category->id] , 'method' => 'delete', 'data-confirm' => '本当に削除しますか？']) }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
</table>

@endsection

@push('script_codes')

@endpush
