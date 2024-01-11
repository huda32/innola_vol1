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
                <a href="/computer/create" class="btn btn-primary float-end">Add</a>
            </div>
            
              <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Merk Komputer</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Processor</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Monitor</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ip Local</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th> --}}
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Mulai</th>
                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($komputers as $komputer)
                <tr>
                <td class="text-center text-secondary"><a href="/computer/{{$komputer->id}}">{{$komputer->user->name}}</a></td>
                <td class="text-center text-secondary">{{$komputer->computer->merk_computer}}</td>
                <td class="text-center text-secondary">{{$komputer->proci}}</td>
                <td class="text-center text-secondary">{{$komputer->monitor->merk_monitor}}</td>
                <td class="text-center text-secondary">{{$komputer->iplocal}}</td>
                {{-- <td class="text-center text-secondary"> 
                  @php    
                    $hakStatus = $komputer->statuses()->orderBy('computer_status.tanggal','DESC')->first();     
                  @endphp
                  {{$hakStatus ? $hakStatus->name : ''}}
                  <a class="pensil" type="button" data-toggle="modal" data-target="#modal-success" hak_id="{{$komputer->id}}" >
                  <i class="fa fa-pencil"></i>
                  </a></td> --}}
                
                <td class="text-center text-secondary">{{$komputer->tanggal_mulai}}</td>
                <td>
                    <form action="/computer/{{ $komputer->id }}" method="POST">
                      @method("DELETE")
                                @csrf
                      <input type="hidden" name="code" value="{{ $komputer->code }}" >
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
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

  {{-- modal --}}

  <div class="modal fade" id="modal-success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/computer/update-status" method="post" id="formUpdate">
            @method('put')
            @csrf
            <input type="hidden" name="computer_id" >
              <select name="status_id" class="form-control">
                @foreach($statuses as $status)
                  <option value="{{ $status->id }}">{{ $status->name}}</option>
                @endforeach      
              </select>
              
              <input style="margin-top:10px" name="description" type="text" class="form-control"  >
              <input style="margin-top:10px" name="tanggal" type="datetime-local" class="form-control"  >
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
        </form>
        </div>
      </div>
    </div>
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


      $(document).ready(function(){
        $("#btnUpdate").click(function(){
          $("#formUpdate").submit();
        });

        $(".pensil").click(function(){
          var hak_komputer = $(this).attr('hak_id');
          $("input[name=computer_id]").val(hak_komputer);
          // alert(hak_komputer);
        })
      });
    

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