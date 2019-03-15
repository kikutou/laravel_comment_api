@extends("layouts.admin.layout", ["type" => "airport", "action" => "index"])

@section("title", "空港情報の一覧")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">空港情報一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">空港名</th>
                  <th scope="col">都市名</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($airports as $airport)
                <tr>
                  <th scope="row">{{ $airport->id }}</th>
                  <td>{{ $airport->airport_name }}</td>
                  <th scope="row">{{ $airport->city->value }}</th>
                  <td><a href="{{ route('admin_get_airport_edit',['id'=> $airport->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                      <a href="{{ route('admin_get_airport_delete',['id'=> $airport->id]) }}"><i class="ti-trash">削除</i></a>
                  </td>
                </tr>
                @endforeach



              </tbody>
            </table>

            {{ $airports->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
