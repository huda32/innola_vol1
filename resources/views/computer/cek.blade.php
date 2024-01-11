<div class="modal-body">
    <form action="/computer/store-image" method="post" enctype="multipart/form-data">
      {{-- @method('put') --}}
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