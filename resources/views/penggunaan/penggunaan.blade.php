@extends('template.main')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Penggunaan Darah</h1>

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
          <li class="breadcrumb-item {{Request::is('penggunaan') ? 'active' : ''}}"><a
              href="{{url('/penggunaan')}}">Data
              Darah</a></li>
          <li class="breadcrumb-item ">Penggunaan Darah</li>

        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">

        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>A+</i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['ap'] - $terpakais['ap']}}</span>

            @php
            if($tersedias['ap'] == 0){
            $ap = 1;
            }else {
            $ap = $tersedias['ap'];
            }
            @endphp
            <div class="progress">
              <div class="progress-bar" style="width: {{($terpakais['ap']*100)/$ap}}%"></div>
            </div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>B+</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['bp'] - $terpakais['bp']}}</span>
          </div>
          @php
          if($tersedias['bp'] == 0){
          $bp = 1;
          }else {
          $bp = $tersedias['bp'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['bp']*100)/$bp}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>AB+</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['abp']- $terpakais['abp']}}</span>
          </div>
          @php
          if($tersedias['abp'] == 0){
          $abp = 1;
          }else {
          $abp = $tersedias['abp'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['abp']*100)/$abp}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>O+</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['op']- $terpakais['op']}}</span>
          </div>
          @php
          if($tersedias['op'] == 0){
          $op = 1;
          }else {
          $op = $tersedias['op'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['op']*100)/$op}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>A-</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['am']- $terpakais['am']}}</span>
          </div>
          @php
          if($tersedias['am'] == 0){
          $am = 1;
          }else {
          $am = $tersedias['am'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['am']*100)/$am}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>B-</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['bm'] - $terpakais['bm']}}</span>
          </div>
          @php
          if($tersedias['bm'] == 0){
          $bm = 1;
          }else {
          $bm = $tersedias['bm'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['bm']*100)/$bm}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>AB-</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['abm']- $terpakais['abm']}}</span>
          </div>
          @php
          if($tersedias['abm'] == 0){
          $abm = 1;
          }else {
          $abm = $tersedias['abm'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['abm']*100)/$abm}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i>O-</i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tersedia</span>
            <span class="info-box-number">{{$tersedias['om']- $terpakais['om']}}</span>
          </div>
          @php
          if($tersedias['om'] == 0){
          $om = 1;
          }else {
          $om = $tersedias['om'];
          }
          @endphp
          <div class="progress">
            <div class="progress-bar" style="width: {{($terpakais['om']*100)/$om}}%"></div>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <a class="btn btn-success mb-2" id="new-penggunaan" data-toggle="modal"><i class="fas fa-plus"></i> Tambah
        Penggunaan</a>
    </div>


    <div class="col-sm-12">
      <table class="table table-bordered data-table">
        <thead>
          <tr id="">
            <th width="2%">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>GD</th>
            <th>Jumlah</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div><!-- /.container-fluid -->
</section>
@include('penggunaan.form')
@endsection
<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>



<script type="text/javascript">
  $(document).ready(function () {
    

    $('#alert').fadeOut(4000);
  
  var table = $('.data-table').DataTable({
  responsive: true,
  processing: true,
  serverSide: true,
  ajax: "{{ route('penggunaan.index') }}",
  columns: [
  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
  {data: 'nama', name: 'nama'},
  {data: 'alamat', name: 'alamat'},
  {data: 'gol_darah', name: 'gol_darah'},
  {data: 'jumlah', name: 'jumlah'},
  {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
  });


  
  /* When click New customer button */
  $('#new-penggunaan').click(function () {
  $('#btn-save').val("create-penggunaan");
  $('#userForm').trigger("reset");
  $('#userCrudModal').html("Tambah Penggunaan");
  $('#crud-modal').modal('show');
  $('#userForm').attr("action","{{route('penggunaan.store')}}");
  
  
  });


  

 
  
  /* Edit customer */
  $('body').on('click', '#edit-penggunaan', function () {
  var penggunaan_id = $(this).data('id');
  $('#userForm').attr("action","{{route('penggunaan.update')}}");
  $.get('/penggunaan/'+penggunaan_id+'/edit', function (data) {
  $('#userCrudModal').html("Edit penggunaan Darah");
  $('#btn-update').val("Update");
  $('#crud-modal').modal('show');
  $('#penggunaan_id').val(data.id);
  $('#jumlah').val(data.jumlah);
  $('#gol_darah').val(data.gol_darah);
  $('#nama').val(data.nama);
  $('#alamat').val(data.alamat);


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
  $('body').on('click', '#delete-penggunaan', function () {
  var penggunaan_id = $(this).data("id");
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
      url: "{{url('/penggunaan')}}/"+penggunaan_id,
      data: {
      "id": penggunaan_id,
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