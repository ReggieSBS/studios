
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
          <div class="row">
            <div class="col-lg-12">
            <h4 class="mt-2">Titel</h4>
            <input type="text" name="title" class="form form-control" placeholder="Harry Potter" required>
            </div>
            <div class="col-lg-12">
            <h4 class="mt-2">Author</h4>
            <input type="text" name="author" class="form form-control" placeholder="J.K. Rowling" required>
            </div>
            <div class="col-lg-8">
            <h4 class="mt-2">Publisher</h4>
            <input type="text" name="publisher" class="form form-control" placeholder="Bloomsbury" required>
            </div>
            <div class="col-lg-4">
            <h5 class="mt-2">Publish date</h5>
            <input type="date" name="publish_date" class="form form-control" required>
            </div>
            <div class="col-lg-12">
            <h6 class="small-text mt-5">Cover image</h6>
            <input type="file" name="cover" class="form form-control" accept=".jpeg,.jpg,.png,.gif" required>
            <h6 class="small-text mt-2">E-book file</h6>
            <input type="file" name="ebook" class="form form-control" accept=".pdf,.docx,.doc" required>
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Upload</button>
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
      @if($ebookdata)
      <input type="hidden" name="ebookid" value="{{ $ebookdata->id }}">
      @endif
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








<div class="modal" id="actModal">
  <div class="modal-dialog">
    <form method="post" action="{{ route('archetype.write') }}" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create New Act</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              <h6 class="small-text mt-2">Act nr.</h6>
              <input type="number" name="act_number" class="form form-control" placeholder="1" required>
            </div>
            <div class="col-8">
              <h6 class="small-text mt-2">Title</h6>
              <input type="text" name="title" class="form form-control" placeholder="John" required>
            </div>
            <div class="col-12 text-center">
            <h6 class="small-text mt-2">Current archetype of the leading actor</h6>
            
              <table class="table">
                  <tr>
                    <Td>
                      <img src="{{asset('/images/archetypes/hero.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip"data-bs-toggle="tooltip" title="Hero">
                      <input type="radio" name="archetype" value="hero" style="zoom:1.5; position:absolute;" checked>
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/outlaw.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" data-bs-toggle="tooltip" title="Rebel/Outlaw">
                      <input type="radio" name="archetype" value="outlaw" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/sage.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" data-bs-toggle="tooltip" title="Sage">
                      <input type="radio" name="archetype" value="sage" style="zoom:1.5; position:absolute;">
                    </Td>
                  </tr>
                  <tr>
                    <Td>
                      <img src="{{asset('/images/archetypes/caregiver.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Care Giver">
                      <input type="radio" name="archetype" value="caregiver" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/creator.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Creator / Artist">
                      <input type="radio" name="archetype" value="creator" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/explorer.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Explorer">
                      <input type="radio" name="archetype" value="explorer" style="zoom:1.5; position:absolute;">
                    </Td>
                  </tr>
                  <tr>
                    <Td>
                      <img src="{{asset('/images/archetypes/innocent.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Innocent">
                      <input type="radio" name="archetype" value="innocent" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/jetser.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Jetser">
                      <input type="radio" name="archetype" value="jetser" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/lover.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Lover">
                      <input type="radio" name="archetype" value="lover" style="zoom:1.5; position:absolute;">
                    </Td>
                  </tr>
                  <tr>
                    <Td>
                      <img src="{{asset('/images/archetypes/magician.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Magician">
                      <input type="radio" name="archetype" value="magician" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/ruler.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Ruler">
                      <input type="radio" name="archetype" value="ruler" style="zoom:1.5; position:absolute;">
                    </Td>
                    <Td>
                      <img src="{{asset('/images/archetypes/regular_person.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Regular Person">
                      <input type="radio" name="archetype" value="regular_person" style="zoom:1.5; position:absolute;">
                    </Td>
                  </tr>
              </table>
            </div>

            

            <div class="col-12 mt-2">
              <h6 class="small-text mt-2" style="width:100%;">Why choose this archetype with this act?</h6>
              <textarea name="why" class="form form-control" required></textarea>
            </div>
            <div class="col-12 mt-2">
              <h6 class="small-text mt-2" style="width:100%;">Get the lead actor closer to his/her goal during this act?</h6>
              <table>
                <tr>
                  <td><input type="radio" name="closer" style="zoom:1.5" value="1" checked></td>
                  <td style="padding-left:15px;">Yes</td>
                </tr>
                <tr>
                  <td><input type="radio" name="closer" style="zoom:1.5" value="0"></td>
                  <td style="padding-left:15px;">No</td>
                </tr>
              </table>
            </div>
            <div class="col-12 mt-2">
              <h6 class="small-text mt-2" style="width:100%;">Why gets he/she closer to his/her goal, or not?</h6>
              <textarea name="answer" class="form form-control" required></textarea>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create act</button>
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