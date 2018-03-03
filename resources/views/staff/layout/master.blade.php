<!DOCTYPE HTML>
<html lang="ja"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset ('img/favicon.ico') }}">
    <meta name="description" content="{{ isset($layout['description']) && $layout['description'] ? $layout['description'] : '' }}">
    <meta name="keywords" content="" lang="ja">
    <title>{{ $layout['title'] ? $layout['title'] . '｜' : '' }}スタッフ ｜ みんなのお父さん ｜ Dojo</title>

    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/stylesheets.css') }}" type="text/css" >

    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('staff.root.index') }}">スタッフ専用画面</a>
        <div id="navbar" class="collapse navbar-collapse">
          @if (Auth::guard('staff')->check())
          <ul class="nav navbar-nav">
            <li><a href="{{ route('staff.root.index') }}">トップ</a></li>
            <li><a href="{{ route('staff.item.index') }}">サービス管理(TODO: 登録、編集、削除)</a></li>
            <li><a href="{{ route('staff.orders.index') }}">依頼管理(TODO: 依頼、振込待、終了)</a></li>
          </ul>
          @endif

          <ul class="nav navbar-nav navbar-right">
          @if (Auth::guard('staff')->check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::guard('staff')->user()->email }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('staff.user.show') }}"><i class="fa fa-user"></i> プロフィール</a></li>
                <li><a href="{{ route('staff.auth.signout') }}"><i class="fa fa-sign-out"></i> ログアウト</a></li>
              </ul>
            </li>
          @else
            <li><a href="{{ route('staff.auth.signin') }}" class="exhibit">ログイン</a></li>
            <li><a href="{{ route('staff.user.create') }}" class="exhibit">新規登録</a></li>
          @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="content">

    @if (session('info'))
    <div class="alert alert-success alert-dismissible" role="alert">
      {{ session('info') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      {{ session('error') }}
    </div>
    @endif


    @if (isset($layout['left_search']) && $layout['left_search'])
    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12">
      <div class="sidebar">
        @include('layout.left_search')
      </div>
      <!-- / .sidebar -->
    </div>
    <!-- / . -->
    @endif

    @yield('content')

      </div>
    </div><!-- /.container -->

    <footer>
    </footer>

   <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @if (isset($layout['js']))
    @foreach ($layout['js'] as $js)
    <script src="{{ asset('js/' . $js . '.js') }}"></script>
    @endforeach
    @endif

  </body>
</html>
