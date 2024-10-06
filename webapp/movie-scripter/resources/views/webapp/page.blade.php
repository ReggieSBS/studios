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
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="New Page">
                    <a class="btn btn-secondary text-white" href="#" data-bs-toggle="modal" data-bs-target="#newPageModal"><i class="mdi mdi-plus"></i></a>
                  </li>
                  @if($pagedata->page_number > 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Previous page">
                    <a class="btn btn-secondary text-white" href="/page/{{$previouspage}}"><i class="mdi mdi-arrow-left"></i></a>
                  </li>
                  @endif
                  @if($nxtpg != 1)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Next page">
                    <a class="btn btn-secondary text-white" type="button" href="/page/{{$nextpage}}"><i class="mdi mdi-arrow-right"></i></a>
                  </li>
                  @endif
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Extract content from e-book word or pdf">
                    <button class="btn btn-primary text-white btnopenextract" type="button"><i class="mdi mdi-book"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Convert into movie">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete page">
                  <form method="post" class="delform" action="{{ route('delete.page') }}">@csrf
                    <input type="hidden" name="page_id" value="{{ $pagedata->id }}">
                    <button class="btn btn-danger text-white" type="submit"><i class="mdi mdi-trash-can"></i></button>
                  </form>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Page {{ $pagedata->page_number }}</h4>
                    </div>
                    <div id="page-init"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin">
                <div class="card">
                <form class="pt-3" method="post" action="{{ route('page.summery') }}">
                @csrf
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Summary </h4>
                      <textarea class="form form-control" name="summery" style="height:200px;" required>{{ $pagedata->summery }}</textarea>
                      <button type="submit" class="btn btn-sm btn-secondary float-right">save</button>
                    </div>
                  </div>
                </form>
                </div>

                <div class="card mt-3">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Related Chapter</h4><br/>
                      <hr><br/>
                      @if($countchapters > 0)
                      <h1><a href="/chapter/{{ $chapterdata->id }}" class="text-black">{{ $chapterdata->title }}</a></h1>
                      @endif
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

    
    <div class="modal" id="newPageModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('page.new') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Create Page</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <h6 class="small-text mt-2">Page Number</h6>
                  <input type="number" name="page_number" class="form form-control" placeholder="1" value="{{ $newpage }}" required>
                </div>
                <div class="col-12">
                  <h6 class="small-text mt-2">Choose Chapter</h6>
                  <select name="chapter_number" class="form form-control" required>
                    <option value="" selected disabled>Make a choice</option>
                    @foreach($ebookchapters as $ebookchapter)
                      <option value="{{ $ebookchapter->id }}">Chapter {{ $ebookchapter->chapter_number }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Create page</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </body>
</html>