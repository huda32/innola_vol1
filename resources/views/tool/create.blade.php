@extends('layouts.master')

@push('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <form action="/tool" method="POST" enctype="multipart/form-data">
          @csrf


        <div class="form-group">
          <label>Plant</label>
          <select class="form-control" name="plant" id="plant">
            <option value="" selected disabled>Select Plant</option>
            @foreach ($plants as $key => $plant)
            <option value="{{ $key }}">{{$plant}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="room">Ruangan / Gedung</label>
          <select name="room" id="room" class="form-control"></select>
      </div>

        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input name="tanggal_mulai" type="datetime-local" class="form-control" placeholder="Tanggal Mulai">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Jenis Alat</label>
          <select class="form-control" name="tool_unit_id">
          <option>Pilih Alat</option>
              @foreach($toolUnit as $unit)
                  <option value="{{ $unit->id}}">{{ $unit->jenis}}</option>
              @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label>Merk Alat</label>
          <input name="merk_alat" type="text" class="form-control" placeholder="Merk">
        </div>

        <div class="form-group">
          <label>ID Mesin</label>
          <input name="id_mesin" type="text" class="form-control" placeholder="ID Mesin">
        </div>

        <div class="form-group">
          <label>IP</label>
          <input name="ip" type="text" class="form-control" placeholder="IP Alat">
        </div>

       <div class="form-group">
          <label>Fungsi</label>
          <input name="fungsi" type="text" class="form-control" placeholder="Fungsi">
        </div>
        <div class="col-md-6">
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    </div>
   
     
  </div>

</div>
</div>
@endsection

@push('scripts')
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

  // when state dropdown changes
  // $('#room').on('change', function() {

  //     var stateID = $(this).val();

  //     if (stateID) {

  //         $.ajax({
  //             type: "GET",
  //             url: "{{ url('getCity') }}?state_id=" + stateID,
  //             success: function(res) {

  //                 if (res) {
  //                     $("#city").empty();
  //                     $("#city").append('<option>Select City</option>');
  //                     $.each(res, function(key, value) {
  //                         $("#city").append('<option value="' + key + '">' + value +
  //                             '</option>');
  //                     });

  //                 } else {

  //                     $("#city").empty();
  //                 }
  //             }
  //         });
  //     } else {

  //         $("#city").empty();
  //     }
  // });
  </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endpush