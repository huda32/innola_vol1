@extends('layouts.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
<div class="container-fluid">
<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title">Ubah Data Komputer</h3>

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
        <form action="/computer/{{ $computer->id }}" method="POST">
          @method('put')
          @csrf

        <div class="form-group">
          <label for="exampleInputEmail1">Nama User</label>
          <select class="form-control" name="user_id">
            <option value="{{$computer->user_id}}">{{$computer->user->name}}</option>
            @foreach ($user as $item)
            <option value="{{ $item->id}}">{{ $item->name}}</option>
            @endforeach
          </select>
          {{-- <a class="pensil"  data-toggle="modal" data-target="#modal-success" hak_id="{{$computer->id}}"> --}}
            {{-- <input  value="{{$computer->user->name}}" class="form-control " readonly> --}}
          {{-- </a> --}}
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Komputer</label>
          <select class="form-control" name="computer_id">
          <option value="{{$computer->computer_id}}">{{$computer->computer->merk_computer}}</option>
              @foreach($komputer as $kmp)
                  <option value="{{ $kmp->id}}">{{ $kmp->merk_computer}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Monitor</label>
          <select class="form-control" name="monitor_id">
          <option value="{{$computer->monitor_id}}">{{$computer->monitor->merk_monitor}}</option>
              @foreach($monitor as $mtr)
                  <option value="{{ $mtr->id}}">{{ $mtr->merk_monitor}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Keyboard</label>
          <select class="form-control" name="keyboard_id">
          <option value="{{$computer->keyboard_id}}">{{$computer->keyboard->merk_keyboard}}</option>
              @foreach($keyboard as $key)
                  <option value="{{ $key->id}}">{{ $key->merk_keyboard}}</option>
              @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Merk Mouse</label>
          <select class="form-control" name="mouse_id">
          <option value="{{$computer->mouse_id}}">{{$computer->mouse->merk_mouse}}</option>
              @foreach($mouse as $ms)
                  <option value="{{ $ms->id}}">{{ $ms->merk_mouse}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Processor</label>
          <input name="proci" type="text" value="{{$computer->proci}}" class="form-control" placeholder="Processor">
        </div>

        <div class="form-group">
          <label>Memory</label>
          <input name="memory" type="text" value="{{$computer->memory}}" class="form-control" placeholder="Processor">
        </div>

        <div class="form-group">
          <label>VGA</label>
          <input name="tambahan" type="text" value="{{$computer->tambahan}}" class="form-control" placeholder="Tambahan">
        </div>

        <div class="form-group">
          <label>RAM</label>
          <input name="ram" value="{{$computer->ram}}" type="number" class="form-control" placeholder="RAM">
        </div>

        <div class="form-group">
          <label>Ip Local</label>
          <input name="iplocal" type="text" value="{{$computer->iplocal}}" class="form-control" placeholder="Ip Local">
        </div>

        <div class="form-group">
          <label>Ip VPN</label>
          <input name="ipvpn" type="text" value="{{$computer->ipvpn}}" class="form-control" placeholder="Ip VPN">
        </div>

        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input name="tanggal_mulai" value="{{$computer->tanggal_mulai}}" type="datetime-local" class="form-control" placeholder="Tanggal Mulai">
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
        <h5 class="modal-title" id="exampleModalLabel">Cari User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/tool/update-room" method="post" id="formUpdate">
          @method('put')
          @csrf
          <input type="hidden" name="tool_id" >
          {{-- <select  name="user_id"  class="selectNama" ></select> --}}
          <div class="form-control">
          <div class="content">
            <div class="search">
              <input type="text" name="" id="optionSearch" placeholder="Search">
            </div>
            
              <ul class="options">

              </ul>
            </div>
            
          </div>
     
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
      .click(function(){
        $("selectNama")
      })
        $('.selectNama').select2({
          minimumInputLength:3,  
          ajax: {
                url: '/search-name',
                data: function (params) {
                var query = {
                    search: params.term,
                    // type: 'public'
                }

                return query;
                }
            }
            });
    });

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
</script>

@endpush