@extends("layouts.admin.layout", ["type" => "brand", "action" => "index"])

@section("title", "航空会社一覧")


@section("content")

<div class="main-content-inner">
  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">航空会社情報一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">会社名</th>
                  <th scope="col">公式サイト</th>
                  <th scope="col">紹介</th>
                  <th scope="col">ロゴ</th>
                  <th scope="col">紹介図</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $brand)
                <tr>
                  <th scope="row"><a href="{{route('admin_get_brand_detail',['id'=> $brand->id]) }}">{{ $brand->id }}</a></th>
                  <td>{{ $brand->brand_name }}</td>
                  <td>{{ $brand->home_page }}</td>
                  <!-- <td>{!! nl2br(e($brand->brand_introduction)) !!}</td> -->
                  <td><?php echo substr("{$brand->brand_introduction}",0,30);?>...</td>
                  <td><img src="{{ asset($brand->logo_picture) }}" alt="logo" width="100" ></td>
                  <td><img src="{{ asset($brand->profile_picture) }}" alt="profile" width="150"></td>
                  <td><a href="{{ route('admin_get_brand_edit',['id'=> $brand->id]) }}"><i class="ti-pencil-alt">編集</i></a>
                    <a href="{{ route('admin_get_brand_delete',['id'=> $brand->id]) }}"><i class="ti-trash">削除</i></a>
                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
