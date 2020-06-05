@extends('template.main')
@section('content')



<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Donor Darah</h1>

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
          <li class="breadcrumb-item {{Request::is('donor') ? 'active' : ''}}"><a href="{{url('/donor')}}">Data
              Darah</a></li>
          <li class="breadcrumb-item ">Donor Darah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <a class="btn btn-success mb-2" id="new-donor" data-toggle="modal"><i class="fas fa-plus"></i> Tambah
        Darah</a>
    </div>


    <div class="col-sm-12">
      <table class="table table-bordered data-table">
        <thead>
          <tr id="">
            <th width="2%">No</th>
            <th>GD</th>
            <th>Jumlah</th>
            <th>Tanggal Donor</th>
            <th>Point</th>
            <th>Pendonor</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('donor.form')
@endsection
<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
$('.select2').select2();
});
</script>







<script type="text/javascript">
  $(document).ready(function () {
    

    $('#alert').fadeOut(4000);
  
  var table = $('.data-table').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: "{{ route('donor.index') }}",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'gol_darah', name: 'gol_darah'},
  {data: 'jumlah', name: 'jumlah'},
  {data: 'tgl_donor', name: 'tgl_donor'},
  {data: 'points', name: 'points'},
  {data: 'pendonor_id', name: 'pendonor_id'},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
  });


  
  /* When click New customer button */
  $('#new-donor').click(function () {
  $('#btn-save').val("create-donor");
  $('#userForm').trigger("reset");
  $('#pendonor_id').trigger('change');
  $('#userCrudModal').html("Tambah Darah");
  $('#crud-modal').modal('show');
  $('#userForm').attr("action","{{route('donor.store')}}");
  
  
  });


  

 
  
  /* Edit customer */
  $('body').on('click', '#edit-donor', function () {
  var donor_id = $(this).data('id');
  $('#userForm').attr("action","{{route('donor.update')}}");
  $.get('/donor/'+donor_id+'/edit', function (data) {
  $('#userCrudModal').html("Edit Donor Darah");
  $('#btn-update').val("Update");
  $('#crud-modal').modal('show');
  $('#pendonor_id').val(data.pendonor_id);
  $('#pendonor_id').trigger('change');
  $('#donor_id').val(data.id);
  $('#jumlah').val(data.jumlah);
  $('#tgl_donor').val(data.tgl_donor);
  $('#points').val(data.points);


  })
  });


  


  // /* Show customer */
  // $('body').on('click', '#show-user', function () {
  // var user_id = $(this).data('id');
  // $.get('/user/'+user_id, function (data) {
  
  // $('#sname').html(data.name);
  // $('#semail').html(data.email);
  
  // })
  // $('#userCrudModal-show').html("User Details");
  // $('#crud-modal-show').modal('show');
  // });
  
  /* Delete customer */
  $('body').on('click', '#delete-donor', function () {
  var donor_id = $(this).data("id");
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
      url: "{{url('/donor')}}/"+donor_id,
      data: {
      "id": donor_id,
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