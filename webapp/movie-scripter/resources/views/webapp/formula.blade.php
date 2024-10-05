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
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start" style="width:100%;">Formula
                      <button type="submit" class="btn btn-secondary" style="float:right; box-shadow: 0px 0px 0px #000 !important; border:none !important; margin-top:-5px; width:150px !important;"><i class="mdi mdi-check"></i>Save</button>
                      </h4>
                      <textarea class="form form-control" style="height:350px;" name="formula"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-5 col-sm-12 grid-margin stretch-card">
                <div class="card" style="background-color: transparent; box-shadow:0px 0px 0px;">
                  <div class="card-body">
                    <h4 class="card-title text-white" style="font-size: 48px;">Timeline</h4>
                    
                    @include('webapp.timeline')
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