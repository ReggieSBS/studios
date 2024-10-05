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
                    <button class="btn btn-secondary text-white btnopenextract" type="button" data-bs-toggle="modal" data-bs-target="#plotModal"><i class="mdi mdi-plus"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete act">
                    <button class="btn btn-danger text-white" type="button"><i class="mdi mdi-trash-can"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze act">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-4">
                  <div class="card" style="height:250px;">
                    <div class="card-body">
                      <h4 style="width:100%;">PLOT 1 <a class="btn btn-sm btn-secondary" style="width:50px !important; float:right; margin-top:-5px;"><i class="fa fa-save"></i></a></h4>
                      <hr>
                    </div>
                  </div>
              </div>
              <div class="col-lg-8">
                  <div class="card" style="position:relative;height:250px;">
                    <span class="fa fa-caret-left text-white" style="font-size:190px; position:absolute; top:15%; left:-60px;"></span>
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <th>
                            <td>
                              <select class="form form-control" name="character_id" required>
                                <option value="" disabled selected>Choose Characater...</option>
                              </select>
                            </td>
                            <td>
                              <select class="form form-control" name="character_id" required>
                                <option value="" disabled selected>Choose Archetype...</option>
                              </select>
                            </td>
                            <td>
                              <input type="text" class="form form-control" name="role_desc" placeholder="Describe role.." required>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-secondary btn-sm"><i class="mdi mdi-plus"></i></button>
                            </td>
                          </th>
                        </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                      </table>
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