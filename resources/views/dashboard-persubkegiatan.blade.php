@extends('layouts.app')

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                            <table id="scroll-horizontal-datatable" class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Sub OPD</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Kegiatan</th>
                                        <th scope="col">Sub Kegiatan</th>
                                        <th scope="col">Nilai Anggaran (Rp.)</th>
                                        <th scope="col">Nilai Realisasi (Rp.)</th>
                                        <th scope="col">Persentase Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sub_opd = "";
                                    $program = "";
                                    $kegiatan = "";
                                    @endphp

                                    @foreach ($opd as $key => $row)
                                    @php
                                    if($sub_opd != $row->kode_sub_unit){
                                    $sub_opd = $row->kode_sub_unit;
                                    $tampil_sub_opd = $row->kode_sub_unit.' - '.$row->nama_sub_unit;
                                    }
                                    else{
                                    $tampil_sub_opd = "";
                                    }

                                    if($program != $row->kode_program){
                                    $program = $row->kode_program;
                                    $tampil_program = $row->kode_program.' - '.$row->nama_program;
                                    }
                                    else{
                                    $tampil_program = "";
                                    }

                                    if($kegiatan != $row->kode_kegiatan){
                                    $kegiatan = $row->kode_kegiatan;
                                    $tampil_kegiatan = $row->kode_kegiatan.' - '.$row->nama_kegiatan;
                                    }
                                    else{
                                    $tampil_kegiatan = "";
                                    }

                                    @endphp
                                    <tr>
                                        <td scope="row">{{ ++$i }}</td>
                                        {{-- <td>{{ $tampil_sub_opd }}</td>
                                        <td>{{ $tampil_program }}</td>
                                        <td>{{ $tampil_kegiatan }}</td> --}}
                                        <td>{{ $row->kode_sub_unit }} - {{ $row->nama_sub_unit }}</td>
                                        <td>{{ $row->kode_program }} - {{ $row->nama_program }}</td>
                                        <td>{{ $row->kode_kegiatan }} - {{ $row->nama_kegiatan }}</td>
                                        <td>{{ $row->kode_sub_kegiatan }} - {{ $row->nama_sub_kegiatan }}</td>
                                        <td class="text-end">{{ number_format($row->total_rincian,0,',','.') }}</td>
                                        <td class="text-end">{{ number_format($row->total_realisasi,0,',','.') }}</td>
                                        <td class="text-end">{{
                                            str_replace('.',',',number_format($row->persentase_capaian,2)) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-end text-dark" scope="row"><b>Total</td>
                                        <td class="text-end text-dark">-</td>
                                        <td class="text-end text-dark">-</td>
                                        <td class="text-end text-dark">-</td>
                                        <td class="text-end text-dark">-</td>
                                        <td class="text-end text-dark"><b>{{
                                                number_format($data[0]['total_rincian'],0,',','.') }}</td>
                                        <td class="text-end text-dark"><b>{{
                                                number_format($data[0]['total_realisasi'],0,',','.') }}</td>
                                        <td class="text-end text-dark"><b>{{
                                                str_replace('.',',',number_format($data[0]['persentase_capaian'],2)) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

</div>
<!-- container -->
<!-- container -->
@endsection
@section('script')
{{-- <script src="{{ asset('assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script> --}}

<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert.init.js')}}"></script>
<!-- third party js ends -->

<!-- demo app -->
{{-- <script src="{{ asset('assets/js/pages/demo.dashboard-analytics.js') }}"></script> --}}

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