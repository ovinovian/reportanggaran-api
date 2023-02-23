@extends('layouts.default')

@section('title', 'Excell')

@section('content')
<div class="container shadow-sm bg-body rounded py-4">
  <header class="pb-3 mb-4 border-bottom">
    <a href="{{ route($type . '.index') }}" class="d-flex align-items-center text-dark text-decoration-none">
      {{-- <img src="" class="me-2 fill-blue" width="50" height="50"
        alt="{{ config('app.name', 'Laravel 9') }} | @yield('title')"> --}}
      <span class="fs-4">@yield('title')</span>
    </a>
  </header>

  <div class="row mb-3">
    <div class="col d-flex justify-content-end">
      <div class="btn-group" role="group" aria-label="Basic outlined example">
        {{-- <a href="{{ route($type . '.export') }}" class="btn btn-outline-primary text-capitalize">
          <i class="fa-solid fa-file-arrow-down fa-lg me-1"></i>
          {{ __('Download') }}
        </a> --}}
        <a href="{{ route($type . '.import') }}" class="btn btn-outline-primary text-capitalize">
          <i class="fa-solid fa-file-arrow-up fa-lg me-1"></i>
          {{ __('Upload') }}
        </a>

        {{--
        // client-side export
        <button type="button" id="exportExcel" class="btn btn-outline-primary text-capitalize">
          <i class="fa-regular fa-file-excel me-1"></i>
          {{ __('Excel') }}
        </button>
        <button type="button" id="exportPdf" class="btn btn-outline-primary text-capitalize">
          <i class="fa-regular fa-file-pdf fa-lg me-1"></i>
          {{ __('PDF') }}
        </button>
        --}}

      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search" id="search">
        <span class="input-group-text">
          <i class="fa-solid fa-magnifying-glass"></i>
        </span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <table id="data-table" class="table table-striped table-hover table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th scope="col">Kode Urusan</th>
            <th scope="col">Nama Urusan</th>
            <th scope="col">Kode OPD</th>
            <th scope="col">Nama OPD</th>
            <th scope="col">Kode Bidang Urusan</th>
            <th scope="col">Nama Bidang Urusan</th>
            <th scope="col">Kode Sub Unit</th>
            <th scope="col">Nama Sub Unit</th>
            <th scope="col">Kode Program</th>
            <th scope="col">Nama Program</th>
            <th scope="col">Kode Kegiatan</th>
            <th scope="col">Nama Kegiatan</th>
            <th scope="col">Kode Sub Kegiatan</th>
            <th scope="col">Nama Sub Kegiatan</th>
            <th scope="col">Kode Rekening</th>
            <th scope="col">Nama Rekening</th>
            <th scope="col">Nilai Rincian</th>
            <th scope="col">Nilai Realisasi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@once
@push('after-style')
<style>
  .dropdown-toggle::after {
    display: none;
  }

  .dataTables_processing {
    z-index: 11000 !important;
  }
</style>
@endpush
@endonce

@once
@push('after-scripts')
<script>
  $(function() {
      $.fn.DataTable.ext.pager.numbers_length = 5;

      var table = $('#data-table').DataTable({
        ajax: {
          url: "{{ route($type . '.index') }}",
        },
        autoWidth: false,
        columns: [
          {
            name: 'DT_RowIndex',
            data: 'DT_RowIndex',
            orderable: false,
            searchable: false
          },
          { name: 'kode_urusan', data: 'kode_urusan' },
          { name: 'nama_urusan', data: 'nama_urusan' },
          { name: 'kode_opd', data: 'kode_opd' },
          { name: 'nama_opd', data: 'nama_opd' },
          { name: 'kode_bidang_urusan', data: 'kode_bidang_urusan' },
          { name: 'nama_bidang_urusan', data: 'nama_bidang_urusan' },
          { name: 'kode_sub_unit', data: 'kode_sub_unit' },
          { name: 'nama_sub_unit', data: 'nama_sub_unit' },
          { name: 'kode_program', data: 'kode_program' },
          { name: 'nama_program', data: 'nama_program' },
          { name: 'kode_kegiatan', data: 'kode_kegiatan' },
          { name: 'nama_kegiatan', data: 'nama_kegiatan' },
          { name: 'kode_sub_kegiatan', data: 'kode_sub_kegiatan' },
          { name: 'nama_sub_kegiatan', data: 'nama_sub_kegiatan' },
          { name: 'kode_rekening', data: 'kode_rekening' },
          { name: 'nama_rekening', data: 'nama_rekening' },
          { name: 'nilai_rincian', data: 'nilai_rincian' },
          { name: 'nilai_realisasi', data: 'nilai_realisasi' },
        ],
        columnDefs: [
          {
            targets: 'action',
            className: "text-center",
          },
          {
            targets: 'status',
            className: "text-center",
          },
        ],
        deferRender: true,
        dom: "" +
          "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
        "",
        fixedHeader: {
          header: true,
        },
        language: {
          decimal: "",
          emptyTable: "No data available in table",
          info: "Showing _START_ to _END_ of _TOTAL_ entries",
          infoEmpty: "Showing 0 to 0 of 0 entries",
          infoFiltered: "(filtered from _MAX_ total entries)",
          infoPostFix: "",
          thousands: ",",
          lengthMenu: "Show _MENU_",
          loadingRecords: "Loading...",
          processing: "",
          search: "",
          searchPlaceholder: "Search",
          zeroRecords: "No matching records found",
          paginate: {
            first: "<i class='fa-solid fa-angles-left'></i>",
            last: "<i class='fa-solid fa-angles-right'></i>",
            next: "<i class='fa-solid fa-angle-right'></i>",
            previous: "<i class='fa-solid fa-angle-left'></i>"
          },
          aria: {
              sortAscending:  ": activate to sort column ascending",
              sortDescending: ": activate to sort column descending"
          }
        },
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, 100],
            [5, 10, 25, 50, 100],
        ],
        order: [1,'desc'],
        pageLength: 50,
        pagingType: 'full_numbers',
        processing: true,
        responsive: true,
        searching: true,
        serverSide: true,
        select: false,
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        drawCallback: function( settings ) {
          $('[data-bs-toggle="tooltip"]').tooltip({
            container : 'body'
          });
        },
      });

      $('#search').keypress(function(e) {
        table.search($(this).val()).draw();
      });

      table.on('page.dt', function() {
        $('html, body').animate({
            scrollTop: $('#data-table').offset().top
        }, 'fast');
        $('thead tr th:first-child').focus();
        $( "#search" ).focus();
      });

      table.on('click', '.delete-btn[data-id]', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure ?',
          icon: 'warning',
          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {
          if (result.dismiss !== Swal.DismissReason.cancel) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "user/" + id,
              type: 'DELETE',
              dataType: 'json',
              data: {method: '_DELETE', submit: true},
              success:function(data) {
                Swal.fire(
                  'Deleted!',
                  'Your data has been deleted.',
                  'success'
                )
                table.draw(false);
              },
              error: function(jqXhr, json, errorThrown){
                Swal.fire(
                  'Failed!',
                  'Your data failed to delete.',
                  'error'
                )
              }
            });
          }
        })
      });

      // $('#exportExcel').on('click', function(e) {
      //   table.buttons( '.buttons-excel' ).trigger();
      // });

      // $('#exportPdf').on('click', function(e) {
      //   table.buttons( '.buttons-pdf' ).trigger();
      // });
    });
</script>
@endpush
@endonce