<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io </title>
    <!-- plugins:css -->
        @include('webapp.layout')

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
  @include('webapp.preread')
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('webapp.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('webapp.sidebar', ['ebooks',$ebooks])
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <a href="/ebook/{{ $ebookdata->id }}" >
              <h3 class="page-title" data-bs-toggle="tooltip" title="Back to e-book">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-left"></i>
                </span> {{ $ebookdata->name }}
              </h3></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="New chapter">
                    <a class="btn btn-secondary text-white" href="#" data-bs-toggle="modal" data-bs-target="#newChapterModal"><i class="mdi mdi-plus"></i></a>
                  </li>
                  @if($chapterdata->chapter_number > 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Previous chapter">
                    <a class="btn btn-secondary text-white" href="/chapter/{{$previouschapter}}"><i class="mdi mdi-arrow-left"></i></a>
                  </li>
                  @endif
                  @if($nxtchp == 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Next chapter">
                    <a class="btn btn-secondary text-white" type="button" href="/chapter/{{$nextchapter}}"><i class="mdi mdi-arrow-right"></i></a>
                  </li>
                  @endif
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Extract content from e-book word or pdf">
                    <button class="btn btn-primary text-white btnopenextract" type="button"><i class="mdi mdi-book"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze chapter">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete chapter">
                  <form method="post" class="delform" action="{{ route('delete.chapter') }}">@csrf
                    <input type="hidden" name="chapter_id" value="{{ $chapterdata->id }}">
                    <button class="btn btn-danger text-white" type="submit"><i class="mdi mdi-trash-can"></i></button>
                  </form>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <em style="font-size:11px; float:right; right:15px; position:absolute; top:15px;">* automatically saved</em>
                  <div class="card-body">
                    <div id="chapter-init"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin">
                <div class="mb-5">
                  <table style="width:100%; float:left;">
                    <tr>
                    
                        <td style="text-align: left;">
                          <a href="#" style="color:#3b3b3b; text-shadow:1px 1px 1px #FFF;" data-bs-toggle="modal" data-bs-target="#chapterCharacterModal"><span class="fa fa-plus-circle" style="font-size:35px;" data-bs-toggle="tooltip" title="Relate characters" data-bs-placement="left"></span></a>
                        </td>
                        <td style="text-align: left;">
                            <div class="nav-profile-img" bis_skin_checked="1">
                            <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                            <span class="availability-status online"></span>
                            </div>
                        </td>
                        <td style="text-align: left;">
                            <div class="nav-profile-img" bis_skin_checked="1">
                            <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                            <span class="availability-status online"></span>
                            </div>
                        </td>
                        <td style="text-align: left;">
                            <div class="nav-profile-img" bis_skin_checked="1">
                            <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                            <span class="availability-status online"></span>
                            </div>
                        </td>
                    </tr>
                  </table>
                </div>
                <div class="card">
                <form class="pt-3" method="post" action="{{ route('chapter.summery') }}">
                @csrf
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Summary </h4>
                    </div>
                    <textarea class="form form-control" name="summery" style="height:200px" required>{{ $chapterdata->summery }}</textarea>
                    <button type="submit" class="btn btn-sm btn-secondary float-right">save</button>
                  </div>
                </form>
                </div>

                <div class="card mt-3">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start"><a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#chapterPagesModal"><span class="fa fa-plus-circle"></span></a> Related Pages </h4>
                    </div>
                    <table class="table table-striped">
                      <tbody>
                      @foreach($chapterpages as $chapterpage)
                        <tr>
                          <td style="vertical-align:middle; text-align:left;">Page {{ $chapterpage->page_number }}</td>
                          <td>
                            <a class="float-right btn btn-primary btn-sm" href="/page/{{ $chapterpage->id }}"><i class="mdi mdi-read"></i></a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                
              </div>
            </div>
            
            
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('webapp.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('webapp.modals')
    
    <div class="modal" id="newChapterModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('chapter.new') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Create Chapter</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <h6 class="small-text mt-2">Chapter Number</h6>
                  <input type="number" name="chapter_number" class="form form-control" placeholder="1" value="{{ $newchapter }}" required>
                </div>
                <div class="col-12">
                  <h6 class="small-text mt-2">Title</h6>
                  <input type="text" name="title" class="form form-control" placeholder="Chapter new.." required>
                </div>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Create chapter</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal" id="chapterCharacterModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('chapter.character') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Relate Characters</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <table class="table table-striped">
                  <tbody>
                  @if($totalebookcharacters>0)
                  @foreach($ebookcharacters as $ebookcharacter)
                    <tr>
                      <td style="text-align:center;"><input type="checkbox" name="characters[]" value="{{ $ebookcharacter->id }}" style="zoom:1.5"></td>
                      <td style="vertical-align:middle; text-align:left;">{{ $ebookcharacter->name }}</td>
                    </tr>
                  @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Connect characters</button>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="modal" id="chapterPagesModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('chapter.pages') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Relate Pages</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <table class="table table-striped">
                  <tbody>
                  @foreach($ebookpages as $page)
                    <tr>
                      <td style="text-align:center;"><input type="checkbox" name="page[]" value="{{ $page->id }}" style="zoom:1.5"></td>
                      <td style="vertical-align:middle; text-align:left;">Page {{ $page->page_number }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Connect pages</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>