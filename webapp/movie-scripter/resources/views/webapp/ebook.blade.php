<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
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
        @include('webapp.sidebar')
        
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
                  <li class="breadcrumb-item active" aria-current="page">
                    <button class="btn bg-gradient-primary text-white" type="button"><i class="mdi mdi-menu"></i> Action</button>
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
                    <h4 class="card-title">Meta Data</h4>
                    <div class="table responsive">
                      <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td>Author</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Publisher</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Publish date</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>Pages</td>
                              <td></td>
                              <td><button type="button" class="btn btn-default"><i class="fa fa-plus"></i></button></td>
                            </tr>
                            <tr>
                              <td>Chapters</td>
                              <td></td>
                              <td><button type="button" class="btn btn-default"><i class="fa fa-plus"></i></button></td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
                    <h5 class="mt-5">Production Progress</h5>
                    <div class="progress" bis_skin_checked="1">
                      <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
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
  </body>
</html>