@extends('layouts.user')

@section('content')
<?php
  $item = DB::table('tb_item')->where('id', $id)->first();
?>

  <div class="panel panel-info">
    <div class="panel-heading">
      <font color="blue" size="3">รายละเอียดสินค้า {{ $item->title }}</font>
    </div>
    <div class="panel-body">
      <div class="col-md-7">
        @if ($item->image_1 != null)
          <div class="form-group">
            <img src="{{ url('uploads/items/'.$item->image_1) }}" class="img-responsive">
          </div>
        @endif
        @if ($item->image_2 != null)
          <div class="form-group">
            <img src="{{ url('uploads/items/'.$item->image_2) }}" class="img-responsive">
          </div>
        @endif
        @if ($item->image_3 != null)
          <div class="form-group">
            <img src="{{ url('uploads/items/'.$item->image_3) }}" class="img-responsive">
          </div>
        @endif
      </div>
      <div class="col-md-5" style="color: red; font-size: 16px;">
        <span>หมวดหมู่ : {{ $item->category }}</span><br>
        <span>รหัสสินค้า : {{ $item->code }}</span><br>
        <span>รายละเอียดสินค้า</span><br>
        <span style="color: #000000;">{{ $item->detail }}</span>
      </div>
    </div>
  </div>
@endsection
