@extends("layouts.admin.layout", ["type" => "admin"])

@section("title", "管理員の編集")


@section("content")

<div class="main-content-inner">
  <div class="row">
    <div class="col-lg-6 col-ml-12">
      <div class="row">

        <!-- Textual inputs start -->
        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-body">
              <h3 class="header-title">管理員の編集</h3>
              <!-- form start -->
              <form action="{{route('admin_post_admin_edit', ['id' => $admin->id])}}" method="post">
                @csrf
                <input type="hidden" name="admin_id" value="{{ $admin->id }}">

                <div class="form-group">
                    <label for="admin_user-input" class="col-form-label">管理員名</label>
                    <input class="form-control" type="text" value="{{ old('admin_user', $admin->admin_user) }}" id="admin_user-input" name="admin_user">
                    @if($errors->has('admin_user'))
                      <p>{{ $errors->first('admin_user') }}</p>
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
