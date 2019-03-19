@extends("layouts.admin.layout", ["type" => "flight", "action" => "index"])

@section("title", "ルート情報一覧")


@section("content")

<div class="main-content-inner">
  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">ルート情報一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">航空会社名</th>
                  <th scope="col">便番号</th>
                  <th scope="col">出発空港</th>
                  <th scope="col">到着空港</th>
                  <th scope="col">出発時刻</th>
                  <th scope="col">到着時刻</th>
                </tr>
              </thead>
                @foreach($flights as $flight)
              <tbody>
                <tr>
                  <th scope="row"><a>{{ $flight->id }}</a></th>
                  <td>{{ $flight->brand->brand_name }}</td>
                  <td>{{ $flight->flight_number }}</td>
                  <td>{{ $flight->start_airport->airport_name }}</td>
                  <td>{{ $flight->destination_airport->airport_name }}</td>
                  <td>{{ $flight->start_time }}</td>
                  <td>{{ $flight->destination_time }}</td>

                  <td><a href="{{ route('admin_get_flight_edit',['id'=> $flight->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                      <i class="ti-trash">削除</i>
                  </td>
                </tr>
              </tbody>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
