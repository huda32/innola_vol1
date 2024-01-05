@extends('layouts.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Detail Computer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Nama User</td>
                    <td>{{$komputer->user->name}}</span></td>
                  </tr>
                  <tr>
                    <td>Merk Komputer</td>
                    <td>{{$komputer->computer->merk_computer}}</span></td>
                  </tr>
                  <tr>
                    <td>Jenis Processor</td>
                    <td>{{$komputer->proci}}</span></td>
                  </tr>
                  <tr>
                    <td>RAM</td>
                    <td>{{$komputer->ram}}</span></td>
                  </tr>
                  <tr>
                    <td>Memory</td>
                    <td>{{$komputer->memory}}</span></td>
                  </tr>
                  <tr>
                    <td>Mouse</td>
                    <td>{{$komputer->mouse->merk_mouse}}</span></td>
                  </tr>
                  <tr>
                    <td>Keyboard</td>
                    <td>{{$komputer->keyboard->merk_keyboard}}</span></td>
                  </tr>
                  <tr>
                    <td>Tambahan</td>
                    <td>{{$komputer->tambahan}}</span></td>
                  </tr>
                  <tr>
                    <td>IP Local</td>
                    <td>{{$komputer->iplocal}}</span></td>
                  </tr>
                  <tr>
                    <td>IP VPN</td>
                    <td>{{$komputer->ipvpn}}</span></td>
                  </tr>
                  <tr>
                    <td>Tanggal Mulai</td>
                    <td>{{$komputer->tanggal_mulai}}</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Barcode</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="visible-print text-center">
                <div>
                  {!! QrCode::size(250)->generate(Request::url()); !!}
                </div><a type="button" href="/computer/qrcode">Download</a>
                
                
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
     
      <!-- /.row -->
      {{-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Fixed Header Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>657</td>
                    <td>Bob Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>134</td>
                    <td>Jim Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>494</td>
                    <td>Victoria Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>832</td>
                    <td>Michael Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div> --}}
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    
                    <th>User</th>
                    <th>Date</th>
                   
                    <th>Reason</th>
                  </tr>
                </thead>
                @foreach($komputer->statuses()->orderBy('computer_status.tanggal','DESC')->get() as $komput)
                <tbody>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$komput->name}}</td>
                    <td><span class="mb-2 text-xs text-dark font-weight-bold ms-sm-2" aria-hidden="true">{{$komput->pivot->tanggal}}</span></td>
                    <td><span class="mb-2 text-xs"><span class="text-dark font-weight-bold ms-sm-2">{{$komput->pivot->berita}}</span></span></td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


  @endsection