@extends("layouts.admin.layout", ["type" => "flight", "action" => "add"])

@section("title", "ルートの新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">ルートの新規作成</h3>
              <!-- form start -->
              <form action="{{route('admin_post_flight_add')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="col-form-label">航空会社の選択</label>
                  <select class="custom-select" name="brand_id">
                    @foreach($brands as $brand)

                    <option value="{{ $brand->id}}"
                      @if(old('brand_id') == $brand->id)
                        selected
                      @endif
                      >{{ $brand->brand_name }}</option>

                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="flight_number-input" class="">便番号</label>
                    <input type="flight_number" class="form-control" id="flight_number-input" name="flight_number"  placeholder="便番号を入力してください。"value="{{old('flight_number')}}">
                    @if($errors->has('flight_number'))
                      <p>{{ $errors->first('flight_number') }}</p>
                    @endif
                </div>
                <div class="form-group">
                  <label class="col-form-label">出発空港の選択</label>
                  <select class="custom-select" name="mtb_start_airport_id">
                    @foreach($airports as $airport)

                    <option value="{{ $airport->id}}"
                      @if(old('mtb_start_airport_id') == $airport->id)
                        selected
                      @endif
                      >{{ $airport->airport_name}}</option>

                    @endforeach
                  </select>
                  </div>
                    <div class="form-group">
                      <label class="col-form-label">到着空港の選択</label>
                      <select class="custom-select" name="mtb_destination_airport_id">
                        @foreach($airports as $airport)

                        <option value="{{ $airport->id }}"
                          @if(old('mtb_destination_airport_id') == $airport->id)
                            selected
                          @endif
                          >{{ $airport->airport_name }}</option>

                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="start_time-input" class="">出発時刻</label>
                          <input type="date" class="form-control" id="start_time-input" name="start_time"  placeholder=""　value="{{old('start_time')}}">
                          @if($errors->has('start_time'))
                            <p>{{ $errors->first('start_time') }}</p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="destination_time-input" class="">到着時刻</label>
                          <input type="date" class="form-control" id="destination_time-input" name="destination_time"  placeholder=""　value="{{old('destination_time')}}">
                          @if($errors->has('destination_time'))
                            <p>{{ $errors->first('destination_time') }}</p>
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
