@extends("layouts.admin.layout", ["type" => "airport", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "空港情報の追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">空港情報の新規作成</h3>
              <form action="{{ route('admin_post_airport_add') }}" method="post" enctype="multipart/form-data">

                @csrf

                <!-- 空港名 -->
                <div class="form-group">
                  <label for="brand-name-input" class="col-form-label">空港名</label>
                  <input class="form-control" type="text" placeholder="空港名を入力してください" id="airport-name-input" name="airport_name" value="{{old('airport_name')}}">
                  @if($errors->has('airport_name'))
                    <p>{{ $errors->first('airport_name') }}</p>
                  @endif
                </div>
                <!-- 都市名-->
                <div class="form-group">
                  <label class="col-form-label">都市の選択</label>
                  <select class="custom-select" name="mtb_city_id">
                    @foreach($cities as $city)

                    <option value="{{ $city->id}}"
                      @if(old('mtb_city_id') == $city->id)
                        selected
                      @endif
                      >{{ $city->value }}</option>

                    @endforeach
                    </select>

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
