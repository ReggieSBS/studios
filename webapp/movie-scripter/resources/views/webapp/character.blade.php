<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io | </title>
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
        @include('webapp.sidebar', ['ebooks',$ebooks])
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <a href="/characters" >
              <h3 class="page-title" data-bs-toggle="tooltip" title="See all characters">
                
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-left"></i>
                </span> all characters 
              </h3></a><i class="fa fa-chevron-right"></i> {{$characterdata->name}}
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Back to e-book">
                    <a class="btn btn-secondary text-white" href="/ebook/{{ $ebookdata->id }}"><i class="mdi mdi-book"></i></a>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Delete character">
                    <button class="btn btn-danger text-white" type="button"><i class="mdi mdi-trash-can"></i></button>
                  </li>
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Analyze character">
                    <button class="btn btn-success text-white" type="button"><i class="mdi mdi-robot"></i></button>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="row">
            <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start">Images </h4>
                    </div>
                  </div>
                </div>

                <div class="card mt-3">
                  <div class="card-body">
                    <div class="clearfix">
                    <div class="container">
                      <div class="row">
                        <h4 class="card-title float-start" style="width:100%;">Information <button class="btn btn-sm btn-secondary" type="submit" style="width:40px !important; float:right; margin-top:-5px;" data-bs-toggle="tooltip" title="Save changes"><span class="fa fa-save" style="float:right;"></span></button> </h4>
                      </div>
                      <form class="pt-3" method="post" action="{{ route('character.update-details') }}">
                      @csrf
                      <div class="row">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <td>Appr. Age</td>
                                <td>
                                  <input type="number" value="{{ $characterdata->age }}" name="age" style="border:none; background:transparent;">
                                </td>
                              </tr>
                              <tr>
                                <td>Gender</td>
                                <td>
                                  <select name="gender" style="border:none; background:transparent;">
                                      <option value="Male" @if($characterdata->gender=="Male") selected @endif>Male</option>
                                      <option value="Female" @if($characterdata->gender=="Female") selected @endif>Female</option>
                                      <option value="Transgender" @if($characterdata->gender=="Transgender") selected @endif>Transgender</option>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td>Role</td>
                                <td>

                                  <select name="main_character" style="border:none; background:transparent;">
                                      <option value="1" @if($characterdata->main_character == 1) selected @endif>Protagonist (Lead Role)</option>
                                      <option value="2" @if($characterdata->main_character == 2) selected @endif>Antagonist</option>
                                      <option value="3" @if($characterdata->main_character=="3") selected @endif>Tertiary</option>

                                      
                                      <option value="4" @if($characterdata->main_character=="4") selected @endif>Confidant</option>
                                      
                                      <option value="5" @if($characterdata->main_character=="5") selected @endif>Foil</option>
                                      
                                      <option value="6" @if($characterdata->main_character=="6") selected @endif>Love interest</option>
                                      
                                      <option value="7" @if($characterdata->main_character=="7") selected @endif>Cameo</option>
                                      
                                      <option value="8" @if($characterdata->main_character=="8") selected @endif>Deuteragonist</option>
                                  </select>

                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <form class="pt-3" method="post" action="{{ route('character.update') }}">
                @csrf
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-start" style="width:100%;">
                        <table style="width:100%;">
                          <Tr>
                            <Td>
                              <div class="nav-profile-img" bis_skin_checked="1">
                              <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                              <span class="availability-status online"></span>
                              </div>
                            </Td>
                            <Td class="pr-5" style="vertical-align: middle; width:33%">Character</Td>
                            <Td class="pr-5" style="width:34%"><input type="text" class="form form-control" name="name" value="{{ $characterdata->name }}" placeholder="Name ...."></Td>
                            <td style="width:33%; text-align:right;"><button type="submit" class="btn btn-secondary" style="float:right; box-shadow: 0px 0px 0px #000 !important; border:none !important;"><i class="mdi mdi-check"></i>Save changes</button></td>
                          </Tr>
                        </table>
                      </h4><br/><br/><br/>
                      <hr>
                    </div>

                    <div class="row">
                      <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5>Appearance</h5>
                        <em class="text-small">Describe the appearance of the character</em>
                        <textarea class="form form-control" name="appearance" style="height:150px">{{$characterdata->appearance_desc}}</textarea>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5>Personality</h5>
                        <em class="text-small">Describe the personality of the character</em>
                        <textarea class="form form-control" name="personality" style="height:150px">{{$characterdata->personality_desc}}</textarea>
                      </div><br/>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5>What tries {{ $characterdata->name }} to accomplish?</h5>
                        <textarea class="form form-control" name="accomplish" style="height:150px">{{$characterdata->accomplishment_desc}}</textarea>
                      </div><br/>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5>What happens when {{ $characterdata->name }} fails?</h5>
                        <textarea class="form form-control" name="fails" style="height:150px">{{$characterdata->what_if_fails_desc}}</textarea>
                      </div><br/>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h5>Who's trying to stop {{ $characterdata->name }}?</h5>
                        <select class="form form-control" name="character_id">
                            <option value="" disabled selected>Make a choice</option>
                            @foreach($ebookcharacters as $ebookcharacter)
                              <option value="{{ $ebookcharacter->id }}" @if($characterdata->who_stops_desc == $ebookcharacter->id) selected @endif>{{ $ebookcharacter->name }}</option>
                            @endforeach
                        </select>
                      </div><br/>
                    </div>
                  </div>
                </form>
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