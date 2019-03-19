@extends("layouts.admin.layout", ["type" => "comment", "action" => "index"])

@section("title", "コメント一覧")


@section("content")

<div class="main-content-inner">
  <!-- session message -->
  @if(Session::get("message"))
  <div class="row">
    <div class="alert alert-success alert-dismissible fade show col-md-6 offset-md-3" role="alert">
      <strong>{{ Session::get("message") }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="fa fa-times"></span>
      </button>
    </div>
  </div>
  @endif
  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">コメント一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">ユーザーコード</th>
                  <th scope="col">航空会社</th>
                  <th scope="col">航路</th>
                  <th scope="col">平均点</th>
                  <th scope="col">審査状況</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comments as $comment)
                <tr>
                  <th scope="row"><a href="{{route('admin_get_comment_detail',['id'=> $comment->id]) }}">{{ $comment->id }}</a></th>
                  <td>{{ $comment->user->code }}</td>
                  <td>{{ $comment->brand->brand_name ?? "" }}</td>
                  <td>{{ $comment->flight->flight_number ?? "" }}</td>
                  <td>{{ $comment->star($comment->average_score) ?? "" }}{{ $comment->average_score }}</td>
                  <td>{{ $comment->inspect_status($comment->read_by_admin_at) }}</td>
                  <td><a href="{{ route('admin_get_comment_edit',['id'=> $comment->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                    <a href="{{ route('admin_get_comment_delete',['id'=> $comment->id]) }}"><i class="ti-trash">削除</i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- button -->
        <div class="row justify-content-md-center">
          <div class="col-lg-3">
            <a href="{{ route('admin_get_comment_add') }}"><button type="button" class="btn btn-primary mb-3">追加</button></a>
          </div>
        </div>

        <!-- pagention -->
        <div class="row justify-content-md-center">
          <div class="col-md-4">
            <div>{{ $comments->links() }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
