@extends('layout.master')

<?php
    $layout = [
        'title' => '',
        'description' => '○○のページです。',
        'js' => [],
    ];
?>

@section('content')
    <section class="main-visual">
      <div class="container">
        <div class="logo">
          <h1 class="text-center"><img src="img/logo.png" alt=""></h1>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- / .main-visual -->
    <section class="about">
      <div class="headline">
        <h2>みんなのお父さんとは?</h2>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4"><img src="img/about_point_01.jpg" alt=""></div>
          <div class="col-sm-4"><img src="img/about_point_02.jpg" alt=""></div>
          <div class="col-sm-4"><img src="img/about_point_03.jpg" alt=""></div>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- / .about -->
    <section class="service-list">
      <div class="headline">
        <h2>サービス一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Category::topCategories() as $category)
          <div class="survice-column">
            <div class="text-center">
              <h3>{{ $category->name }}</h3>
            </div>
            <ul>
              @foreach($category->children as $child)
              <li><a href="{{ route('request.index', ['category' => $child->id ]) }}">{{ $child->name }}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- / .survice-column -->
          @endforeach
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
    <!-- / .service-list -->
    <!-- section staff-list  ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <section class="staff-list">
      <div class="headline">
        <h2>リクエスト一覧</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach(App\Request::All() as $staff)
          <div class="col-sm-6 col-md-3">
            {{-- <div class="thumbnail"> <img src="{{ $staff->imageUrl() }}" alt="" >
              <div class="caption">
                <h3>{{ $staff->getName() }}</h3>
                <p>{!! nl2br(e(mb_strim($staff->description, 0, 80))) !!}</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. --> --}}
          </div>
          <!-- / .col- -->
          @endforeach


          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="img/thumbnail.jpg" alt="" >
              <div class="caption">
                <h3>人の話し、聴きすぎおっさん</h3>
                <p>文系職種で経験豊富、新入社員の時の営業員に始まって、営業企画、物流、人事、等々の様々な職種を一部上場企業で経験。転職も59才で経験しています。</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="img/thumbnail.jpg" alt="" >
              <div class="caption">
                <h3>人の話し、聴きすぎおっさん</h3>
                <p>文系職種で経験豊富、新入社員の時の営業員に始まって、営業企画、物流、人事、等々の様々な職種を一部上場企業で経験。転職も59才で経験しています。</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="img/thumbnail.jpg" alt="" >
              <div class="caption">
                <h3>人の話し、聴きすぎおっさん</h3>
                <p>文系職種で経験豊富、新入社員の時の営業員に始まって、営業企画、物流、人事、等々の様々な職種を一部上場企業で経験。転職も59才で経験しています。</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="img/thumbnail.jpg" alt="" >
              <div class="caption">
                <h3>人の話し、聴きすぎおっさん</h3>
                <p>文系職種で経験豊富、新入社員の時の営業員に始まって、営業企画、物流、人事、等々の様々な職種を一部上場企業で経験。転職も59才で経験しています。</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail"> <img src="img/thumbnail.jpg" alt="" >
              <div class="caption">
                <h3>人の話し、聴きすぎおっさん</h3>
                <p>文系職種で経験豊富、新入社員の時の営業員に始まって、営業企画、物流、人事、等々の様々な職種を一部上場企業で経験。転職も59才で経験しています。</p>
                <p><a href="#" class="btn btn-primary" role="button">Button</a>
                  <!-- <a href="#" class="btn btn-default" role="button">Button</a> -->
                </p>
              </div>
              <!-- / .caption -->
            </div>
            <!-- / thumbnail. -->
          </div>
          <!-- / .col- -->
        </div>
        <!-- / .row -->
      </div>
      <!-- / .container -->
    </section>
@endsection
