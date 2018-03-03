@extends('_admin.layout.master')
@section('title','管理ユーザー')

@section('content')

<div class="section">
  <form>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group form-group-sm">
          <div class="input-group">
            <span class="input-group-addon">メールアドレス</span>
            <input type="text" name="email" id="email" value="{{ $search['email'] ?? '' }}" class="form-control" placeholder="メールアドレス">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i> 検索</button>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary">クリア</a>
      </div>
      <div class="col-md-2 text-right">
        <a href="{{ route('admins.create') }}?{{ http_build_query($_GET) }}" class="btn btn-secondary">新規作成</a>
      </div>
    </div>
  </form>
</div>

<table class="table table-striped table-condensed">
    <tr>
        <th>メールアドレス</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->email }}</td>
            <td><a href="{{ route('admins.edit', ['admin' => $admin->id ]) }}" class="btn btn-success btn-sm">編集</a></td>
            <td>
                {{ Form::model($admin, ['route' => ['admins.destroy', 'admin' => $admin->id] , 'method' => 'delete', 'data-confirm' => '本当に削除しますか？']) }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                {{ Form::close() }}
            </td>
        </tr>
    @endforeach
</table>
<div class="text-center">
    {!! $admins->appends($search)->links() !!}
</div>

@endsection

@push('script_codes')

@endpush
