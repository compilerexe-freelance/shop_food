@extends('layouts.admin')

@section('content')
  <?php $items = DB::table('tb_item')->get(); ?>
  <div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("ลบสินค้าสำเร็จ", "", "success")
        </script>
      @endif
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">

          <div class="panel-heading">
            ลบสินค้า
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>ชื่อสินค้า</th>
                  <th></th>
                </tr>
                @foreach ($items as $item)
                  <tr>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ url('/delete_product/'.$item->id) }}"><button class="btn btn-danger" style="width: 100%;"><i class="fa fa-btn fa-trash-o"></i> ลบ</button></a></td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
