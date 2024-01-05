@extends('layouts.master')
@push('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <div class="px-0 pt-0 pb-2">
                <a href="/tool/create" class="btn btn-primary float-end">Add</a>
              </div>
              <thead>
              <tr>
                <th>Pengguna</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>ID Mesin</th>
                <th>IP</th>
                <th>Fungsi</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($alat as $tools)
                <tr>
                  <td><a href="/tool/{{$tools->id}}">{{$tools->merk_alat}}</a></td>
                  <td>{{$tools->toolUnit->jenis}}</td>
                  <td>{{$tools->room->room}}</td>
                  <td>{{$tools->id_mesin}}</td>
                  <td>{{$tools->tanggal_mulai}}</td>
                  <td>{{$tools->fungsi}}</td>
                  <td>
              
                    <form action="/tool/{{ $tools->id }}" method="POST">
                      @method("DELETE")
                      @csrf
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    {{-- <a href="#" class="btn btn-danger">delete</a> --}}
                  </td>
                 </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
@endsection

@push('scripts')

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush