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
              <h3 class="header-title">サイトの編集</h3>
              <!-- form start -->
              <form action="" method="post">
                @csrf
                <input type="hidden" name="" value="">
                <div class="form-group">
                  <label for="admin_user-input" class="col-form-label">サイト名</label>
                  <input class="form-control" type="text" name="side_name" value="{{old('side_name')}}">
                  @if($errors->has('side_name'))
                    <p>{{ $errors->first('side_name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">URL</label>
                    <input type="text" class="form-control" value="{{old('url')}}" name="url">
                    @if($errors->has('url'))
                      <p>{{ $errors->first('url') }}</p>
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
