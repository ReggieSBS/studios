<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Moviescript.io | Dashboard</title>
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
              <a href="/ebook/{{ $ebookdata->id }}" >
              <h3 class="page-title" data-bs-toggle="tooltip" title="Back to e-book">
                
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-arrow-left"></i>
                </span> {{ $ebookdata->name }}
              </h3></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>All characters <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">

              <div class="col-lg-7">
                <div class="card">
                  <div class="card-header">
                    <h2 style="font-size: 20px; margin-top:5px;">Lead Role (Protagonist)</h2>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4">
                          <a href="/character/{{ $maincharacterdata->id }}"><img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" alt="profile" style="width:100%; border-radius:50%;"></a>
                      </div>
                      <div class="col-lg-8">
                        <h1>{{ $maincharacterdata->name }}</h1>
                        <em>{{ $maincharacterdata->personality_desc }}</em><br/><br/>
                        <p>{{ $maincharacterdata->accomplishment_desc }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-lg-5">
                <h2 style="text-align: center;">Antagonist</h2>
                <hr>
                <div class="row">
                  @if($seccharacteravailable == 1)
                  <div class="col-lg-4">
                      <a href="/character/{{ $maincharacterdata->id }}"><img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" alt="profile" style="width:100%; border-radius:50%;"></a>
                  </div>
                  <div class="col-lg-8">
                    <h2>{{ $secondarycharacterdata->name }}</h2>
                    <em>{{ $secondarycharacterdata->personality_desc }}</em><br/><br/>
                    <p>{{ $secondarycharacterdata->accomplishment_desc }}</p>
                  </div>
                  @else 
                  <div class="col-lg-4">
                      
                  </div>
                  <div class="col-lg-8">
                    <h4>Yet unknown</h4>
                  </div>
                  @endif
                </div>
              </div>

              <div class=" mb-5 col-lg-12 col-sm-12 col-md-12 mt-5">
                <h3>Other Roles</h3><br/>
                <hr>
              <div class="owl-carousel" id="owl-carousel2">
              @foreach($ebookcharacters as $character)
              @if($character->main_character != 1 && $character->main_character != 2)
              <div class="item">
                <a href="/character/{{$character->id}}" style="text-decoration:none;">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{ asset('/images_webapp/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <div style="position:relative; z-index:9">
                      <h2 class="mb-5">{{$character->name}}</h2>
                      <h6 class="card-text">Gender: {{$character->gender}}</h6>
                    </div>
                  </div>
                </div>
                </a>
              </div>
              @endif
              @endforeach
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