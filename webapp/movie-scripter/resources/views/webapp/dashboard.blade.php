<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io | Dashboard</title>
    <!-- plugins:css -->
        @include('webapp.layout')

    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    @include('webapp.preloader')
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
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="owl-carousel mb-5 col-12" id="owl-carousel">
              <div class="item">
                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal" style="text-decoration:none;">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{ asset('/images_webapp/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <div style="position:relative; z-index:9">
                      <h4 class="font-weight-normal mb-3"> <i class="mdi mdi-plus float-end" style="position:absolute; font-size:120px; right:-35px; top:-50px;"></i>
                      </h4>
                      <h2 class="mb-5 text-avatar" style="text-shadow: 0px -2px 3px #000;">New <br/><br/>project</h2>
                      <h6 class="card-text text-small" style="text-shadow: 0px 0px 5px #000;">Upload an e-book</h6>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              @foreach($ebooks->first()->ebooks as $ebook)
              <div class="item">
                <a href="/ebook/{{$ebook->id}}" style="text-decoration:none;">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{ asset('/images_webapp/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <div style="position:relative; z-index:9">
                      <h4 class="font-weight-normal mb-3"> <i class="mdi mdi-book mdi-48px float-end"></i>
                      </h4>
                      <h2 class="mb-5 text-avatar">{{$ebook->name}}</h2>
                      <h6 class="card-text text-small">Publisher: {{$ebook->publisher}} <br/> Author: {{$ebook->author}}</h6>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              @endforeach
              
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Production</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> E-book </th>
                            <th> Movie </th>
                            <th> Progress </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($ebooks->first()->ebooks as $ebook)
                          <tr>
                            <td> {{$ebook->id}} </td>
                            <td> {{$ebook->name}} </td>
                            <td>  </td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{ $completionprogress }}%" aria-valuenow="{{$completionprogress}}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-dark" style="width:100%;">Todo List 
                      @if($completionprogress > 29 && $completionprogress < 50)
                      <a href="/formula" class="add btn btn-gradient-primary font-weight-bold" style="width:200px !important; float:right !important; margin-top:-15px;"><i class="mdi mdi-movie-open"></i> Create Movie</a>
                      @endif
                    </h4>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Register an account </label>
                          </div>
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if($ebookid != "") checked @endif> Upload an e-book </label>
                          </div>
                          @if($ebookid != "")
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        @if($completionprogress > 9)
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if(count($ebookpages)>0) checked @endif> Create pages </label>
                          </div>
                          @if(count($ebookpages)>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if(count($ebookchapters)>0) checked @endif> Create chapters </label>
                          </div>
                          @if(count($ebookchapters)>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if(count($ebookcharacters)>0) checked @endif> Create characters </label>
                          </div>
                          @if(count($ebookcharacters)>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        @endif

                        
                        @if($completionprogress >= 50)
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if($actscount>0) checked @endif> Create Acts </label>
                          </div>
                          @if($actscount>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>


                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if($chaptercheck == 1) checked @endif> Relate Acts to Chapters </label>
                          </div>
                          @if($chaptercheck == 1)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if($plotscount>0) checked @endif> Create Plots </label>
                          </div>
                          @if($plotscount>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" @if($linescounts>0) checked @endif> Create Actor Script (Lines) </label>
                          </div>
                          @if($linescounts>0)
                          <i class="text-success fa fa fa-check-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @else
                          <i class="text-danger fa fa-times-circle" style="float: right; font-size: 20px; right: 15px; position: absolute;"></i>
                          @endif
                        </li>

                        @endif

                      </ul>
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