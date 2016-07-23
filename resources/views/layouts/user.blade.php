<?php
  $categorys = DB::table('tb_category')->get();
  $items = DB::table('tb_item')->get();
  $banner = DB::table('tb_banner')->first();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>พรพิชิต กรุ๊ป จำหน่าย กุนเชียง-หมูหยอง</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/sweetalert.css') }}">


    <style>
      body {
        font-family: 'Kanit', sans-serif;
        background-color: #ffe6e6;
      }
    </style>

  </head>
  <body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            พรพิชิต กรุ๊ป
        </a>

      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">

          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">

            @if (session('current_menu') == 'home')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/') }}">หน้าแรก</a>
              </li>

            @if (session('current_menu') == 'how_to_buy')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/how_to_buy') }}">การสั่งซื้อสินค้า</a>
              </li>

            @if (session('current_menu') == 'how_to_payment')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/how_to_payment') }}">การชำระเงิน</a>
              </li>

            @if (session('current_menu') == 'how_to_send')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/how_to_send') }}">การจัดส่งสินค้า</a>
              </li>

            @if (session('current_menu') == 'about')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/about') }}">เกี่ยวกับเรา</a>
              </li>

            @if (session('current_menu') == 'contact')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/contact') }}">ติดต่อเรา</a>
              </li>

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

            <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> ผู้ดูแลระบบ</a></li>

          </ul>

      </div>

    </div>
  </nav>

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>

  <div class="container">
    <div class="row form-group">
      <div class="col-md-12" style="">
        <!-- <img style="width: 100%; height: 245px; background-color: #abc;" height="" src=""> -->

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img style="width: 100%; height: 458px;" src="{{ url('uploads/banner/'.$banner->image_1) }}">
            </div>

            <div class="item">
              <img style="width: 100%; height: 458px;" src="{{ url('uploads/banner/'.$banner->image_2) }}">
            </div>

            <div class="item">
              <img style="width: 100%; height: 458px;" src="{{ url('uploads/banner/'.$banner->image_3) }}">
            </div>

            <div class="item">
              <img style="width: 100%; height: 458px;" src="{{ url('uploads/banner/'.$banner->image_4) }}">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>

    <div class="row">

      <div class="col-md-3">

        <div class="form-group text-center" style="color: #ffffff; background-color: #ff6666; height: 40px; padding-top: 1px;">
          <h4>หมวดหมู่สินค้า</h4>
        </div>

        <div class="form-group">
          <ul style="font-size: 14px;">
            @foreach ($categorys as $category)
              <li>{{ $category->title }}</li>
              @foreach ($items as $item)
                <ul>
                @if ($category->title == $item->category)
                  <a href="{{ url('/view_item/'.$item->id) }}"><li>{{ $item->title }}</li></a>
                @endif
                </ul>
              @endforeach
            @endforeach
          </ul>
        </div>

        <div class="form-group">
          <img style="width: 100%;" src="{{ url('uploads/other/bank_info.png')}}" alt="">
        </div>

        <div class="form-group">
          <img style="width: 100%;" src="{{ url('uploads/other/contact.png')}}" alt="">
        </div>

      </div>

      <div class="col-md-9">
        @yield('content')
      </div>

    </div>

  </div>

  </body>
</html>
