@extends('layouts.admin')

@section('content')
  <?php $categorys = DB::table('tb_category')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">

          <div class="panel-heading">
            แก้ไขหมวดหมู่ {{ $categorys->title }}
          </div>
          <div class="panel-body">
            <form action="{{ url('/update_category') }}" class="form-horizontal" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $categorys->id }}">

              <div class="form-group{{ $errors->has('title_category') ? ' has-error' : '' }}">
                <label for="title_category" class="col-md-4 control-label">ชื่อหมวดหมู่</label>
                <div class="col-md-6">
                  <input id="title_category" type="text" class="form-control" name="title_category" value="{{ $categorys->title }}" placeholder="ใส่ชื่อหมวดหมู่ที่ต้องการเพิ่ม ...">
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
                          <i class="fa fa-btn fa-save"></i> บันทึกการแก้ไข
                      </button>
                      <a href="{{ url('/') }}">
                        <button type="button" class="btn btn-danger">
                            ย้อนกลับ
                        </button>
                      </a>
                  </div>
              </div>

              <!-- <div class="form-group text-center">
                <button type="submit" class="btn btn-success" style="width: 30%; margin-right: 20px;"><i class="fa fa-btn fa-save"></i> บันทึกการแก้ไข</button>
                <a href="{{ url('/') }}"><button type="button" class="btn btn-danger" style="width: 30%;"> ย้อนกลับ</button></a>
              </div> -->
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
