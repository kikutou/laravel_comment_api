@extends("layouts.admin.layout", ["type" => "category", "action" => "add"])

@section("title", "カテゴリの新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">カテゴリの新規作成</h3>
              <!-- form start -->
              <form action="{{route('admin_post_category_add')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_name-input" class="col-form-label">カテゴリ名</label>
                    <input class="form-control" type="category_name" id="category_name-input" name="category_name" placeholder="カテゴリ名を入力してください。"　value="{{old('category_name')}}">
                    @if($errors->has('category_name'))
                      <p>{{ $errors->first('category_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_introduction-input" class="">カテゴリ説明文</label>
                    <input type="category_introduction" class="form-control" id="category_introduction-input" name="category_introduction"  placeholder="説明文を入力してください。"　value="{{old('category_introduction')}}">
                    @if($errors->has('category_introduction'))
                      <p>{{ $errors->first('category_introduction') }}</p>
                    @endif
                </div>
                <!-- button -->
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                      <input class="btn btn-rounded btn-primary mb-3" type="submit" value="Submit">
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col col-lg-2">
                      <input type="reset" class="btn btn-rounded btn-danger mb-3" value="Reset">
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
