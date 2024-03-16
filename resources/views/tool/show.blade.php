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
              <h3 class="card-title">Data Detail Tool</h3>
              <div class="card-tools">
                <a href="/tool/edit/{{$tools->id}}">
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
                    <td>Merk Alat</td>
                    <td>{{$tools->merk_alat}}</span></td>
                  </tr>
                  <tr>
                    <td>Tanggal Mulai</td>
                    <td>{{$tools->tanggal_mulai}}</span></td>
                  </tr>
                  <tr>
                    <td>Jenis Alat</td>
                    <td>{{$tools->toolUnit->jenis}}</span></td>
                  </tr>
                  <tr>
                    <td>Ruangan Pemakai</td>
                    <td>{{$tools->room->room}}</span></td>
                  </tr>
                  <tr>
                    <td>ID Mesin</td>
                    <td>{{$tools->id_mesin}}</span></td>
                  </tr>
                  <tr>
                    <td>Ip Alat</td>
                    <td>{{$tools->ip}}</span></td>
                  </tr>
                  <tr>
                    <td>Fungsi Alat</td>
                    <td>{{$tools->fungsi}}</span></td>
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
                <a href="/tool/qrcode_refresh/{{$tools->id}}">
                  <i class="fa fa-refresh"></i>
                </a>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="visible-print text-center">
                <div>
                 
                  <img class="img-thumbnail" width="300px" src="/storage/{{ $tools->code}}"> 
                </div><a type="button" href="/computer/qrcode/{{ $tools->id }}">Download</a>
                
                
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Status</h3>
              <div class="card-tools">
                <a class="pensil" type="button" data-toggle="modal" data-target="#modal-success" hak_id="{{$tools->id}}">
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
                    
                    <th>User</th>
                    <th>Date</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                @foreach($tools->statuses()->orderBy('status_tool.tanggal','DESC')->get() as $alat)
                <tbody>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{$alat->name}}</td>
                    <td><span class="mb-2 text-xs text-dark font-weight-bold ms-sm-2" aria-hidden="true">{{$alat->pivot->tanggal}}</span></td>
                    <td><span class="mb-2 text-xs"><span class="text-dark font-weight-bold ms-sm-2">{{$alat->pivot->berita}}</span></span></td>
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

        <div class="col-md-6">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Image</h3>
              <div class="card-tools">
                <a class="pen" type="button" data-toggle="modal" data-target="#modal-image" hak_id="{{$tools->id}}">
                  <i class="fas fa-plus"></i>
                </a>
                <a href="/computer/imageEdit/{{$tools->id}}" type="button">
                  <i class="fas fa-minus"></i>
                </a>
                </button>
              </div>
            </div>
            <div class="card card-solid">
            <div class="card-body">
              @if($cek->isNotEmpty())
              <div class="row">
               <div class="col-12">

                  <img class="product-image" alt="Product Image" src="{{ asset('/storage/alat/' . $cek->first()->filename) }}">
               </div>
                  <div class="col-12 product-image-thumbs">
                    @foreach($products->pictures as $file) 
                    <div class="product-image-thumb "><img src="{{ asset('/storage/alat/' . $file->filename) }}" alt="Product Image"></div>
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
            <form action="/tool/update-status" method="post" id="formUpdate">
              @method('put')
              @csrf
              <input type="hidden" name="tool_id" >
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

   
     {{-- Modal Image --}}
     <div class="modal fade" id="modal-image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/tool/store-image" method="post" id="formImage"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="tool_id" >
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
  $(document).ready(function(){
      $("#btnImage").click(function(){
        $("#formImage").submit();
      });

      $(".pen").click(function(){
        var hak_tool = $(this).attr('hak_id');
        $("input[name=tool_id]").val(hak_tool);
       
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