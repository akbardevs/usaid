@extends('template.main')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$wg_d}}</h3>

                        <p>Donor Darah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <a href="{{url('/donor')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$wg_p}}</h3>

                        <p>Penggunaan Darah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-water"></i>
                    </div>
                    <a href="{{url('/penggunaan')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Pendonor</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{url('/pendonor')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$wg_b}}</h3>

                        <p>Berita</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <a href="{{url('/berita')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6">


                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Donor Darah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <select class="sel-donor" name="year" id="year">
                            <option value="2020">Tahun 2020</option>
                            <option value="2021">Tahun 2021</option>
                            <option value="2022">Tahun 2022</option>
                        </select>
                        <div class="chart">
                            {!! $donorChart->container() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- stok CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Stok Darah yang Tersedia</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            {!! $stoksChart->container() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Pendonor</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <select class="sel-dash" name="year" id="year">
                            <option value="2020">Tahun 2020</option>
                            <option value="2021">Tahun 2021</option>
                            <option value="2022">Tahun 2022</option>
                        </select>
                        <div class="chart">
                            {!! $dashChart->container() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

<script src="{{asset('adminlte/dist/plugins/jquery/jquery.min.js')}}"></script>

{!! $dashChart->script() !!}
{!! $donorChart->script() !!}
{!! $stoksChart->script() !!}
<script type="text/javascript">
    $(document).ready(function () {
    var original_api_url_dash = {{ $dashChart->id }}_api_url;
    var original_api_url_donor = {{ $donorChart->id }}_api_url;
            $(".sel-dash").change(function(){
                var year = $(this).val();
                {{ $dashChart->id }}_refresh(original_api_url_dash + "?year="+year);
            });
            $(".sel-donor").change(function(){
            var year = $(this).val();
            {{ $donorChart->id }}_refresh(original_api_url_donor + "?year="+year);
            });
});
</script>