@extends("layouts.admin.layout", ["type" => "country"])

@section("title", "国の編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">国の編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_country_edit', ['id' => $country->id] )}}" method="post">
                @csrf
                <input type="hidden" name="country_id" value="{{ $country->id }}">

                <div class="form-group">
                    <label for="value-input" class="col-form-label">国名</label>
                    <input class="form-control" type="text" value="{{ old('value', $country->value) }}" id="value-input" name="value">
                    @if($errors->has('value'))
                      <p>{{ $errors->first('value') }}</p>
                    @endif
                </div>
                <div class="form-group">
                  <label for="rank-input" class="col-form-label">ランク</label>
                  <input class="form-control" type="text"  id="rank-input"  name="rank" value="{{ old('rank', $country->rank) }}">
                  @if($errors->has('rank'))
                    <p>{{ $errors->first('rank') }}</p>
                  @endif
                </div>
                <!-- button -->
                <div class="row justify-content-md-center">
                    <div class="col col-lg-2">
                      <input class="btn btn-rounded btn-primary mb-3" type="submit" value="提出">
                    </div>
                    <div class="col-md-auto">
                    </div>
                    <div class="col col-lg-2">
                      <input type="reset" class="btn btn-rounded btn-danger mb-3" value="リセット">
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
