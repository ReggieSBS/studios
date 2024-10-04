
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
          <button type="submit" class="btn btn-success">Create chapters</button>
        </div>

      </div>
    </form>
  </div>
</div>







<div class="modal" id="characterModal">
  <div class="modal-dialog">
    <form method="post" action="{{ route('character.write') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Character</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <h6 class="small-text mt-2">Name of character</h6>
              <input type="text" name="name" class="form form-control" placeholder="John" required>
            </div>
            <div class="col-12 text-center">
            <h6 class="small-text mt-2">Is this the leading actor in the movie?</h6>
            <select name="main_character" class="form form-control" required>
                <option disabled selected>Make a choice</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            </div>
            <div class="col-12">
              <h6 class="small-text mt-2" style="width:100%;">Profile image <em style="font-size:11px; float:right;"> *optional</em> </h6>
              <input type="file" name="profileimage" class="form form-control">
            </div>
            <div class="col-12">
              <h6 class="small-text mt-2">Gender</h6>
              <select name="gender" class="form form-control" required>
                  <option disabled selected>Make a choice</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Transgender</option>
              </select>
            </div>
            <div class="col-12">
              <h6 class="small-text mt-2" style="width:100%;">Approximate age <em style="font-size:11px; float:right;"> *optional</em> </h6>
              <input type="number" name="age" class="form form-control" placeholder="12">
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create character</button>
        </div>
      </div>
    </form>
  </div>
</div>

@if($ebookdata)
<div class="ui-modal draggable" id="extractmodal">
  <div class="resizable">
    <div class="ui-modal-header">
      E-book File Preview
      <a style="float:right;" href="#" class="btncloseuimodal mr-5"><i class="mdi mdi-close"></i></a>
    </div>
    <iframe src="{{ asset($ebookdata->file) }}" width="100%" height="400">
          This browser does not support PDFs. Please download the PDF to view it: 
          <a href="{{ asset($ebookdata->file) }}">Download PDF</a>
    </iframe>
    <div class="ui-modal-footer">
    <i class="mdi mdi-information"></i>
    Copy everything and paste inside the content textarea.
    </div>
  </div>
</div>
@endif