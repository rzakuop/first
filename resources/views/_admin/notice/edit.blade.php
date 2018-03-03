@extends('_admin.layout.master')
@section('title','お知らせ 編集')

@section('content')

<div class="col-md-8">
  {{ Form::model($notice, ['route' => ['notices.update', $notice->id . '?' . http_build_query($_GET)] , 'method' => 'put', 'class' => 'form-horizontal']) }}
    @include('_admin.notice._form', ['notice' => $notice])
    <input type="hidden" name="id" value="{{ $notice->id }}">

    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <a href="{{ route('notices.index') }}" class="btn btn-secondary">戻る</a>
        <button type="submit" class="btn btn-primary"><span>更新する</span></button>
      </div>
    </div>
  {!! Form::close() !!}
</div>

@endsection
