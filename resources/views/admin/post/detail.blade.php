@extends("layouts.admin.layout", ["type" => "post"])

@section("title", "記事情報")

@section("content")

<div class="main-content-inner">
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="pricing-list dark-pricing">
        <div class="prc-head">
          <h4>記事情報</h4>
        </div>
        <div class="card">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">ID：{{$post->id }}</li>
              <li class="list-group-item">タイトル：{{ $post->name }}</li>
              <li class="list-group-item">画像：<br><img src="{{ asset($post->picture) }}" alt="picture" width="200"></li>
              <li class="list-group-item">作成日；{{ $post->createdate }}</li>
              <li class="list-group-item">航空会社：
                @foreach($post->brands as $brand)
                <p>{{ $brand->brand_name }}</p>
                @endforeach
              </li>
              <li class="list-group-item">カテゴリー：{{ $post->category->category_name }}</li>
              <li class="list-group-item">管理員：{{ $post->admin->admin_user }}</li>
              <li class="list-group-item">有効期間：{{ $post->start_time }} ～ {{ $post->finish_time }}</li>
              <li class="list-group-item">内容：<br>{!! $post->content !!}</li>
            </ul><br>
            <a href="{{ route('admin_get_post_index') }}"><button type="button" class="btn btn-rounded btn-info mb-3">戻り</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
