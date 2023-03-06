{{-- @extends('layouts.default') --}}
@extends('layouts.app2')

@section('title', 'Data Realisasi')

@section('style')

<link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css">

{{-- @stack('before-style') --}}
{{--
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<style>
  body {
    background: #f4f6f9;
    font-family: "Nunito", sans-serif;
  }

  .fill-blue {
    filter: invert(34%) sepia(52%) saturate(6351%) hue-rotate(211deg) brightness(101%) contrast(102%);
  }
</style> --}}
{{-- @stack('after-style') --}}

@endsection

@once
@push('after-style')
<style>
  /* .dropdown-toggle::after {
    display: none;
  } */

  .dataTables_processing {
    z-index: 11000 !important;
  }
</style>
@endpush
@endonce

@section('content')
<div class="container-fluid">
  <header class="pb-3 mb-4 border-bottom">
    <a href="{{ route($type . '.index') }}" class="d-flex align-items-center text-dark text-decoration-none">
      <span class="fs-4">@yield('title')</span>
    </a>
  </header>

  <div class="row mb-3">
    <div class="col d-flex justify-content-end">
      <div class="btn-group" role="group" aria-label="Basic outlined example">
        <a href="{{ route($type . '.import') }}" class="btn btn-outline-primary text-capitalize">
          <i class="fa-solid fa-file-arrow-up fa-lg me-1"></i>
          Import Data Realisasi
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane show active" id="responsive-preview">
              <div class="table-responsive">
                <table id="scroll-horizontal-table" class="table mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th scope="col">SKPD</th>
                      <th scope="col">Sub SKPD</th>
                      <th scope="col">Urusan</th>
                      <th scope="col">Bidang Urusan</th>
                      <th scope="col">Program</th>
                      <th scope="col">Kegiatan</th>
                      <th scope="col">Sub Kegiatan</th>
                      <th scope="col">Rekening</th>
                      <th scope="col">Nilai Realisasi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('script')

  <!-- third party js -->
  <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/dataTables.select.min.js') }}"></script>
  <!-- third party js ends -->

  <!-- demo app -->
  <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
  <!-- end demo js-->


  @endsection

  @once
  @push('after-scripts')
  <script>
    $(function() {
      $.fn.DataTable.ext.pager.numbers_length = 5;

      var table = $('#scroll-horizontal-table').DataTable({
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
          { name: 'nama_skpd', data: 'nama_skpd' },
          { name: 'nama_sub_skpd', data: 'nama_sub_skpd' },
          { name: 'nama_urusan', data: 'nama_urusan' },
          { name: 'nama_bidang_urusan', data: 'nama_bidang_urusan' },
          { name: 'nama_program', data: 'nama_program' },
          { name: 'nama_kegiatan', data: 'nama_kegiatan' },
          { name: 'nama_sub_kegiatan', data: 'nama_sub_kegiatan' },
          { name: 'nama_rekening', data: 'nama_rekening' },
          { name: 'nilai_realisasi', data: 'nilai_realisasi', class: 'text-end'},
        ],
        // columnDefs: [
        //   {
        //     targets: 'action',
        //     className: "text-center",
        //   },
        //   {
        //     targets: 'status',
        //     className: "text-center",
        //   },
        // ],
        // deferRender: true,
        // dom: "" +
        //   "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'p>>" +
        //   "<'row'<'col-sm-12'tr>>" +
        //   "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>" +
        // "",
        // fixedHeader: {
        //   header: true,
        // },
        // language: {
        //   decimal: "",
        //   emptyTable: "No data available in table",
        //   info: "Showing _START_ to _END_ of _TOTAL_ entries",
        //   infoEmpty: "Showing 0 to 0 of 0 entries",
        //   infoFiltered: "(filtered from _MAX_ total entries)",
        //   infoPostFix: "",
        //   thousands: ",",
        //   lengthMenu: "Show _MENU_",
        //   loadingRecords: "Loading...",
        //   processing: "",
        //   search: "",
        //   searchPlaceholder: "Search",
        //   zeroRecords: "No matching records found",
        //   paginate: {
        //     first: "<i class='fa-solid fa-angles-left'></i>",
        //     last: "<i class='fa-solid fa-angles-right'></i>",
        //     next: "<i class='fa-solid fa-angle-right'></i>",
        //     previous: "<i class='fa-solid fa-angle-left'></i>"
        //   },
        //   aria: {
        //       sortAscending:  ": activate to sort column ascending",
        //       sortDescending: ": activate to sort column descending"
        //   }
        // },
        // lengthChange: true,
        // lengthMenu: [
        //     [5, 10, 25, 50, 100],
        //     [5, 10, 25, 50, 100],
        // ],
        // order: [1,'desc'],
        // pageLength: 50,
        // pagingType: 'full_numbers',
        // processing: true,
        // responsive: true,
        // searching: true,
        // serverSide: true,
        // select: false,
        // buttons: [
        //   'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        // drawCallback: function( settings ) {
        //   $('[data-bs-toggle="tooltip"]').tooltip({
        //     container : 'body'
        //   });
        // },
      });

      // $('#search').keypress(function(e) {
      //   table.search($(this).val()).draw();
      // });

      // table.on('page.dt', function() {
      //   $('html, body').animate({
      //       scrollTop: $('#scroll-horizontal-table').offset().top
      //   }, 'fast');
      //   $('thead tr th:first-child').focus();
      //   $( "#search" ).focus();
      // });

      // table.on('click', '.delete-btn[data-id]', function (e) {
      //   e.preventDefault();
      //   var id = $(this).attr('id');
      //   Swal.fire({
      //     title: 'Are you sure ?',
      //     icon: 'warning',
      //     focusConfirm: false,
      //     showCancelButton: true,
      //     confirmButtonText: 'Yes',
      //     cancelButtonText: 'No'
      //   }).then((result) => {
      //     if (result.dismiss !== Swal.DismissReason.cancel) {
      //       $.ajaxSetup({
      //         headers: {
      //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //         }
      //       });
      //       $.ajax({
      //         url: "user/" + id,
      //         type: 'DELETE',
      //         dataType: 'json',
      //         data: {method: '_DELETE', submit: true},
      //         success:function(data) {
      //           Swal.fire(
      //             'Deleted!',
      //             'Your data has been deleted.',
      //             'success'
      //           )
      //           table.draw(false);
      //         },
      //         error: function(jqXhr, json, errorThrown){
      //           Swal.fire(
      //             'Failed!',
      //             'Your data failed to delete.',
      //             'error'
      //           )
      //         }
      //       });
      //     }
      //   })
      // });
    });
  </script>
  @endpush
  @endonce