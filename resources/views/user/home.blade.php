@extends('layouts.user')

@section('content')
<div class="form-group">
  <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ url('uploads/other/welcome.jpg' )}}" alt="">
</div>
<div class="form-group">
  <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ url('uploads/other/detail_shop.png' )}}" alt="">
</div>
<div class="form-group">
  <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ url('uploads/other/news.jpg' )}}" alt="">
</div>
<div class="form-group">
  <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ url('uploads/other/facebook.jpg' )}}" alt="">
</div>
<div class="form-group">
  <img style="width: 100%; height: 100%; border-radius: 5px;" src="{{ url('uploads/other/product.jpg' )}}" alt="">
</div>
<?php $items = DB::table('tb_item')->get(); ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <font color="blue" size="3">สินค้าทั้งหมด</font>
  </div>
  <div class="panel-body">

      @foreach ($items as $item)
      <div class="col-sm-6 col-md-6">
        <a href="{{ url('/view_item/'.$item->id) }}">
        <div class="thumbnail">
          <img src="{{ url('uploads/items/'.$item->image_1)}}" class="img-responsive">
          <div class="caption">
            <span style="font-size: 16px;">{{ $item->title }}</span><br>
            <span style="font-size: 16px;">ราคา {{ $item->price }} บาท</span>
          </div>
        </div>
        </a>
      </div>
      @endforeach

  </div>
</div>
@endsection
