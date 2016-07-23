@extends('layouts.admin')

@section('content')
<?php
  $read_item = DB::table('tb_item')->where('id', $id)->first();
  $categorys = DB::table('tb_item')->select('category')->groupBy('category')->havingRaw('category < 1')->get();
  $state = 0; // loop category protect double
?>
<div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("แก้ไขสินค้าสำเร็จ", "", "success")
        </script>
      @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">แก้ไขสินค้า</div>
                <div class="panel-body">
                    {{ Form::open(['url'=>'/edit_product','method'=>'POST','class'=>'form-horizontal','files'=>true]) }}
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $read_item->id}}">

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">หมวดหมู่สินค้า</label>

                            <div class="col-md-6">
                                <select class="form-control" name="category">
                                    <option>{{ $read_item->category }}</option>
                                    @foreach ($categorys as $category)
                                      @if ($category->category != $read_item->category)
                                        <option>{{ $category->category }}</option>

                                      @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                          <label for="code" class="col-md-4 control-label">รหัสสินค้า</label>
                          <div class="col-md-6">
                            <input id="code" type="text" class="form-control" name="code" value="{{ $read_item->code }}">
                            @if ($errors->has('code'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <label for="title" class="col-md-4 control-label">ชื่อสินค้า</label>
                          <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $read_item->title }}">
                            @if ($errors->has('title'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                          <label for="detail" class="col-md-4 control-label">รายละเอียด</label>
                          <div class="col-md-6">
                            <textarea id="detail" class="form-control" name="detail" rows="8" style="resize:none">{{ $read_item->detail }}</textarea>
                            @if ($errors->has('detail'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                          <label for="file" class="col-md-4 control-label">รูปภาพสินค้า</label>
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
                          <label for="file" class="col-md-4 control-label">รูปภาพสินค้า</label>
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
                          <label for="file" class="col-md-4 control-label">รูปภาพสินค้า</label>
                          <div class="col-md-6">
                            <input type="file"class="form-control" name="image_3">
                            @if ($errors->has('file'))
                              <span class="help-block">
                                <strong>กรุณากรอกข้อมูล</strong>
                              </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                          <label for="price" class="col-md-4 control-label">ราคาสินค้า (บาท)</label>
                          <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" value="{{ $read_item->price }}" placeholder="ตัวอย่าง 1000">
                            @if ($errors->has('price'))
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
