@extends("layouts.admin.layout", ["type" => "airport"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "空港情報の編集")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">空港情報の編集</h3>
              <form action="{{route('admin_post_airport_edit', ['id' => $airport->id])}}" method="post">
                <input type="hidden" name="airport_id" value="{{ $airport->id }}">
                @csrf

                <div class="form-group">
                  <label for="airport-name-input" class="col-form-label">空港名</label>
                  <input class="form-control" type="text" id="airport-name-input" name="airport_name" value="{{ old('airport_name', $airport->airport_name) }}">
                  @if($errors->has('airport_name'))
                    <p>{{ $errors->first('airport_name') }}</p>
                  @endif
                </div>

                <div class="form-group">
                  <label for="mtb_city_id-input" class="col-form-label">都市名</label>
                  <input class="form-control" type="text" id="mtb_city_id-input" value="{{ old('mtb_city_id', $airport->city->value) }}">
                  @if($errors->has('$airport->city->value'))
                    <p>{{ $errors->first('mtb_city_id') }}</p>
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
