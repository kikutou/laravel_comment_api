@extends("layouts.admin.layout", ["type" => "category"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "カテゴリの編集")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">カテゴリの編集</h3>
              <form action="{{route('admin_post_category_edit', ['id' => $category->id])}}" method="post">
                <input type="hidden" name="category_id" value="{{ $category->id }}">


                @csrf

                <!-- カテゴリ名 -->
                <div class="form-group">
                  <label for="category-name-input" class="col-form-label">カテゴリ名</label>
                  <input class="form-control" type="text" placeholder="カテゴリ名を入力してください" id="category-name-input" name="category_name" value="{{ old('category_name', $category->category_name) }}">
                  @if($errors->has('category_name'))
                    <p>{{ $errors->first('category_name') }}</p>
                  @endif
                </div>
                <!-- カテゴリ説明文 -->
                <div class="form-group">
                  <label for="categoryt-introduction-input" class="col-form-label">カテゴリ説明</label>
                  <input class="form-control" type="text" placeholder="カテゴリ説明文を入力してください" id="category-introduction-input" name="category_introduction" value="{{ $category->category_introduction }}">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
