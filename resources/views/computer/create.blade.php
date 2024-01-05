@extends('layouts.master')

@push('styles')
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
        <form action="/computer" method="POST">
          @csrf
                      
        <div class="form-group">
          <label>Nama User</label>
          <select  name="user_id" class="form-control selectNama" ></select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Komputer</label>
          <select class="form-control" name="computer_id">
          <option>Pilih Komputer</option>
              @foreach($komputer as $kmp)
                  <option value="{{ $kmp->id}}">{{ $kmp->merk_computer}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Monitor</label>
          <select class="form-control" name="monitor_id">
          <option>Pilih Monitor</option>
              @foreach($monitor as $mtr)
                  <option value="{{ $mtr->id}}">{{ $mtr->merk_monitor}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Merk Keyboard</label>
          <select class="form-control" name="keyboard_id">
          <option>Pilih Keyboard</option>
              @foreach($keyboard as $key)
                  <option value="{{ $key->id}}">{{ $key->merk_keyboard}}</option>
              @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label for="exampleInputEmail1">Merk Mouse</label>
          <select class="form-control" name="mouse_id">
          <option>Pilih Mouse</option>
              @foreach($mouse as $ms)
                  <option value="{{ $ms->id}}">{{ $ms->merk_mouse}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Processor</label>
          <input name="proci" type="text" class="form-control" placeholder="Processor">
        </div>

        <div class="form-group">
          <label>Memory</label>
          <input name="memory" type="text" class="form-control" placeholder="Processor">
        </div>

        <div class="form-group">
          <label>VGA</label>
          <input name="tambahan" type="text" class="form-control" placeholder="Tambahan">
        </div>

        <div class="form-group">
          <label>RAM</label>
          <input name="ram" type="number" class="form-control" placeholder="RAM">
        </div>

        <div class="form-group">
          <label>Ip Local</label>
          <input name="iplocal" type="text" class="form-control" placeholder="Ip Local">
        </div>

        <div class="form-group">
          <label>Ip VPN</label>
          <input name="ipvpn" type="text" class="form-control" placeholder="Ip VPN">
        </div>

        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input name="tanggal_mulai" type="datetime-local" class="form-control" placeholder="Tanggal Mulai">
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

                // Query parameters will be ?search=[term]&type=public
                return query;
                }
            }
            });
    });
</script>

@endpush