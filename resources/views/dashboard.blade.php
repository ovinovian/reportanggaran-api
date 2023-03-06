@extends('layouts.app')

@section('style')

<!-- third party css -->
<link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
<!-- third party css end -->
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

<!-- Start Content-->
<div class="container-fluid">

    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Tasks</h4>

                    <p><b>107</b> Tasks completed out of 195</p>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h3 class="my-1 text-success">OPD</h3>
                                        <span class="">Jumlah OPD Provinsi Kepulauan Bangka
                                            Belitung</span>
                                    </td>
                                    <td>
                                        <h1 class="text-success text-end">{{ $opd->count() }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="my-1 text-danger">Anggaran (Rp.)</h3>
                                        <span class="">Total Pagu Anggaran Provinsi Kepulauan
                                            Bangka Belitung</span>
                                    </td>
                                    <td>
                                        <h1 id="tooltip-container2" class="text-end"><a href="/dashboard-detil-peropd"
                                                class="text-danger" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per OPD">{{
                                                number_format($data[0]['total_rincian'],0,',','.')
                                                }}</a></h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="my-1 text-warning">Realisasi (Rp.)</h3>
                                        <span class="">Total Realisasi Anggaran Provinsi
                                            Kepulauan
                                            Bangka Belitung</span>
                                    </td>
                                    <td>
                                        <h1 id="tooltip-container2" class="text-end"><a href="/dashboard-detil-peropd"
                                                class="text-warning" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per OPD">{{
                                                number_format($data[0]['total_realisasi'],0,',','.')
                                                }}</a></h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="my-1 text-info">Persentase Capaian (%)</h3>
                                        <span class="">Persentase Capaian Realisasi Anggaran
                                            Provinsi Kepulauan Bangka Belitung</span>
                                    </td>
                                    <td>
                                        <h1 id="tooltip-container2" class="text-end"><a href="/dashboard-detil-peropd"
                                                class="text-info" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per OPD">{{
                                                str_replace('.',',',number_format($data[0]['persentase_capaian'],2))
                                                }}</a></h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row -->
</div>
<!-- container -->

@endsection

@section('script')

<!-- third party js -->
<script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard.js') }}"></script>
<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.dashboard-analytics.js') }}"></script>
<!-- end demo js-->

@endsection