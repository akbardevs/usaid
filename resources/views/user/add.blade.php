@extends('template.main')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">User</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Tambah Users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
          <form role="form" action="{{url('/user')}}" method="POST">
            @csrf
              <div class="card-body">
                  <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="name" class="form-control" id="name" name="name" placeholder="Enter Nama">
                    </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
              </div>
                
                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>
          </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection