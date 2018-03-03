@extends('layout.master')

<?php

    $layout = [
        'left_search' => false,
        'title' => '一覧',
        'description' => '○○のページです。',
    ];

?>

@section('content')


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
          <li><a href="{{ route('item.index', ['category' => $child->id ]) }}">{{ $child->name }}</a></li>
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


<!-- <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4"> -->
<div>
  @foreach($items as $item)
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail"> <img src="{{ $item->imageUrl() }}" alt="" >
      <div class="caption">
        <h3>{{ str_limit($item->title, 50, $end = '...') }}</h3>
        <p>時給 {{ $item->price }}円</p>
        <p>場所 {{ $item->location }}</p>
        <p>
          <a href="{{ route('item.show', ['item' => $item->id ]) }}" class="btn btn-success btn-sm">詳細</a>

        </p>
      </div>
      <!-- / .caption -->
    </div>
    <!-- / thumbnail. -->
  </div>
  <!-- / .col- -->
  @endforeach


</div>
<!-- / . -->
<div class="text-center">
    {!! $items->links() !!}
</div>

@endsection
