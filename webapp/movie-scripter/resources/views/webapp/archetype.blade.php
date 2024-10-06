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
                    <p>The act bring {{ $archetypesdata->name}} @if($archetypesdata->closer_to_goal == 1)more @else less @endif close to his/her goal because {{ $archetypesdata->answer }}.</p>
                    <a class="btn btn-default btn-sm" style="width:100px !important;" data-bs-toggle="modal" data-bs-target="#archetypeUpdateModal"><i class="fa fa-edit"></i> change</a>
                    <a class="btn btn-secondary btn-sm" style="width:125px !important; float:right;" href="/act/{{ $archetypesdata->act_id }}">Visit act <i class="mdi mdi-arrow-right"></i></a>
                  </div>
                </div>
                
                <div class="card mt-2">
                  <div class="card-header">
                    <a href="#" class="text-primary" data-bs-toggle="modal" data-bs-target="#archetypeChapterModal"><span class="fa fa-plus-circle"></span></a>
                    Chapter relations

                  </div>
                  <div class="card-body">
                    <table class="table table-striped">
                      <tr>
                        <td></td>
                      </tr>
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


    
    
    <div class="modal" id="archetypeUpdateModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('archetype.update') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <input type="hidden" name="archetype_id" value="{{ $archetypesdata->id }}">
            <input type="hidden" name="act_id" value="{{ $archetypesdata->act_id }}">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Change Act</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-4">
                  <h4>Act number</h4>
                  <input type="number" class="form form-control" name="act_number" value="{{$archetypesdata->act_number}}" required>
                </div>
                <div class="col-lg-8">
                  <h4>Title</h4>
                  <input type="number" class="form form-control" name="title" value="{{$archetypesdata->title}}" required>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <table>
                      <tr>
                        <td style="padding-right:15px;">
                            <input type="checkbox" name="closer_to_goal" value="1" @if($archetypesdata->closer_to_goal == 1) checked @endif>
                        </td>
                        <td>
                          This act brings the lead actor closer to it's goal.
                        </td>
                      </tr>
                    </table>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <h4>Why brings this act the lead actor closer the it's goal, or not?</h4>
                  <textarea name="answer" class="form form-control" required>{{$archetypesdata->answer}}</textarea>
                </div>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    
    <div class="modal" id="archetypeChapterModal">
      <div class="modal-dialog">
        <form method="post" action="{{ route('archetype.chapter') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-content">
            <input type="hidden" name="archetype_id" value="{{ $archetypesdata->id }}">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Relate Chapters</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="row">
                <table class="table table-striped">
                  <tbody>
                  @foreach($ebookchapters as $chapter)
                    <tr>
                      <td style="text-align:center;"><input type="checkbox" name="chapter[]" value="{{ $chapter->id }}" style="zoom:1.5"></td>
                      <td style="vertical-align:middle; text-align:left;">Chapter {{ $chapter->chapter_number }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Connect chapter</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </body>
</html>