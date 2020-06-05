@extends('template.main')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Management User</h1>

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
          <li class="breadcrumb-item active">Management User</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <a class="btn btn-success mb-2" id="new-user" data-toggle="modal">Tambah User</a>
    </div>


    <div class="col-sm-12">
      <table class="table table-bordered data-table">
        <thead>
          <tr id="">
            <th width="5%">No</th>
            <th width="28%">Name</th>
            <th width="30%">Email</th>
            <th width="15">Role</th>
            <th width="22%">Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('user.form')
@endsection
<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function () {

    $('#alert').fadeOut(4000);
  
  var table = $('.data-table').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: "{{ route('user.index') }}",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'name', name: 'name'},
  {data: 'email', name: 'email'},
  {data: 'role', name: 'role', className: "text-center"},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
  });

/* When click save button */
  $("#btn-save").click(function () {
  var password = $("#password").val();
  var confirmPassword = $("#cpassword").val();
  if (password != confirmPassword) {
  swal("Password tidak cocok");
  return false;
  }
  return true;
  });

  /* When click ganti button */
  $("#btn-ganti").click(function () {
  var password = $("#gpassword").val();
  var confirmPassword = $("#gcpassword").val();
  if (password != confirmPassword) {
  swal("Password tidak cocok");
  return false;
  }
  return true;
  });
  
  /* When click New customer button */
  $('#new-user').click(function () {
  $('#btn-save').val("create-user");
  $('#userForm').trigger("reset");
  $('#userCrudModal').html("Add New User");
  $('#crud-modal').modal('show');
  $('#userForm').attr("action","{{route('user.store')}}");
  });
  
  /* Edit customer */
  $('body').on('click', '#edit-user', function () {
  var user_id = $(this).data('id');
  $('#userForm').attr("action","{{route('user.update')}}");
  $.get('/user/'+user_id+'/edit', function (data) {
  $('#userCrudModal').html("Edit User");
  $('#btn-update').val("Update");
  $('#crud-modal').modal('show');
  $('#user_id').val(data.id);
  $('#name').val(data.name);
  $('#email').val(data.email);
  $('#role').val(data.role);
  
  })
  });


  /* ganti password */
  $('body').on('click', '#pass-user', function () {
  var user_id = $(this).data('id');
  $.get('/user/'+user_id+'/edit', function (data) {
  $('#userCrudModal-pass').html("Ganti Password");
  $('#btn-ganti').val("Ganti");
  $('#crud-modal-pass').modal('show');
  $('#guser_id').val(data.id);
  
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
  $('body').on('click', '#delete-user', function () {
  var user_id = $(this).data("id");
  Swal.fire({
  title: 'Apakah Kamu Yakin ?',
  icon: 'warning',
  showCancelButton: true,
  cancelButtonColor: '#d33',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ya, hapus!',
  cancelButtonText: 'Tidak',
  allowOutsideClick: false,
  allowEscapeKey: false,
  }).then(function (result) {
  if (result.value) {
    $.ajax({
    type: "DELETE",
    url: "{{url('/user')}}/"+user_id,
    data: {
    "id": user_id,
    "_token": "{{csrf_token()}}",
    },
    success: function (data) {
    
    //$('#msg').html('Customer entry deleted successfully');
    //$("#customer_id_" + user_id).remove();
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

<!-- page script -->
{{-- <script>
  $(function () {
    $("#user").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
     });
  });
</script> --}}
{{-- <script>
    $(function() {
      var table = $('#user').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url:"{{route('user.index')}}"
},
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{data: 'action', name: 'action', orderable: false, searchable: false}
]
});
});

function deleteData(id){
var CsrfToken = $('meta[Type="csrf-token"]').attr('content');
swal({
title: 'Are you sure?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
cancelButtonColor: '#d33',
confirmButtonColor: '#3085d6',
confirmButtonText: 'Yes, delete it!'
}).then(function () {
$.ajax({
url : "{{ url('/user') }}" + '/' + id,
type : "POST",
data : {'_method' : 'DELETE', '_token' : CsrfToken},
success : function(data) {
table.ajax.reload();
swal({
title: 'Success!',
text: data.message,
type: 'success',
timer: '1500'
})
},
error : function () {
swal({
title: 'Oops...',
text: data.message,
type: 'error',
timer: '1500'
})
}
});
});
}


</script> --}}