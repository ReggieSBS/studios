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
  @include('webapp.preloader')
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('webapp.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('webapp.sidebar')
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Movie Script Formula
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row" style="min-height:1200px;">
              
            @if($totalebookpages > 0 && $totalebookchapters > 0 && $totalebookcharacters > 0 && $countmovies == 0)
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h2>Congratulations!</h2>
                      <h5>You are ready to start to create your movie</h5>
                      <p>The e-book analysation phase is complete. Now please fill in the information below and click on create movie</p>
                        <form method="post" action="{{ route('movie.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-lg-6">
                          <h5>Movie Title</h5>
                          <input type="text" class="form form-control" name="title" placeholder="Jurassic Park 10" required> 
                        </div>
                        <div class="col-lg-4">
                          <h5>Genre</h5>
                          <select class="form form-control" name="genre" required> 
                              <option value="" selected disabled>Make a choice</option>
                              <option>Action</option>
                              <option>Biography</option>
                              <option>Crime</option>
                              <option>Family</option>
                              <option>Horror</option>
                              <option>Romance</option>
                              <option>Sports</option>
                              <option>War</option>
                              <option>Adventure</option>
                              <option>Comedy</option>
                              <option>Documentary</option>
                              <option>Fantasy</option>
                              <option>Thriller</option>
                              <option>Animation</option>
                              <option>Costume</option>
                              <option>Drama</option>
                              <option>History</option>
                              <option>Musical</option>
                              <option>Psychological</option>
                          </select>
                        </div>
                        <div class="col-lg-2">
                        <h5><br/></h5>
                          <button type="submit" class="btn btn-success" style="padding-left:0px; padding-right:0px; text-align:center;"><i class="mdi mdi-movie-open"></i></button>
                        </div>
                        </div>
                        </form>
                  </div>
                </div>
              </div>
            @elseif($totalebookpages == 0 || $totalebookchapters == 0 || $totalebookcharacters == 0)
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h2>Oh noooo!</h2>
                      <h5>You are not ready with the conversion of your e-book</h5>
                      <p>Please check the To Do List on your Dashboard to check what needs to be done before you can start working on your movie</p>
                      <a class="btn btn-secondary" href="/dashboard" style="width:275px;"><span class="mdi mdi-list-status"></span> Check To Do's</a>
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <form method="post" action="{{ route('movie.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start" style="width:100%;">
                      <table style="width:100%;">
                        <tr>
                          <td>
                            <input type="text" class="form form-control" name="title" value="{{ $moviedata->name }}" placeholder="Jurassic Park 10" required>
                          </td>
                          <td>
                            <select class="form form-control" name="genre" required>
                              <option value="" disabled selected>Make a choice</option>
                              <option @if($moviedata->genre == 'Action') selected @endif>Action</option>
                              <option @if($moviedata->genre == 'Biography') selected @endif>Biography</option>
                              <option @if($moviedata->genre == 'Crime') selected @endif>Crime</option>
                              <option @if($moviedata->genre == 'Family') selected @endif>Family</option>
                              <option @if($moviedata->genre == 'Horror') selected @endif>Horror</option>
                              <option @if($moviedata->genre == 'Romance') selected @endif>Romance</option>
                              <option @if($moviedata->genre == 'Sports') selected @endif>Sports</option>
                              <option @if($moviedata->genre == 'War') selected @endif>War</option>
                              <option @if($moviedata->genre == 'Adventure') selected @endif>Adventure</option>
                              <option @if($moviedata->genre == 'Comedy') selected @endif>Comedy</option>
                              <option @if($moviedata->genre == 'Documentary') selected @endif>Documentary</option>
                              <option @if($moviedata->genre == 'Fantasy') selected @endif>Fantasy</option>
                              <option @if($moviedata->genre == 'Thriller') selected @endif>Thriller</option>
                              <option @if($moviedata->genre == 'Animation') selected @endif>Animation</option>
                              <option @if($moviedata->genre == 'Costume') selected @endif>Costume</option>
                              <option @if($moviedata->genre == 'Drama') selected @endif>Drama</option>
                              <option @if($moviedata->genre == 'History') selected @endif>History</option>
                              <option @if($moviedata->genre == 'Musical') selected @endif>Musical</option>
                              <option @if($moviedata->genre == 'selected') selected @endif>Psychological</option>
                            </select>
                          </td>
                          <td>
                            <button type="submit" class="btn btn-default" style="float:right;margin-top:-3px; width:70px !important; padding-left:0px !important; padding-right:0px !important; " data-bs-toggle="tooltip" title="Save changes"><i class="fa fa-save"></i></button>
                          </td>
                        </tr>
                      </table>
                      </h4>

                      <h5>Formula</h5>
                      <textarea class="form form-control" style="height:350px;" name="formula"></textarea>
                    </div>
                  </div>
                </div>
                </form>
              </div>
              <div class="col-md-12 col-lg-5 col-sm-12 grid-margin stretch-card">
                <div class="card" style="background-color: transparent; box-shadow:0px 0px 0px;">
                  <div class="card-body">
                    <h4 class="card-title text-white" style="font-size: 48px;">Timeline</h4>
                    @if($actscount==0)
                      <p>Are you ready to produce your movie and create your first act?</p>
                      <a class="btn btn-secondary" href="/archetypes"><span class="mdi mdi-movie-open"></span> Start your story</a>
                    @endif
                    @include('webapp.timeline')
                  </div>
                </div>
              </div>
            </div>
          @endif
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