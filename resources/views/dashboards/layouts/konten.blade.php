@extends('dashboards.base_layout')

@section('style')
<link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<style>
    .card-1 {
        background-color: rgb(255, 204, 204);
    }

    .card-2 {
        background-color: rgb(179, 179, 255);
    }

    .card-3 {
        background-color: rgb(204, 255, 221)
    }

    .card-4 {
        background-color: rgb(255, 255, 153);
    }
</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <!-- end page title -->
    @if(Session::has('success'))
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Perhatian !! - </strong> {{ Session::get('success')}}
            </div>
        </div>
    </div>
    @endif

    <div class="row mt-4">
        <div class="col-xl-3 col-lg-4">
            <div class="card tilebox-one card-3">
                <div class="card-body">
                    <i class='uil uil-users-alt float-end'></i>
                    <h6 class="text-uppercase mt-0">Jumlah OPD</h6>
                    <h2 class="my-2">{{ $opd->count() }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
        <div class="col-xl-3 col-lg-4">

            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil uil-users-alt float-end'></i>
                    <h6 class="text-uppercase mt-0">Total Anggaran</h6>
                    <h2 class="my-2">{{ $data[0]['total_rincian'] }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card tilebox-one card-3">
                <div class="card-body">
                    <i class='uil uil-users-alt float-end'></i>
                    <h6 class="text-uppercase mt-0">Total Realisasi </h6>
                    <h2 class="my-2">{{ $data[0]['total_realisasi'] }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->

        <div class="col-xl-3 col-lg-4">
            <div class="card tilebox-one">
                <div class="card-body">
                    <i class='uil uil-users-alt float-end'></i>
                    <h6 class="text-uppercase mt-0">Persentase Capaian</h6>
                    <h2 class="my-2">{{ $data[0]['persentase_capaian'] }}</h2>
                </div> <!-- end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>

</div>
<!-- container -->
<!-- container -->
@endsection
@section('script')
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.init.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard-analytics.js') }}"></script>

<script>
    @if ($message = Session::get('success'))
        swal(
            "Perhatian !!!",
            "{{ $message }}",
            "warning"
        )
    @endif
</script>

@endsection