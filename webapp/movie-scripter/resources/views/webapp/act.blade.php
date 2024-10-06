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
                  <a href="/archetype/{{$archetypedata->id}}"><img src="{{ asset('/images/archetypes/'.$archetypedata->archetype_name.'') }}.png" style="height:50px;" data-bs-toggle="tooltip" title="Lead Role takes on the archetype: {{ $archetypedata->archetype_name }}"></a>  ACT {{ $actdata->act_number }} : {{ $actdata->title }} 
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Add Plot">
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#plotModal"><i class="mdi mdi-plus"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Acting Script">
                    <a class="btn btn-secondary text-white" href="/actor-script/{{ $actdata->id }}"><i class="fa fa-file-text"></i></a>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze act">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete act">
                  <form method="post" class="delform" action="{{ route('delete.act') }}">@csrf<input type="hidden" name="act_id" value="{{ $actdata->id }}">
                    <button class="btn btn-danger text-white" type="submit"><i class="mdi mdi-trash-can"></i></button>
                  </form>
                  </li>
                </ul>
              </nav>
            </div>


            @foreach($plotsdata as $plot)
            <div class="row mb-5">
              <div class="col-lg-4">
              <form method="post" action="{{ route('plot.update') }}" enctype="multipart/form-data">
              @csrf
                  <div class="card" style="height:250px;">
                  <input type="hidden" name="act_id" value="{{ $actdata->id }}">
                  <input type="hidden" name="plot_id" value="{{ $plot->id }}">
                    <div class="card-body">
                      <h4 style="width:100%;">PLOT <input type="number" name="plot_number" value="{{ $plot->plot_number }}" style="background:transparent; border:none; width:75px !important;" required>  <button type="submit" class="btn btn-sm btn-default" style="width:50px !important; float:right; margin-top:-3px;" data-bs-toggle="tooltip" title="Save changes"><i class="fa fa-save"></i></button></h4>
                      <hr>
                      <input type="text" class="form form-control" name="title" style="background:transparent; border:none; font-size:20px; font-weight:bold;" value="{{ $plot->title }}" required><br/>
                      <textarea class="form form-control" name="plot_desc" required>{{ $plot->description }}</textarea>
                    </div>
                  </div>
              </form>
              </div>
              <div class="col-lg-8">
                  <div class="card" style="position:relative;height:250px;">
                    <span class="fa fa-caret-left text-white" style="font-size:190px; position:absolute; top:15%; left:-60px;"></span>
                    <div class="card-body">
                    <form method="post" action="{{ route('plotrole.write') }}" enctype="multipart/form-data">
                      @csrf
                        <input type="hidden" name="plot_id" value="{{ $plot->id }}">
                        <input type="hidden" name="act_id" value="{{ $actdata->id }}">
                      <table class="table table-striped">
                        <thead>
                            <th>
                              <select class="form form-control" name="character_id" required>
                                <option value="" disabled selected>Choose a Character...</option>
                                @foreach($ebookcharacters as $character)
                                  <option>{{ $character->name }}</option>
                                @endforeach
                              </select>
                            </th>
                            <th>
                              <select class="form form-control" name="archetype" required>
                                <option value="" disabled selected>Choose Archetype...</option>
                                  <option>hero</option>
                                  <option>outlaw</option>
                                  <option>sage</option>
                                  <option>caregiver</option>
                                  <option>creator</option>
                                  <option>explorer</option>
                                  <option>innocent</option>
                                  <option>jetser</option>
                                  <option>lover</option>
                                  <option>magician</option>
                                  <option>ruler</option>
                                  <option value="regular_person">regular person</option>
                              </select>
                            </th>
                            <th>
                              <input type="text" class="form form-control" name="role_desc" placeholder="Describe role.." required>
                            </th>
                            <th>
                              <button type="submit" class="btn btn-secondary btn-sm" style="width:75px !important;"><i class="mdi mdi-plus"></i></button>
                            </th>
                        </thead>
                      </table>
                      </form>
                      <table class="table table-striped">
                          <tbody>
                            @foreach($plot->plotroles as $plotrole)
                            <tr>
                              <td style="width:50px;"><img src="{{ asset('/images/archetypes/'.$plotrole->archetype.'.png') }}" height="35" data-bs-toggle="tooltip" title="Character takes on the archetype: {{ $plotrole->archetype }}"></td>
                              <td>{{ $plotrole->character }}</td>
                              <td>{{ $plotrole->role_desc }}</td>
                              <td><form method="post" action="{{ route('delete.plotrole') }}">@csrf<input type="hidden" name="plotrole_id" value="{{ $plotrole->id }}"><input type="hidden" name="act_id" value="{{ $actdata->id }}"><button type="submit" class="text-danger border-0" style="background:transparent;"><i class="fa fa-times-circle"></i></button></form></td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
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