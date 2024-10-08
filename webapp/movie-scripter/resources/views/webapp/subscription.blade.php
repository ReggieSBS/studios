<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io | Billing & Subscription</title>
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
                  <i class="mdi mdi-piggy-bank"></i>
                </span> Billing & Subscription
              </h3>
              
            </div>
            
            <div class="row">
              <div class="col-md-12 col-lg-5 col-sm-12">

                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="width:100%;">Subscription plan
                      @if($subscription->title == "free")
                        <div class="badge badge-success" style="float:right;">Free</div>
                      @elseif($subscription->title == "hobby")
                        <div class="badge badge-danger" style="float:right;">Hobby</div>
                      @elseif($subscription->title == "business")
                        <div class="badge badge-warning" style="float:right;">Business</div>
                      @else
                        <div class="badge badge-success" style="float:right;">Free</div>
                      @endif
                    </h4>
                    <hr>
                    <div class="table responsive">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td style="width:40%;">Agreement acceptance</td>
                            <td>{{ $subscription->created_at }}</td>
                          </tr>
                          <tr>
                            <td style="width:40%;">License number</td>
                            <td>{{ $subscription->license_nr }}</td>
                          </tr>
                          <tr>
                            <td style="width:40%;">Monthly costs</td>
                            <td>€{{ $subscription->price }} p/m</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card mt-2">
                  <div class="card-body">
                    <h4 class="card-title" style="width:100%;">Included
                    </h4>
                    <hr>
                    <div class="table-responsive">
                    @if($subscription->title == "free")
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-danger">1</div></td>
                            <td>Project(s)</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-warning">2</div></td>
                            <td>Chapters per project</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-warning">10</div></td>
                            <td>Pages per chapter</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">12</div></td>
                            <td>Archetypes</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Acts</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Plots</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Acting Roles</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Actor Lines</td>
                          </tr>
                        </tbody>
                      </table>
                      @elseif($subscription->title == "hobby")
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-danger">2</div></td>
                            <td>Project(s)</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Chapters per project</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Pages per chapter</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">12</div></td>
                            <td>Archetypes</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-warning">8</div></td>
                            <td>Acts</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-warning">7</div></td>
                            <td>Plots</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Acting Roles</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Actor Lines</td>
                          </tr>
                        </tbody>
                      </table>
                      @elseif($subscription->title == "business")
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-warning">4</div></td>
                            <td>Project(s) p/y</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Chapters per project</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Pages per chapter</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">12</div></td>
                            <td>Archetypes</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Acts</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Plots</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Acting Roles</td>
                          </tr>
                          <tr>
                            <td style="width:25%;"><div class="badge badge-success">unlimited</div></td>
                            <td>Actor Lines</td>
                          </tr>
                        </tbody>
                      </table>
                      @endif

                    </div>
                  </div>
                </div>

                
              </div>


              
              <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Payment History</h4><br/>
                      <hr>
                    </div>
                    <strong>No records found..</strong>
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