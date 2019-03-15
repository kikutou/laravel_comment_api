@extends("layouts.admin.layout", ["type" => "admin", "action" => "index"])

@section("title", "管理員一覧")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">管理員一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">管理員番号</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($admins as $admin)
                <tr>
                  <th scope="row">{{ $admin->id }}</a>
                  </th>
                  <td>{{ $admin->admin_user }}</td>
                  <td>
                    <a href="{{ route('admin_get_admin_edit',['id'=> $admin->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                    <a href="{{ route('admin_get_admin_delete',['id'=> $admin->id]) }}"><i class="ti-trash">削除</i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- button -->
        <div class="row justify-content-md-center">
            <div class="col-lg-2">
              <a href="{{ route('admin_get_admin_add') }}"><button type="button" class="btn btn-primary mb-3">追加</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
