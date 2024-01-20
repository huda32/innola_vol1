@extends('layouts.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<style>
  .param_img_holder {
    display: none;  
  }

  .param_img_holder img.img-fluid {
    width: 250px;
    height: 200px;
    margin-bottom: 10px;
  }
</style>

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
  {{-- <div class="card-body">
    <div class="row">
      <div class="col-md-12">
          @csrf
          <div class="card-body">
          @if($images->isNotEmpty())
          <div class="row">
            @foreach($image->pictures as $file) 
            <div class="col-md-4">
              <div class="text-center">
                <div class="thumbnail">
                  <a href="{{ asset('/storage/komputer/' . $file->filename) }}">
                    <img src="{{ asset('/storage/komputer/' . $file->filename) }}" alt="Lights"  width="200" height="250">
                    <div class="caption">
                      <a href="" class="btn btn-primary">Selesai</a>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          </div>
        </div>
      
     
      </div>
    </div> --}}
 
    <div class="card card-solid">
      <div class="card-body pb-0">
        @if($images->isNotEmpty())
        <div class="row">
          @foreach($image->pictures as $file) 
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                {{-- tulis jika akan ada kata diatas image --}}
              </div>
              <div class="card-body pt-0">
                <div class="row">  
                  <div class="col-12 text-center">
                    <a href="{{ asset('/storage/komputer/' . $file->filename) }}">
                      <img src="{{ asset('/storage/komputer/' . $file->filename) }}" alt="user-avatar" class="img-fluid">
                      {{-- <div class="img-fluid"></div> digunakan untuk setting ukuran gambar --}}
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="/computer/imageComputer/{{$computer->id}}/{{$file->id}}" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Delete Image
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
          <ul class="pagination justify-content-center m-0">
            <div class="caption">
              <a href="/computer/{{$computer->id}}" class="btn btn-primary">Selesai</a>
            </div>
          </ul>
        </nav>
      </div>
      <!-- /.card-footer -->
    </div>
</div>
</div>
@endsection

