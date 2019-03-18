@extends("layouts.app")

@section("title", "サイト一覧")


@section("content")

<div class="main-content-inner">

  <!-- table dark start -->
  <div class="col-lg-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">サイト一覧</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table class="table text-center">
              <thead class="text-uppercase bg-dark">
                <tr class="text-white">
                  <th scope="col">name</th>
                  <th scope="col">URL</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sites as $site)
                <tr>
                  <th scope="row">{{ $site->name }}</a>
                  </th>
                  <td>{{ $site->url }}</td>
                  <td>
                    <form action="{{ route('post_delete_sites')}}" method="post">
                      @csrf
                      <input type="hidden" name="site_id" value="{{ $site->id }}">
                      <input type="hidden" name="delete" value="delete">
                      <input type="submit" class="btn btn_primary" value="削除">
                      <input type="submit" class="btn btn_primary" value="編集">
                    </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- button -->
        <div class="row justify-content-md-center">
            <div class="col-lg-2">
              <a href="{{route('get_show_add_sites')}}"><button type="button" class="btn btn-primary mb-3">追加</button></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- table dark end -->
</div>
@endsection
