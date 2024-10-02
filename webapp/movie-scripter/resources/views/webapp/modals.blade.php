
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <form method="post" action="{{ route('ebook.write') }}" enctype="multipart/form-data">
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
            <input type="file" name="cover" class="form form-control" accept=".jpeg,.jpg,.png,.gif" required>
            <h6 class="small-text mt-2">E-book file</h6>
            <input type="file" name="ebook" class="form form-control" accept=".pdf,.docx,.doc" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>

      </div>
    </form>
  </div>
</div>



<!-- The Modal -->
<div class="modal" id="askAI">
  <div class="modal-dialog">
    <form>
      @csrf
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><i class="mdi mdi-18px mdi-robot"></i> Mosci AI</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div id="ai-request"></div>

      </div>
    </form>
  </div>
</div>





<div class="modal" id="pageModal">
  <div class="modal-dialog">
    <form method="post" action="{{ route('page.write') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Pages</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <h6 class="small-text mt-2">Total amount of pages?</h6>
            <input type="number" name="amount" class="form form-control" value="1" required>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create pages</button>
        </div>

      </div>
    </form>
  </div>
</div>


<div class="modal" id="chapterModal">
  <div class="modal-dialog">
    <form method="post" action="{{ route('chapter.write') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Chapters</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <h6 class="small-text mt-2">Total amount of chapters?</h6>
            <input type="number" name="amount" class="form form-control" value="1" required>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create hapters</button>
        </div>

      </div>
    </form>
  </div>
</div>

