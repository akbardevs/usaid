@extends('template.main')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Notifikasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Notifikasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Buat Notifikasi</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{url('/notif')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="password">Gambar Notif</label>
            <input type="file" name="foto" id="foto" class="form-control" placeholder="Foto">
          </div>
        </div>


        <!-- /.card-body -->

        <div class="card-footer text-right">
          <button type="submit" class="btn btn-danger btn-lg">Kirim Notifikasi</button>
        </div>
      </form>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection
<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {
  $('#deskripsi').summernote('code','');
});
</script>