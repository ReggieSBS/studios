<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io || Account</title>
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
                  <i class="mdi mdi-account"></i>
                </span> Your Account Details
              </h3>
              
            </div>
            
            <div class="row">
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form action="route('account.update')" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="clearfix">
                      <h4 class="card-title float-start" style="width:100%">Personal Information
                        <button type="submit" class="btn btn-default" style="width:50px !important; float:right;padding-left:0px; padding-right:0px;"><i class="fa fa-save"></i></button>
                      </h4><br/>
                      <hr>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 text-center">
                        <img src="@if(Auth::user()->profile_image != NULL) {{ asset('Auth::user()->profile_image')}} @else {{ asset('/images/profile_image_mockup.png')}} @endif" alt="profile" style="width:75%; border-radius:50%;">
                      </div>
                      <div class="col-lg-6">
                        <h4>Your name</h4>
                        <input type="text" class="form form-control" name="name" value="{{Auth::user()->name}}" required>
                        <h6 class="mt-5">Choose a new profile image</h6>
                        <input type="file" class="form form-control" name="profile_image" accept=".jpeg,.jpg,.png,.gif" required>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-lg-12">
                        <h4>Your emailaddress</h4>
                        <input type="email" class="form form-control" name="email" value="{{ Auth::user()->email }}" required>
                      </div>
                    </div>
                    </form>
                    <br/>
                    <hr>
                    <form action="route('account.passwordupdate')" method="post">
                    @csrf
                    <div class="row mt-5">
                      <div class="col-lg-6">
                        <h4>New password</h4>
                        <input type="password" class="form form-control" name="password" value="" required>
                      </div>
                      <div class="col-lg-6">
                        <h4>Confirm new password</h4>
                        <input type="password" class="form form-control" name="confirm_password" value="" required>
                      </div>
                      <div class="col-lg-12 mt-2 text-right">
                        <button class="btn btn-secondary" type="submit">Reset password</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-5 col-sm-12 grid-margin stretch-card" style="display:none;">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Marketplace Information</h4>
                    <hr>
                    <div class="table responsive">
                      <table class="table table-striped">
                          <tbody>
                            
                          </tbody>
                      </table>
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