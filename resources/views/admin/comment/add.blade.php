@extends("layouts.admin.layout", ["type" => "comment", "action" => "add"])
<!-- layout继承，php7的函数特有简略表达[]，传递了2个值 -->

@section("title", "コメントの追加")


@section("content")
<div class="main-content-inner">
  <div class="row">
    <!-- Textual inputs start -->
    <div class="col-12 mt-5">
      <div class="card">
        <div class="card-body">
          <h3 class="header-title">コメントの新規作成</h3>
          <form action="{{ route('admin_post_comment_add') }}" method="post">
            @csrf

            <!-- ユーザーコード -->
            <div class="form-group">
              <label for="user-code" class="col-form-label">ユーザーコード</label>
              <select class="custom-select" name="user_id" id="user-code">
                @foreach($users as $user)

                <option value="{{ $user->id }}"
                  @if(old('user_id') == $user->id)
                  selected
                  @endif
                  >{{ $user->code }}</option>
                  @endforeach
                </select>
              </div>


              <div class="row">
                <!-- 航空会社 -->
                <div class="form-group col-md-4">
                  <label class="col-form-label">航空会社</label>
                  <select class="custom-select" name="brand_id">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                      @if(old('brand_id') == $brand->id)
                      selected
                      @endif
                      >{{ $brand->brand_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- 航路 -->
                  <div class="form-group col-md-4">
                    <label class="col-form-label">航路</label>
                    <select class="custom-select" name="flight_id">
                      @foreach($flights as $flight)
                      <option value="{{ $flight->id }}"
                        @if(old('flight_id') == $flight->id)
                        selected
                        @endif
                        >{{ $flight->flight_number }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <!-- level comment 1-->
                  <div class="row">
                    <!-- サービス -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">サービス</label>
                      <select class="custom-select" name="service">
                        <option value="5" @if(old('service') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('service') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('service') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('service') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('service') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                    <!-- 清潔感 -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">清潔感</label>
                      <select class="custom-select" name="clean">
                        <option value="5" @if(old('clean') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('clean') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('clean') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('clean') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('clean') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                    <!-- 飲食 -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">飲食</label>
                      <select class="custom-select" name="food">
                        <option value="5" @if(old('food') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('food') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('food') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('food') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('food') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                  </div>

                  <!-- level comment 2-->
                  <div class="row">
                    <!-- 座席の快適 -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">座席の快適</label>
                      <select class="custom-select" name="seat">
                        <option value="5" @if(old('seat') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('seat') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('seat') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('seat') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('seat') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                    <!-- エンターテインメント -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">エンターテインメント</label>
                      <select class="custom-select" name="entertainment">
                        <option value="5" @if(old('entertainment') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('entertainment') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('entertainment') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('entertainment') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('entertainment') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                    <!-- コストパフォーマンス -->
                    <div class="form-group col-md-4">
                      <label class="col-form-label">コストパフォーマンス</label>
                      <select class="custom-select" name="cost_performance">
                        <option value="5" @if(old('cost_performance') == "5") selected @endif>とても良い</option>
                        <option value="4" @if(old('cost_performance') == "4") selected @endif>良い</option>
                        <option value="3" @if(old('cost_performance') == "3") selected @endif>普通</option>
                        <option value="2" @if(old('cost_performance') == "2") selected @endif>悪い</option>
                        <option value="1" @if(old('cost_performance') == "1") selected @endif>とても悪い</option>
                      </select>
                    </div>
                  </div>

                  <!-- 感想 -->
                  <div class="form-group">
                    <label for="content-input" class="col-form-label">コメント内容</label>
                    <textarea name="comment" class="form-control my-editor" id="content-input" rows="8" cols="80">{{ old('comment') }}</textarea>
                    @if($errors->has('comment'))
                    <p>{{ $errors->first('comment') }}</p>
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
        @endsection
