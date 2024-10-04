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
              <a href="/ebook/{{ $ebookdata->id }}" >
              <h3 class="page-title" data-bs-toggle="tooltip" title="Back to e-book">
                
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-left"></i>
                </span> {{ $ebookdata->name }}
              </h3></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  @if($chapterdata->chapter_number > 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Previous chapter">
                    <a class="btn btn-secondary text-white" href="/chapter/{{$previouschapter}}"><i class="mdi mdi-arrow-left"></i></a>
                  </li>
                  @endif
                  @if($disnxtchp != 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Next chapter">
                    <a class="btn btn-secondary text-white" type="button" href="/chapter/{{$nextchapter}}"><i class="mdi mdi-arrow-right"></i></a>
                  </li>
                  @endif
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete chapter">
                    <button class="btn btn-danger text-white" type="button"><i class="mdi mdi-trash-can"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Extract content from e-book word or pdf">
                    <button class="btn btn-primary text-white btnopenextract" type="button"><i class="mdi mdi-book"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze chapter">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
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
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Summary </h4>
                    </div>
                    <textarea class="form form-control" style="height:200px">{{ $chapterdata->summery }}</textarea>
                    <button class="btn btn-sm btn-secondary float-right">save</button>
                  </div>
                </div>

                <div class="card mt-3">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Characters </h4>
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