@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("แก้ไขแบนเนอร์สำเร็จ", "", "success")
        </script>
      @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">แก้ไขแบนเนอร์</div>
                <div class="panel-body">
                  {{ Form::open(['url'=>'/change_banner','method'=>'POST','class'=>'form-horizontal','files'=>true]) }}
                      {{ csrf_field() }}
                      <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-4 control-label">รูปภาพแบนเนอร์ 1</label>
                        <div class="col-md-6">
                          <input type="file"class="form-control" name="image_1">
                          @if ($errors->has('file'))
                            <span class="help-block">
                              <strong>กรุณากรอกข้อมูล</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-4 control-label">รูปภาพแบนเนอร์ 2</label>
                        <div class="col-md-6">
                          <input type="file"class="form-control" name="image_2">
                          @if ($errors->has('file'))
                            <span class="help-block">
                              <strong>กรุณากรอกข้อมูล</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-4 control-label">รูปภาพแบนเนอร์ 3</label>
                        <div class="col-md-6">
                          <input type="file"class="form-control" name="image_3">
                          @if ($errors->has('file'))
                            <span class="help-block">
                              <strong>กรุณากรอกข้อมูล</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-md-4 control-label">รูปภาพแบนเนอร์ 4</label>
                        <div class="col-md-6">
                          <input type="file"class="form-control" name="image_4">
                          @if ($errors->has('file'))
                            <span class="help-block">
                              <strong>กรุณากรอกข้อมูล</strong>
                            </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4 text-center">
                              <button type="submit" class="btn btn-success">
                                  <i class="fa fa-btn fa-save"></i> บันทึกการแก้ไข
                              </button>
                          </div>
                      </div>

                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
