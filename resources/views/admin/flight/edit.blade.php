@extends("layouts.admin.layout", ["type" => "flight"])

@section("title", "ルートの編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-12 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">ルートの編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_flight_edit', ['id' => $flight->id])}}" method="post">
                @csrf
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                <div class="form-group">
                    <label for="brand-name-input" class="col-form-label">航空会社名</label>
                    <input class="form-control" type="text" value="{{ old('brand_name', $flight->brand->brand_name) }}" id="brand-name-input" name="brand_name">
                    @if($errors->has('$flight->brand->brand_name'))
                      <p>{{ $errors->first('$flight->brand->brand_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                  <label for="flight_number-input" class="col-form-label">便番号</label>
                  <input class="form-control" type="text"  id="flight_number-input" placeholder="便番号を入力してください。" name="flight_number" value="{{ old('flight_number',$flight->flight_number) }}">
                  @if($errors->has('flight_number'))
                    <p>{{ $errors->first('flight_number') }}</p>
                  @endif
                </div>
                <!-- 航空会社紹介 -->

              <div class="form-group">
                <label for="mtb_start_airport_id-input" class="col-form-label">出発空港</label>
                <input class="form-control" type="text"  id="mtb_start_airport_id-input" placeholder="" name="mtb_start_airport_id" value="{{ old('mtb_start_airport_id',$flight->mtb_start_airport_id) }}">
                @if($errors->has('mtb_start_airport_id'))
                  <p>{{ $errors->first('mtb_start_airport_id') }}</p>
                @endif
              </div>

            <div class="form-group">
              <label for="mtb_destination_airport_id-input" class="col-form-label">到着空港</label>
              <input class="form-control" type="text"  id="mtb_destination_airport_id-input" placeholder="" name="mtb_destination_airport_id" value="{{ old('mtb_destination_airport_id',$flight->mtb_destination_airport_id) }}">
              @if($errors->has('mtb_destination_airport_id'))
                <p>{{ $errors->first('mtb_destination_airport_id') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="start_time-input" class="col-form-label">出発時刻</label>
              <input class="form-control" type="date"  id="start_time-input" placeholder="" name="start_time" value="{{ old('start_time',$flight->start_time) }}">
              @if($errors->has('start_time'))
                <p>{{ $errors->first('start_time') }}</p>
              @endif
            </div>
            <div class="form-group">
              <label for="destination_time-input" class="col-form-label">到着時刻</label>
              <input class="form-control" type="date"  id="destination_time-input" placeholder="" name="destination_time" value="{{ old('destination_time',$flight->destination_timee) }}">
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
