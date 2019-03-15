@extends("layouts.app")

@section("title", "サイト一覧")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">サイトの新規作成</h3>
              <!-- form start -->
              <form action="{{route('post_add_sites')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="admin_user-input" class="col-form-label">name</label>
                  <input class="form-control" type="text"  placeholder="ネームを10桁まで入力してください。" name="side_name" value="{{old('name')}}">
                  @if($errors->has('side_name'))
                    <p>{{ $errors->first('side_name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">パスワード</label>
                    <input type="password" class="form-control" value="{{old('password')}}" placeholder="6桁～8桁のパスワードを入力してください。" name="password">
                    @if($errors->has('password'))
                      <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">URL</label>
                    <input type="text" class="form-control" value="{{old('url')}}" placeholder="6桁～8桁のパスワードを入力してください。" name="url">
                    @if($errors->has('url'))
                      <p>{{ $errors->first('url') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">site_code</label>
                    <input type="text" class="form-control" value="{{old('url')}}" placeholder="6桁～8桁のパスワードを入力してください。" name="site_code">
                    @if($errors->has('site_code'))
                      <p>{{ $errors->first('site_code') }}</p>
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
