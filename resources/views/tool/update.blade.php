@extends('layouts.master')

@push('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@section('content')
<div class="container-fluid">
<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title">Data Komputer</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                 <li>{{ $error}}</li> 
              @endforeach
            </ul>
        </div>
      @endif
        <form action="/tool/{{ $tool->id }}" method="POST">
          @method('put')
        @csrf

        <div class="form-group">
          <label>Ruangan</label>
          <a class="pensil"  data-toggle="modal" data-target="#modal-success" hak_id="{{$tool->id}}">
            <input  type="text" value="{{$tool->plant->name}} - {{$tool->room->room}}" class="form-control" readonly>
          </a>
        </div>

        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input name="tanggal_mulai" value="{{$tool->tanggal_mulai}}" type="datetime-local" class="form-control" placeholder="Tanggal Mulai">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Jenis Alat</label>
          <select class="form-control" name="tool_unit_id">
          <option value="{{$tool->tool_unit_id}}" >{{$tool->toolUnit->jenis}}</option>
              @foreach($toolUnit as $unit)
                  <option value="{{ $unit->id}}">{{ $unit->jenis}}</option>
              @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label>Merk Alat</label>
          <input name="merk_alat" value="{{$tool->merk_alat}}" type="text" class="form-control" placeholder="Merk">
        </div>

        <div class="form-group">
          <label>ID Mesin</label>
          <input name="id_mesin" value="{{$tool->id_mesin}}" type="text" class="form-control" placeholder="ID Mesin">
        </div>

        <div class="form-group">
          <label>IP</label>
          <input name="ip" value="{{$tool->ip}}" type="text" class="form-control" placeholder="IP Alat">
        </div>

       <div class="form-group">
          <label>Fungsi</label>
          <input name="fungsi" value="{{$tool->fungsi}}" type="text" class="form-control" placeholder="Fungsi">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    </div>
 
  </div>

</div>
</div>

<div class="modal fade" id="modal-success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/tool/update-room" method="post" id="formUpdate">
          @method('put')
          @csrf
          <input type="hidden" name="tool_id" >

          <select class="form-control" name="plant" id="plant">
            <option value="" selected disabled>Select Plant</option>
            @foreach ($plants as $key => $plant)
            <option value="{{ $key }}">{{$plant}}</option>
            @endforeach
          </select>

          <select style="margin-top:10px" name="room" id="room" class="form-control"></select>
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

<script>
  $(document).ready(function(){
      $("#btnUpdate").click(function(){
        $("#formUpdate").submit();
      });

      $(".pensil").click(function(){
        var hak_tool = $(this).attr('hak_id');
        $("input[name=tool_id]").val(hak_tool);
        // alert(hak_tool);
      })
    });
</script>

<script>
  // when country dropdown changes
  $('#plant').change(function() {

      var plantID = $(this).val();

      if (plantID) {

          $.ajax({
              type: "GET",
              url: "{{ url('getRoom') }}?plant_id=" + plantID,
              success: function(res) {

                  if (res) {

                      $("#room").empty();
                      $("#room").append('<option>Select Ruangan</option>');
                      $.each(res, function(key, value) {
                          $("#room").append('<option value="' + key + '">' + value +
                              '</option>');
                      });

                  } else {

                      $("#room").empty();
                  }
              }
          });
      } else {

          $("#room").empty();
          $("#city").empty();
      }
  });
  </script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endpush