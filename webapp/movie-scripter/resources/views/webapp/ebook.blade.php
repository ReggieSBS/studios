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
                    <a class="btn btn-primary text-white" href="/chapter/1"><i class="mdi mdi-book-edit"></i> Chapter</a>
                  </li>
                  @else
                  <li class="actionbar_item" aria-current="page">
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#chapterModal"><i class="mdi mdi-plus"></i> Chapters</button>
                  </li>
                  @endif
                  
                  @if($totalebookchapters>0)
                  <li class="actionbar_item" aria-current="page">
                    <a class="btn btn-primary text-white" href="/characters"><i class="mdi mdi-book-edit"></i> Characters</a>
                  </li>
                  @else
                  <li class="actionbar_item" aria-current="page">
                    <button class="btn btn-secondary text-white" type="button"><i class="mdi mdi-plus" data-bs-toggle="modal" data-bs-target="#characterModal"></i> Characters</button>
                  </li>
                  @endif

                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Download">
                    <button class="btn btn-secondary text-white " type="button" data-bs-toggle="modal" data-bs-target="#downloadEbookModal"><i class="mdi mdi-download"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Extract content from word or pdf">
                    <button class="btn btn-primary text-white" type="button"><i class="mdi mdi-book"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Convert into movie">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Ebook</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><table class="table">
                            <tr>
                              <td>Pages <span class="badge badge-primary">{{$totalebookpages}}</span></td>
                              <td>Chapters <span class="badge badge-danger">{{$totalebookchapters}}</span></td>
                            </tr>
                          </table></h4>
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
                    <h5 class="mt-5">Production Progress</h5>
                    <div class="progress" bis_skin_checked="1">
                      <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{ $ebookdata->complete }}%" aria-valuenow="{{ $ebookdata->complete }}" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
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