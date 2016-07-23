@extends('layouts.admin')

@section('content')
  <?php $categorys = DB::table('tb_category')->get(); ?>
  <div class="container">
    <div class="row">
      @if (session('status'))
        <script type="text/javascript">
          swal("แก้ไขหมวดหมู่สำเร็จ", "", "success")
        </script>
      @endif
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">

          <div class="panel-heading">
            แก้ไขหมวดหมู่
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>ชื่อหมวดหมู่</th>
                  <th></th>
                </tr>
                @foreach ($categorys as $category)
                  <tr>
                    <td>{{ $category->title }}</td>
                    <td><a href="{{ url('/edit_category/'.$category->id) }}"><button class="btn btn-warning" style="width: 100%;"><i class="fa fa-btn fa-edit"></i> แก้ไข</button></a></td>
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
