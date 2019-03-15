@extends("layouts.admin.layout", ["type" => "brand"])

@section("title", "航空会社の編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">航空会社の編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_brand_edit', ['id' => $brand->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="brand_id" value="{{ $brand->id }}">

                <div class="form-group">
                    <label for="brand-name-input" class="col-form-label">航空会社名</label>
                    <input class="form-control" type="text" value="{{ old('brand_name', $brand->brand_name) }}" id="brand-name-input" name="brand_name">
                    @if($errors->has('brand_name'))
                      <p>{{ $errors->first('brand_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                  <label for="brand-url-input" class="col-form-label">航空会社サイト</label>
                  <input class="form-control" type="text"  id="brand-url-input" placeholder="ホームページを入力してください。" name="home_page" value="{{ old('home_page',$brand->home_page) }}">
                  @if($errors->has('home_page'))
                    <p>{{ $errors->first('home_page') }}</p>
                  @endif
                </div>
                <!-- 航空会社紹介 -->
                <div class="form-group">
                  <label for="brand-introduction-input" class="col-form-label">紹介</label>
                  <textarea class="form-control" id="brand-introduction-input" rows="8" cols="80" name="brand_introduction">{{old('brand_introduction', $brand->brand_introduction)}}</textarea>
                  @if($errors->has('brand_introduction'))
                    <p>{{ $errors->first('brand_introduction') }}</p>
                  @endif
                </div>
                <!-- 航空会社ロゴ -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <p>ロゴ</p>
                    </div><br>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <img src="{{ asset($brand->logo_picture) }}" alt="picture" width="100">
                    </div>
                  </div>
                </div>
                <!-- ロゴ変更 -->
                  <div class="form-group">
                    <label  class="col-form-label" for="logo-picture">ロゴ変更</label>
                    <div class="input-group mb-3">
                      <input type="file" name="logo_picture" value="{{ old($brand->logo_picture) }}" id="logo-picture">
                      @if($errors->has('logo_picture'))
                      <p>{{ $errors->first('logo_picture') }}</p>
                      @endif
                    </div>
                  </div>

                <!-- 航空会社紹介図 -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <p>紹介図</p>
                    </div><br>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <img src="{{ asset($brand->profile_picture) }}" alt="profile-picture" width="150">
                    </div>
                  </div>
                </div>
                <!-- 紹介図変更 -->
                  <div class="form-group">
                    <label  class="col-form-label" for="profile-picture">紹介図変更</label>
                    <div class="input-group mb-3">
                      <input type="file" name="profile_picture" value="{{old($brand->profile_picture) }}" id="profile-picture">
                      @if($errors->has('profile_picture'))
                      <p>{{ $errors->first('profile_picture') }}</p>
                      @endif
                    </div>
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
