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
              <h3 class="page-title">
                  <a href="/act/{{ $actdata->id }}">
                  <span class="page-title-icon bg-gradient-primary text-white me-2" data-bs-toggle="tooltip" title="Back to Act">
                    <i class="mdi mdi-arrow-left"></i>
                  </span>
                  </a>
                  <a href="/archetype/{{$archetypedata->id}}"><img src="{{ asset('/images/archetypes/'.$archetypedata->archetype_name.'') }}.png" style="height:50px;" data-bs-toggle="tooltip" title="Lead Role takes on the archetype: {{ $archetypedata->archetype_name }}"></a>  ACT {{ $actdata->act_number }} : {{ $actdata->title }} | Actor Script
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze act">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                </ul>
              </nav>
            </div>


            @foreach($plotsdata as $plot)
            <div class="row mb-5">
              <div class="col-lg-8">
              <form method="post" action="{{ route('plotrole.write') }}" enctype="multipart/form-data">
                @csrf
                  <div class="card" style="position:relative;height:285px;">
                  <input type="hidden" name="plot_id" value="{{ $plot->id }}">
                  <input type="hidden" name="act_id" value="{{ $actdata->id }}">
                    <div class="card-body">
                      <table class="table table-striped">
                          <tbody>
                          </tbody>
                      </table>
                    </div>
                  </div>
              </form>
              </div>


              
              <div class="col-lg-4">
                  <div class="card" style="height:285px;">
                  <span class="fa fa-caret-left text-white" style="font-size:190px; position:absolute; top:15%; left:-60px;"></span>
                  <input type="hidden" name="act_id" value="{{ $actdata->id }}">
                  <input type="hidden" name="plot_id" value="{{ $plot->id }}">
                    <div class="card-body">
                      <h4 style="width:100%;">PLOT {{ $plot->plot_number }} {{ $plot->title }} Lines

                      </h4>
                      <hr>
                      <select class="form form-control" name="character_id" required>
                        <option value="" disabled selected>Choose a Character...</option>
                        @foreach($ebookcharacters as $character)
                          <option>{{ $character->name }}</option>
                        @endforeach
                      </select>
                      <textarea class="form form-control" name="line" placeholder="What needs to be said?" required></textarea>
                      <button class="btn btn-secondary">Add line</button>
                    </div>
                  </div>
              </div>
            </div>
            @endforeach






          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('webapp.footer')
          

          <div class="modal" id="plotModal">
            <div class="modal-dialog">
              <form method="post" action="{{ route('plot.write') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                  <input type="hidden" name="act_id" value="{{ $actdata->id }}">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Create Plot</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-4">
                        <h6 class="small-text mt-2">Plot Number</h6>
                        <input type="text" name="plot_number" class="form form-control" placeholder="1" required>
                      </div>
                      <div class="col-8">
                        <h6 class="small-text mt-2">Title</h6>
                        <input type="text" name="title" class="form form-control" placeholder="John goes camping" required>
                      </div>
                      <div class="col-12">
                        <h6 class="small-text mt-2" style="width:100%;">What happens in this plot?</h6>
                        <textarea class="form form-control" name="plot_desc" required></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create Plot</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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