@extends("layouts.admin.layout", ["type" => "category"])

@section("title", "カテゴリの削除")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">カテゴリの削除</h3>
              <form action="{{route('admin_post_category_delete', ['id' => $category->id])}}" method="post">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="row justify-content-md-center">
                  <div class="col col-lg-5">
                    <h5>{{ $category->category_name }}を削除しても宜しいですか？</h5>
                    <br>
                  </div>
                </div>

              <!-- button -->
              <div class="row justify-content-md-center">
                <div class="col col-lg-2">
                  <input type="submit" class="btn btn-rounded btn-danger mb-3" value="削除">
                </div>
                <div class="col-md-auto">
                </div>
                <div class="col col-lg-2">
                  <a href="{{ route('admin_get_category_index') }}"><button type="button" class="btn btn-rounded btn-primary mb-3">戻り</button></a>
                </div>
              </div>
            </form>
            <!-- form end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
