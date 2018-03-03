<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    <title>管理画面</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/stylesheets.css') }}" type="text/css" >

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('staff.root.index') }}">管理画面</a>
        <div id="navbar" class="collapse navbar-collapse">
          @if (Auth::guard('admin')->check())

          <ul class="nav navbar-nav">
            <li class="{!! request()->is('_admin/orders', '_admin/orders/*') ? 'active' : '' !!}"><a class="nav-link" href="">オーダー</a></li>
            <li class="{!! request()->is('_admin/notices', '_admin/notices/*') ? 'active' : '' !!}"><a class="nav-link" href="{{ route('notices.index') }}">お知らせ管理</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">サービス管理 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">オーダー</a></li>
                <li><a href="#">サービス</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">マスタ <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('categories.index') }}">カテゴリ</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">アカウント <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}">利用ユーザー</a></li>
                <li><a href="{{ route('admins.index') }}">管理ユーザー</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::guard('admin')->user()->email }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('_admin.auth.signout') }}"><i class="fa fa-sign-out"></i> ログアウト</a></li>
              </ul>
            </li>
          </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <div class="content">
        @if (session('info'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('info') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('error') }}
        </div>
        @endif

        <table class="header">
          <tr>
            <td><h1>@yield('title')</h1></td>
          </tr>
        </table>

      @yield('content')
      </div>

    </div><!-- /.container -->

    <footer>
    </footer>

   <script src="{{ asset('js/_admin/jquery-2.2.3.min.js') }}"></script>
   <script src="{{ asset('js/_admin/bootstrap.min.js') }}"></script>
   @if (isset($layout['js']))
   @foreach ($layout['js'] as $js)
   <script src="{{ asset('js/' . $js . '.js') }}"></script>
   @endforeach
   @endif

  </body>
</html>
