<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>ผู้ดูแลระบบ</title>

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
      tr th {
        text-align: center;
      }
      tr td {
        text-align: center;
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

          @if (session('current_menu') == 'category')
              <li class="dropdown active">
              @else
              <li class="dropdown">
          @endif
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    จัดการหมวดหมู่ <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/add_category') }}">เพิ่มหมวดหมู่</a></li>
                    <li><a href="{{ url('/edit_category') }}">แก้ไขหมวดหมู่</a></li>
                    <li><a href="{{ url('/delete_category') }}">ลบหมวดหมู่</a></li>
                </ul>
            </li>

            @if (session('current_menu') == 'product')
                <li class="dropdown active">
                @else
                <li class="dropdown">
            @endif
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      จัดการสินค้า <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ url('/add_product') }}">เพิ่มสินค้า</a></li>
                      <li><a href="{{ url('/edit_product') }}">แก้ไขสินค้า</a></li>
                      <li><a href="{{ url('/delete_product') }}">ลบสินค้า</a></li>
                  </ul>
              </li>

            @if (session('current_menu') == 'banner')
                <li class="active">
                @else
                <li>
            @endif
                  <a href="{{ url('/change_banner') }}">จัดการแบนเนอร์</a>
              </li>

          </ul> <!-- End Left Side Of Navbar  -->

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> ออกจากระบบ</a></li>
                </ul>
            </li>

          </ul>

      </div>

    </div>
  </nav>

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{ URL::asset('assets/js/sweetalert.min.js') }}"></script>

  @yield('content')

  </body>
</html>
