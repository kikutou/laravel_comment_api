@extends("layouts.admin.layout", ["type" => "comment"])

@section("title", "コメント情報")


@section("content")

<div class="main-content-inner">
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="pricing-list dark-pricing">
        <div class="prc-head">
          <h4>コメント情報</h4>
        </div>
        <div class="card">
          <div class="card-body">
            <ul class="list-group">
              <li class="list-group-item">ID：{{$comment->id }}</li>
              <li class="list-group-item">ユーザーコード{{ $comment->user->code }}</li>
              <li class="list-group-item">航空会社：{{ $comment->brand->brand_name ?? "なし" }}</li>
              <li class="list-group-item">航路：{{ $comment->flight->flight_number ?? "なし" }}</li>
              <li class="list-group-item">サービス：{{ $comment->service ?? "" }}</li>
              <li class="list-group-item">清潔感：{{ $comment->clean ?? "" }}</li>
              <li class="list-group-item">飲食：{{ $comment->food ?? "" }}</li>
              <li class="list-group-item">座席の快適：{{ $comment->seat ?? "" }}</li>
              <li class="list-group-item">エンターテインメント：{{ $comment->entertainment ?? "" }}</li>
              <li class="list-group-item">コストパフォーマンス：{{ $comment->cost_performance ?? "" }}</li>
              <li class="list-group-item">コメント内容：{{ $comment->comment ?? "" }}</li>
              <li class="list-group-item">審査状況：{{ $comment->inspect_status($comment->read_by_admin_at) }}</li>
            </ul><br>
            <form action="{{route('admin_post_comment_detail', ['id' => $comment->id])}}" method="post">
              @csrf
              <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <button type="submit" class="btn btn-rounded btn-info mb-3">戻り</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
