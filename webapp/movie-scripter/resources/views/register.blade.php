<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Moviescript.io | Register</title>
    @include('layout')
    <style>
      .content-wrapper{
        background-image: -moz-linear-gradient(135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
        background-image: -webkit-linear-gradient(135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
        background-image: -ms-linear-gradient(135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
        background-image: linear-gradient(135deg, rgba(60, 8, 118, 0.8) 0%, rgba(250, 0, 118, 0.8) 100%);
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <a href="/"><img src="{{ asset('/images/logo.png')}}" height="90" style="width:auto !important;"></a>
                </div>
                <div class="mt-5">
                @if($errors->any())
                    <div class="col-12">
                      @foreach($errors->all() as $error )
                        <div class="alert alert-danger">{{$error}}</div>
                      @endforeach
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger">{{session('error')}}</div>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="col-12">
                        <div class="alert alert-success">{{session('success')}}</div>
                    </div>
                @endif
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy...</h6>
                <form class="pt-3" method="post" action="{{ route('register.attempt') }}">
                  @csrf
                  <input type="hidden" name="license_type" value="free">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Your first and lastname" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="/login" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  </body>
</html>