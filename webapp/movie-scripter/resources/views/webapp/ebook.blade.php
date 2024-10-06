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
  @include('webapp.ebookloader')
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
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-book"></i>
                </span> {{ $ebookdata->name }}
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  @if($totalebookpages > 0)
                  <li class="actionbar_item" aria-current="page">
                    <a class="btn btn-primary text-white" href="/page/1"><i class="mdi mdi-book-edit"></i> Pages</a>
                  </li>
                  @else
                  <li class="actionbar_item" aria-current="page">
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#pageModal"><i class="mdi mdi-plus"></i> Pages</button>
                  </li>
                  @endif

                  @if($totalebookchapters>0)
                  <li class="actionbar_item" aria-current="page">
                    <a class="btn btn-primary text-white" href="/chapter/1"><i class="mdi mdi-book-edit"></i> Chapters</a>
                  </li>
                  @else
                  <li class="actionbar_item" aria-current="page">
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#chapterModal"><i class="mdi mdi-plus"></i> Chapters</button>
                  </li>
                  @endif
                  
                  @if($totalebookcharacters>0)
                  <li class="actionbar_item" aria-current="page">
                    <a class="btn btn-primary text-white" href="/characters"><i class="mdi mdi-book-edit"></i> Characters</a>
                  </li>
                  @else
                  <li class="actionbar_item" aria-current="page">
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#characterModal"><i class="mdi mdi-plus"></i> Characters</button>
                  </li>
                  @endif

                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Download Original e-book">
                    <a class="btn btn-warning text-white " href="{{ asset($ebookdata->file) }}" download><i class="mdi mdi-download"></i></a>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Extract content from word or pdf">
                    <a class="btn btn-success text-white btnopenextract" ><i class="mdi mdi-book"></i></a>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete e-book">
                  <form method="post" class="delform" action="{{ route('delete.ebook') }}">@csrf
                    <input type="hidden" name="ebook_id" value="{{ $ebookdata->id }}">
                    <button class="btn btn-danger text-white" type="submit"><i class="mdi mdi-trash-can"></i></button>
                  </form>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-lg-8 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <h2 data-bs-toggle="tooltip" title="Mostly located on the back cover of the book" style=" margin:15px; width:auto !important; color:#d6d6d6;"><i class="mdi mdi-24 mdi-info" style="text-shadow: 0px 0px 0px !important;"></i> Overview</h2>
                  <em style="font-size:11px; float:right; right:15px; position:absolute; top:15px;">* automatically saved</em>
                  
                  <div class="card-body" id="ebook-init">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      <table class="table">
                        <tr>
                          <td>Pages <span class="badge badge-primary">{{$totalebookpages}}</span></td>
                          <td>Chapters <span class="badge badge-danger">{{$totalebookchapters}}</span></td>
                        </tr>
                      </table>
                    </h4>
                    <div class="table responsive">
                      <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Author</td>
                              <td>{{ $ebookdata->author }}</td>
                            </tr>
                            <tr>
                              <td>Publisher</td>
                              <td>{{ $ebookdata->publisher }}</td>
                            </tr>
                            <tr>
                              <td>Publish date</td>
                              <td></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                    <h5 class="mt-5">Conversion Progress</h5>
                    <div class="progress" bis_skin_checked="1">
                      <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{ $conversionprogress }}%" aria-valuenow="{{ $conversionprogress }}" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                    </div>
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
  </body>
</html>