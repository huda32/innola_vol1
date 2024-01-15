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
          <label>Nama User</label>
          <input  type="text" value="{{$computer->user->name}}" class="form-control" readonly>
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
@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
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
</script>
@endpush