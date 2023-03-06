@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
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
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sub OPD</th>
                                        <th>Nilai Anggaran (Rp.)</th>
                                        <th>Nilai Realisasi (Rp.)</th>
                                        <th>Persentase Capaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($opd as $key => $row)
                                    <tr>
                                        <td><a href="/dashboard-detil-persubkegiatan/{{ $row->kode_sub_unit }}"
                                                class="text-dark" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per Sub Kegiatan">{{ ++$i }}</a>
                                        </td>
                                        <td><a href="/dashboard-detil-persubkegiatan/{{ $row->kode_sub_unit }}"
                                                class="text-dark" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per Sub Kegiatan">{{
                                                $row->kode_sub_unit }} - {{ $row->nama_sub_unit }}</a></td>
                                        <td class="text-end"><a
                                                href="/dashboard-detil-persubkegiatan/{{ $row->kode_sub_unit }}"
                                                class="text-dark" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per Sub Kegiatan">{{
                                                number_format($row->total_rincian,0,',','.') }}</a></td>
                                        <td class="text-end"><a
                                                href="/dashboard-detil-persubkegiatan/{{ $row->kode_sub_unit }}"
                                                class="text-dark" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per Sub Kegiatan">{{
                                                number_format($row->total_realisasi,0,',','.') }}</a></td>
                                        <td class="text-end"><a
                                                href="/dashboard-detil-persubkegiatan/{{ $row->kode_sub_unit }}"
                                                class="text-dark" data-bs-container="#tooltip-container2"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Klik angka untuk melihat rincian per Sub Kegiatan">{{
                                                str_replace('.',',',number_format($row->persentase_capaian,2)) }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-end text-dark"><b>Total</td>
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