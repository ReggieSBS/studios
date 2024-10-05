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
        @include('webapp.sidebar')
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <a href="/archetypes"><h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-left"></i>
                </span> All Archetypes
              </h3></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete archetype">
                    <button class="btn btn-danger text-white" type="button"><i class="mdi mdi-trash-can"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze archetype">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <div class="card">
                    <img src="{{ asset('/images/archetypes/'.$archetypesdata->archetype_name.'.png') }}">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="card">
                  <div class="card-body">
                    <h4>Act {{ $archetypesdata->act_number }}</h4>
                    <p>During Act {{ $archetypesdata->act_number }}: {{ $archetypesdata->title }}, {{ $archetypesdata->name}} takes on the role of the archetype: {{$archetypesdata->archetype_name }}.</p>
                    <p>The act bring reggie duisterhof @if($archetypesdata->closer_to_goal == 1)more @else less @endif close to his/her goal because {{ $archetypesdata->answer }}.</p>
                    <a class="btn btn-secondary btn-sm" style="width:100px !important;" href="/act/{{ $archetypesdata->act_id }}">Visit act</a>
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