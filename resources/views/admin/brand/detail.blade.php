@extends("layouts.admin.layout", ["type" => "brand"])

@section("title", "航空会社情報")


@section("content")

<div class="main-content-inner">
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="pricing-list dark-pricing">
        <div class="prc-head">
          <h4>航空会社情報</h4>
        </div>
        @csrf
        <div class="card">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">ID:{{$brand->id }}</li>
              <li class="list-group-item">航空会社名:{{$brand->brand_name}}</li>
              <li class="list-group-item">サイト:{{$brand->home_page}}</li>
              <li class="list-group-item">紹介:{{$brand->brand_introduction}}</li>
              <li class="list-group-item">ロゴ:<img src="{{ asset($brand->logo_picture) }}" alt="logo_picture" width="100"></li>
              <li class="list-group-item">紹介図:<img src="{{ asset($brand->profile_picture) }}" alt="profile_picture" width="150"></li>
            </ul>
            <br>
            <a href="{{ route('admin_get_brand_index') }}"><button type="button" class="btn btn-rounded btn-info mb-3">戻り</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
