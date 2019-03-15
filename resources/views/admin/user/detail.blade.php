@extends("layouts.admin.layout", ["type" => "user"])

@section("title", "会員情報")


@section("content")

<div class="main-content-inner">
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="pricing-list dark-pricing">
        <div class="prc-head">
          <h4>会員情報</h4>
        </div>
        <div class="card">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">会員ID：{{$user->id }}</li>
              <li class="list-group-item">名前：{{ $user->detail->name }}</li>
              <li class="list-group-item">生年月日：{{ $user->detail->birthday }}</li>
              <li class="list-group-item">所在地：{{ $user->detail->address_prefecture->value }}</li>
              <li class="list-group-item">住所：{{ $user->detail->address_detail }}</li>
              <li class="list-group-item">性別：{{ $user->detail->gender_flg }}</li>
              <li class="list-group-item">会員状態：{{ $user->user_status->value }}</li>
            </ul><br>
            <a href="{{ route('admin_get_user_index') }}"><button type="button" class="btn btn-rounded btn-info mb-3">戻り</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
