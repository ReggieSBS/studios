
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload E-book</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <input type="text" class="form form-control" placeholder="Title" required>
          <input type="text" class="form form-control" placeholder="Author" required>
          <input type="text" class="form form-control" placeholder="Publisher" required>
          <h6 class="small-text mt-2">Cover image</h6>
          <input type="file" class="form form-control" required>
          <h6 class="small-text mt-2">E-book file</h6>
          <input type="file" class="form form-control" required>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Upload</button>
      </div>

    </div>
  </div>
</div>