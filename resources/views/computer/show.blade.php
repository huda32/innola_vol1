@extends('layouts.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
      <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Detail Computer</h3>
              <div class="card-tools">
                <a href="/computer/edit/{{$komputer->id}}">
                  <i class="fa fa-pencil"></i>
                </a>
                </button>
              </div>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Barcode</h3>
                <div class="card-tools">
                  <a href="/computer/qrcode_refresh/{{$komputer->id}}">
                    <i class="fa fa-refresh"></i>
                  </a>
                  </button>
                </div>
              </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="visible-print text-center">
                <div>
                  <img class="img-thumbnail" width="300px" src="/storage/{{ $komputer->code}}"> 
                </div><a type="button" href="/computer/qrcode/{{ $komputer->id }}">Download</a>

              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
     

      <div class="row">
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Status</h3>
              <div class="card-tools">
                <a class="pensil" type="button" data-toggle="modal" data-target="#modal-success" hak_id="{{$komputer->id}}">
                  <i class="fas fa-plus"></i>
                </a>
                </button>
              </div>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    
                    <th>Jenis</th>
                    <th>Date</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                @foreach($komputer->statuses()->orderBy('computer_status.tanggal','DESC')->get() as $komput)
                <tbody>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$komput->name}}</td>
                    <td><span class="mb-2 text-xs text-dark font-weight-bold ms-sm-2" aria-hidden="true">{{$komput->pivot->tanggal}}</span></td>
                    <td><span class="mb-2 text-xs"><span class="text-dark font-weight-bold ms-sm-2">{{$komput->description}}</span></span></td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        {{$komput->pivot->berita}}
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

        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Image</h3>
              <div class="card-tools">
                <a class="pen" type="button" data-toggle="modal" data-target="#modal-xl" hak_id="{{$komputer->id}}">
                  <i class="fas fa-plus"></i>
                </a>
                </button>
              </div>
            </div>
            <div class="card card-solid">
            <div class="card-body">
              @if($images->isNotEmpty())
              <div class="row">
               <div class="col-12">

                  <img class="product-image" alt="Product Image" src="{{ asset('/storage/komputer/' . $images->first()->filename) }}">
               </div>
                  <div class="col-12 product-image-thumbs">
                    @foreach($image->pictures as $file) 
                    <div class="product-image-thumb "><img src="{{ asset('/storage/komputer/' . $file->filename) }}" alt="Product Image"></div>
                     @endforeach
                  </div>
               </div>
              @endif
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    {{-- Modal Status --}}
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
    {{-- modal selesai --}}

    {{-- Modal Image --}}
    <div class="modal fade" id="modal-xl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/computer/store-image" method="post" id="formImage"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="computer_id" >
              <table>
                <tr>
                  <td class="border-0">
                    <input type="file" class="form-control file-input" name="image[]" />
                  </td>
                  <td class="border-0">
                    <div class="param_img_holder"></div>
                  </td>
                </tr>
                <tr>  
                  <td class="border-0">
                    <input type="file" class="form-control file-input" name="image[]" />
                  </td>
                  <td class="border-0">
                    <div class="param_img_holder"></div>
                  </td>
                </tr>
              </table> 
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-primary" id="btnImage">Update</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal selesai-->

 
  @endsection

  @push('scripts')

  <script>
    $(document).ready(function(){
        $("#btnUpdate").click(function(){
          $("#formUpdate").submit();
        });

        $(".pensil").click(function(){
          var hak_computer = $(this).attr('hak_id');
          $("input[name=computer_id]").val(hak_computer);
         
        })
      });
  
</script>

<script>
  $(document).ready(function(){
      $("#btnImage").click(function(){
        $("#formImage").submit();
      });

      $(".pen").click(function(){
        var hak_computer = $(this).attr('hak_id');
        $("input[name=computer_id]").val(hak_computer);
       
      })
    });

</script>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<script>
  const validExtensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];

    $('table').on('change', '.file-input', function() {
      const $input = $(this);
      const imgPath = $input.val();
      const $imgPreview = $input.closest('tr').find('.param_img_holder');
      const extension = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      if (typeof(FileReader) == 'undefined') {
        $imgPreview.html('This browser does not support FileReader');
        return;
      }

      if (validExtensions.includes(extension)) {
        $imgPreview.empty();
        var reader = new FileReader();
        reader.onload = function(e) {
          $('<img/>', {
            src: e.target.result,
            class: 'img-fluid'
          }).appendTo($imgPreview);
        }
        $imgPreview.show();
        reader.readAsDataURL($input[0].files[0]);
      } else {
        $imgPreview.empty();
      }
    });
</script>
@endpush