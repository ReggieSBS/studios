<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moviescript.io | Login</title>
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
    <body class="antialiased">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <a href="/"><img src="{{ asset('/images/logo.png')}}" height="75" style="width:auto !important;"></a>
                </div>
                <h4>Awesome!</h4>
                <h6 class="font-weight-light">Let's start producing some awesome movies!</h6>
                <p>Click on the subscribe button to register your {{$subscription}} account</p>
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

                </div>
                <style>.pp-W7RYN9SCD9P9U{text-align:center;border:none;border-radius:1.5rem;min-width:11.625rem;padding:0 2rem;height:2.625rem;font-weight:bold;background-color:#FFD140;color:#000000;font-family:"Helvetica Neue",Arial,sans-serif;font-size:1rem;line-height:1.25rem;cursor:pointer;}</style>
                <form action="https://www.paypal.com/ncp/payment/W7RYN9SCD9P9U" method="post" target="_top" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                  <input class="pp-W7RYN9SCD9P9U" type="submit" value="Subscribe here" />
                  <img src=https://www.paypalobjects.com/images/Debit_Credit_APM.svg alt="cards" />
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    </body>
</html>
