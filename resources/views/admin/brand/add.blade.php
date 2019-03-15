@extends("layouts.admin.layout", ["type" => "brand", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "航空会社の追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">航空会社の新規作成</h3>
              <form action="{{ route('admin_post_brand_add') }}" method="post" enctype="multipart/form-data">

                @csrf

                <!-- 航空会社名 -->
                <div class="form-group">
                  <label for="brand-name-input" class="col-form-label">航空会社名</label>
                  <input class="form-control" type="text" placeholder="航空会社名を入力してください" id="brand-name-input" name="brand_name" value="{{old('brand_name')}}">
                  @if($errors->has('brand_name'))
                    <p>{{ $errors->first('brand_name') }}</p>
                  @endif
                </div>
                <!-- 航空会社URL -->
                <div class="form-group">
                  <label for="brand-url-input" class="col-form-label">航空会社サイト</label>
                  <input class="form-control" type="text" placeholder="航空会社サイトを入力してください" id="brand-url-input" name="home_page" value="{{old('home_page')}}">
                  @if($errors->has('home_page'))
                    <p>{{ $errors->first('home_page') }}</p>
                  @endif
                </div>
                <!-- 航空会社紹介 -->
                <div class="form-group">
                  <label for="brand-introduction-input" class="col-form-label">紹介</label>
                  <textarea class="form-control" id="brand-introduction-input" rows="8" cols="80" name="brand_introduction">{{old('brand_introduction')}}</textarea>
                  @if($errors->has('brand_introduction'))
                    <p>{{ $errors->first('brand_introduction') }}</p>
                  @endif
                </div>

                <!-- 航空会社ロゴファイル -->
              <div class="form-group">
                <label  class="col-form-label" for="brand-logo-pic">ロゴ追加</label>
                <div class="input-group mb-3">
                  <input type="file" name="logo_picture" value="{{old('logo_picture')}}" id="brand-logo-pic">
                    @if($errors->has('logo_picture'))
                      <p>{{ $errors->first('logo_picture') }}</p>
                    @endif
                </div>
              </div>

                <!-- 航空会社紹介ファイル -->
                <div class="form-group">
                  <label  class="col-form-label" for="brand-image-pic">紹介画像追加</label>
                  <div class="input-group mb-3">
                      <input type="file" id="brand-image-pic" name="profile_picture" value="{{old('profile_picture')}}">
                      @if($errors->has('profile_picture'))
                        <p>{{ $errors->first('profile_picture') }}</p>
                      @endif
                  </div>
                </div>

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
