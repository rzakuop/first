@extends('_admin.layout.master')
@section('title','お知らせ一覧')

@section('content')

<div class="section">
  <form>
    <div class="row">
      <div class="col-md-12 text-right">
        <a href="{{ route('notices.create') }}?{{ http_build_query($_GET) }}" class="btn btn-secondary btn-sm">新規作成</a>
      </div>
    </div>
  </form>
</div>

<table class="table table-striped table-condensed">
    <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>開始日時</th>
        <th>終了日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach($notices as $notice)
        <tr>
            <td>{{ str_limit($notice->title, 25, $end = '...') }}</td>
            <td>{{ str_limit($notice->content, 30, $end = '...') }}</td>
            <td>{{ $notice->getStartAt() }}</td>
            <td>{{ $notice->getEndAt() }}</td>
            <td><a href="{{ route('notices.edit', ['notice' => $notice->id ]) }}" class="btn btn-success btn-sm">編集</a></td>
            <td>
                {{ Form::model($notice, ['route' => ['notices.destroy', 'notice' => $notice->id] , 'method' => 'delete', 'data-confirm' => '本当に削除しますか？']) }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $notices->links() !!}
</div>

@endsection

@push('script_codes')

@endpush
