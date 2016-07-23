@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("เพิ่มหมวดหมู่สำเร็จ", "", "success")
        </script>
      @endif
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">

          <div class="panel-heading">
            เพิ่มหมวดหมู่
          </div>
          <div class="panel-body">
            <form action="{{ url('/add_category') }}" class="form-horizontal" method="POST">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('title_category') ? ' has-error' : '' }}">
                <label for="title_category" class="col-md-4 control-label">ชื่อหมวดหมู่</label>
                <div class="col-md-6">
                  <input id="title_category" type="text" class="form-control" name="title_category" placeholder="ใส่ชื่อหมวดหมู่ที่ต้องการเพิ่ม ...">
                  @if ($errors->has('title_category'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 col-md-offset-4 text-center">
                      <button type="submit" class="btn btn-success">
                          <i class="fa fa-btn fa-plus"></i> เพิ่มหมวดหมู่
                      </button>
                  </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
