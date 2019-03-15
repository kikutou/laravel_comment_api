@extends("layouts.admin.layout", ["type" => "user", "action" => "add"])

@section("title", "会員の新規作成")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">会員の新規作成</h3>
              <!-- form start -->
              <form action="{{route('admin_post_user_add')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email-input" class="col-form-label">メールアドレス</label>
                    <input class="form-control" type="email" value="{{old('email')}}" id="email-input" name="email">
                    @if($errors->has('email'))
                      <p>{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="">パスワード</label>
                    <input type="password" class="form-control" id="inputPassword" value="{{old('password')}}" placeholder="6桁～8桁のパスワードを入力してください。" name="password">
                    @if($errors->has('password'))
                      <p>{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="form-group">
                  <label for="nickname-input" class="col-form-label">ニックネーム</label>
                  <input class="form-control" type="text"  id="nickname-input" placeholder="ニックネームを10桁まで入力してください。" name="nickname" value="{{old('nickname')}}">
                  @if($errors->has('nickname'))
                    <p>{{ $errors->first('nickname') }}</p>
                  @endif
                </div>
                <h3 class="header-title">会員情報</h3>
                <div class="form-group">
                    <label for="name-input" class="col-form-label">名前</label>
                    <input class="form-control" type="text" value="{{old('name')}}" id="name-input" name="name">

                </div>
                <div class="form-group">
                    <label for="birthday-input" class="col-form-label">生年月日</label>
                    <input class="form-control" type="date" value="{{old('birthday')}}" id="birthday-input" name="birthday">

                </div>
                <div class="form-group">
                  <label class="col-form-label">所在地</label>
                  <select class="custom-select" name="mtb_address_prefecture_id">
                    <option value=""></option>
                    @foreach( $prefectures as $prefecture)
                    <option value="{{ $prefecture->id}}"
                      @if(old('mtb_address_prefecture_id') == $prefecture->id)
                        selected
                      @endif
                      >{{ $prefecture->value }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_detail-input" class="col-form-label">住所</label>
                    <input class="form-control" type="text" value="{{old('address_detail')}}" id="address_detail-input" name="address_detail">

                </div>
                <div class="form-group">
                  <label class="col-form-label">性別</label>
                  <select class="custom-select" name="gender_flg">
                    <option value="1" @if (old('gender_flg') == "1") {{ 'selected' }} @endif>ー</option>
                    <option value="2" @if (old('gender_flg') == "2") {{ 'selected' }} @endif>男性</option>
                    <option value="3" @if (old('gender_flg') == "3") {{ 'selected' }} @endif>女性</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="col-form-label">会員状態</label>
                  <select class="custom-select" name="user_status">
                    <option value=""></option>
                    @foreach( $user_statuses as $user_status)
                    <option value="{{ $user_status->id}}"
                      @if(old('user_status') == $user_status->id)
                        selected
                      @endif
                      >{{ $user_status->value }}</option>
                    @endforeach
                    </select>
                    @if($errors->has('user_status'))
                      <p>{{ $errors->first('user_status') }}</p>
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
