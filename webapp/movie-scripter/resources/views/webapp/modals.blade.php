
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <form>
      @csrf
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Upload E-book</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <input type="text" name="title" class="form form-control" placeholder="Title" required>
            <input type="text" name="author" class="form form-control" placeholder="Author" required>
            <input type="text" name="publisher" class="form form-control" placeholder="Publisher" required>
            <h6 class="small-text mt-2">Cover image</h6>
            <input type="file" name="cover" class="form form-control" required>
            <h6 class="small-text mt-2">E-book file</h6>
            <input type="file" name="ebook" class="form form-control" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>

      </div>
    </form>
  </div>
</div>