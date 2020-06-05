@extends('template.main')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Informasi</h1>

        @if ($errors->any())
        <div class="alert alert-danger" id="alert">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item ">Informasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <a class="btn btn-success mb-2" id="new-berita" data-toggle="modal"><i class="fas fa-plus"></i> Tambah
        Informasi</a>
    </div>


    <div class="col-sm-12">
      <table class="table table-bordered data-table">
        <thead>
          <tr id="">
            <th width="2%">No</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Waktu Posting</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('berita.form')
@endsection
<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>



<script type="text/javascript">
  $(document).ready(function () {

    //fungsi return datetime
    function date_for(date){
      var current_datetime = new Date(date);
      var month = current_datetime.getMonth() + 1;
      var minute = current_datetime.getMinutes();
      var hour = current_datetime.getHours();
        if (month < 10) {
          var month = "0"+month;
        } 
        if (hour < 10) {
          var hour = "0"+hour
        }
        if (minute < 10) {
          var minute = "0"+minute
        }
      var formatted_date = current_datetime.getFullYear() + "-" + month + "-" +
      current_datetime.getDate() + "T" + hour + ":" + minute;
      return formatted_date;
    }


    $('#alert').fadeOut(4000);
  
  var table = $('.data-table').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: "{{ route('berita.index') }}",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'judul', name: 'judul'},
  {data: 'foto', name: 'foto'},
  {data: 'deskripsi', name: 'deskripsi'},
  {data: 'waktu_posting', name: 'waktu_posting'},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
  });


  
  /* When click New customer button */
  $('#new-berita').click(function () {
  $('#btn-save').val("create-berita");
  $('#userForm').trigger("reset");
  $('#userCrudModal').html("Tambah Berita");
  $('#crud-modal').modal('show');
  $('#userForm').attr("action","{{route('berita.store')}}");
  $('#class-foto').show();
  $('#class-waktu_posting').show();
  $('#class-deskripsi').show();
  $('#class-judul').show();
  $('#deskripsi').summernote('code','');
  
  
  });


  

 
  
  /* Edit customer */
  $('body').on('click', '#edit-berita', function () {
  var berita_id = $(this).data('id');
  $('#userForm').attr("action","{{route('berita.update')}}");
  $.get('/berita/'+berita_id+'/edit', function (data) {
  $('#userCrudModal').html("Edit Informasi");
  $('#btn-update').val("Update");
  $('#crud-modal').modal('show');
  $('#berita_id').val(data.id);
  $('#waktu_posting').val(date_for(data.waktu_posting));
  $('#deskripsi').summernote('code',data.deskripsi);
  $('#judul').val(data.judul);
  $('#class-foto').hide();
  $('#class-waktu_posting').show();
  $('#class-deskripsi').show();
  $('#class-judul').show();


  })
  });


/* Ganti Gambar */
  $('body').on('click', '#edit-gambar', function () {
  var berita_id = $(this).data('id');
  $('#userForm').attr("action","{{route('berita.gambar')}}");
  $.get('/berita/'+berita_id+'/edit', function (data) {
  $('#userCrudModal').html("Edit Gambar");
  $('#btn-update').val("Ganti");
  $('#crud-modal').modal('show');
  $('#berita_id').val(data.id);
  $('#class-waktu_posting').hide();
  $('#class-deskripsi').hide();
  $('#class-judul').hide();
  $('#class-foto').show();


  })
  });
  


  
  
  /* Delete customer */
  $('body').on('click', '#delete-berita', function () {
  var berita_id = $(this).data("id");
  Swal.fire({
  title: 'Apakah Kamu Yakin ?',
  type: 'warning',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ya, hapus!',
  cancelButtonText: 'Tidak',
  allowOutsideClick: false,
  allowEscapeKey: false
  }).then(function (result) {

    if (result.value) {
      $.ajax({
      type: "DELETE",
      url: "{{url('/berita')}}/"+berita_id,
      data: {
      "id": berita_id,
      "_token": "{{csrf_token()}}",
      },
      success: function (data) {
      
      table.ajax.reload();
      Swal.fire({
      title: 'Data Terhapus',
      text: data.message,
      type: 'success',
      timer: '1500'
      })
      },
      error: function (data) {
      console.log('Error:', data);
      }
      });
    }
 
  });
});
  
  });
  
</script>