<!doctype html>
<html lang="en">

<head>
<title>Moviescript.io | E-book to Movie</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    

    @vite([
        'resources/landingspage/css/bootstrap.min.css', 
        'resources/css/aos.css',
        'resources/landingspage/css/themify-icons.css', 
        'resources/landingspage/css/owl.carousel.min.css', 
        'resources/landingspage/css/style.css', 
        'resources/landingspage/js/jquery-3.2.1.min.js', 
        'resources/landingspage/js/owl.carousel.min.js', 
        'resources/js/aos.js', 
        'resources/landingspage/js/script.js']) 
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="/"><img src="{{ asset('/images/logo-v2-white.png')}}" height="90" style="position:absolute; top:0px;" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#pricing">PRICING</a> </li>
                                <li class="nav-item"><a href="/register" class="btn btn-light btn-sm my-3 my-sm-0 ml-lg-3">Try for free</a></li>
                                <li class="nav-item"><a href="/login" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Login</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1 style="font-weight: bold;">CONVERT E-BOOKS INTO MOVIES</h1>
            <p class="tagline mb-20">With moviescript.io everyone can be the next Steven Spiegelberg</p><br/><br/>
        </div>
    </header>


    <div class="section" style="padding-bottom:0px; padding-top:120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">

                    <h2><br/>Discover Moviescript.io</h2>
                    <h4 class="mb-4">Are you a writer or filmproducer?</h4>
                    <p>Elevate your creative mind with the help of Artificial Intelligence.</p>
                    <p>With moviescript.io you can convert e-books into movie production scripts. Our AI will help you define which character in the movie says what at what moment, inspire you with produced images of personalities and environmental conditions and will be able to create trailers of chapters and e-book pages.</p>
                    <a href="/register" class="btn btn-primary">Try it for free</a>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="{{ asset('/images_landingspage/perspective.png')}}" alt="perspective phone" class="img-fluid">
            </div>
        </div>

    </div>
    <div class="section light-bg" id="features">
        <div class="container">
            <div class="section-title">
                <img src="{{ asset('/images_landingspage/highlights.png')}}" style="height:120px;"><br/>
                <small>HIGHLIGHTS</small>
                <h3>Features you love</h3>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-face-smile gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Simple</h4>
                                    <p class="card-text">Upload an e-book and it's automatically analyzed form you</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-settings gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Customize</h4>
                                    <p class="card-text">Create pages, chapters and characters and convert them into plots, acts and archetypes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <span class="ti-lock gradient-fill ti-3x mr-3"></span>
                                <div class="media-body">
                                    <h4 class="card-title">Sell</h4>
                                    <p class="card-text">Sell your converted e-books moviescripts directly in our marketplace </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <!-- // end .section -->
    <div class="section light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Create an Account</h5>
                                <p>If you want you can try it out first</p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Upload an e-book</h5>
                                <p>1. Extract the e-book content to the platform</p>
                                <p>2. Divide the content into pages, chapters and characters</p>
                                <small style="color:#000"><i class="ti ti-info-alt"></i> Ask Mosci to define and summerize everything</small>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Manage your movie script</h5>
                                <p>1. Create a movie timeline of acts</p>
                                <p>2. Define archetypes during all the acts</p>
                                <p>3. Link act to chapters</p>
                                <small style="color:#000"><i class="ti ti-info-alt"></i> Ask Mosci to summerize the acts, define plots, <br/>relate the plots to Acting Roles and Create actor scripts</small>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('/images_landingspage/iphonex.png')}}" alt="iphone" style="position:absolute; height:100%; left:-200px;">
                </div>
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="section" id="gallery">
        <div class="container">
            <div class="section-title">
                <p>We provide a complete solution for every scenario</p>
                <h3>ARCHETYPES & ACTING ROLES</h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="{{ asset('/images/archetypes/hero.png')}}" alt="image" data-bs-toggle="tooltip" title="Hero">
                <img src="{{ asset('/images/archetypes/outlaw.png')}}" alt="image" data-bs-toggle="tooltip" title="Outlaw">
                <img src="{{ asset('/images/archetypes/caregiver.png')}}" alt="image" data-bs-toggle="tooltip" title="Care giver">
                <img src="{{ asset('/images/archetypes/creator.png')}}" alt="image" data-bs-toggle="tooltip" title="Creator">
                <img src="{{ asset('/images/archetypes/explorer.png')}}" alt="image" data-bs-toggle="tooltip" title="Explorer">
                <img src="{{ asset('/images/archetypes/innocent.png')}}" alt="image" data-bs-toggle="tooltip" title="Innocent">
                <img src="{{ asset('/images/archetypes/jetser.png')}}" alt="image" data-bs-toggle="tooltip" title="Jetser">
                <img src="{{ asset('/images/archetypes/lover.png')}}" alt="image" data-bs-toggle="tooltip" title="Lover">
                <img src="{{ asset('/images/archetypes/magician.png')}}" alt="image" data-bs-toggle="tooltip" title="Magician">
                <img src="{{ asset('/images/archetypes/regular_person.png')}}" alt="image" data-bs-toggle="tooltip" title="Regular Person">
                <img src="{{ asset('/images/archetypes/ruler.png')}}" alt="image" data-bs-toggle="tooltip" title="Ruler">
                <img src="{{ asset('/images/archetypes/sage.png')}}" alt="image" data-bs-toggle="tooltip" title="Sage">
            </div>

        </div>

    </div>
    <!-- // end .section -->

    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">
                <h2>MOVIE SCRIPTING REVOLUTIONIZED</h2>
                <p style="color:#FFF;">Turning e-books into movies made easy and 100% faster</p>
                
                <iframe src="https://www.youtube.com/embed/s3Rv7NKSE2s?si=InTlSNDeVpITHm7y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" class="movievid" allowfullscreen></iframe>
            </div>
        </div>
    </div>




    <div class="section light-bg">
        <div class="container">
            <div class="section-title">
                <img src="{{ asset('/images/mascot.gif')}}" style="height:120px;"><br/>
                <h3>MEET MOSCI</h3>
                <small>ARTIFICIAL INTELLIGENCE INTEGRATED TECHNOLOGY</small>
            </div>

            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#communication">E-book Conversion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#schedule">Movie Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages">Trailer Production</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#livechat">AI Production Assistant</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="communication">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="{{ asset('/images_landingspage/graphic.png')}}" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>

                            <h2>E-book Movies</h2>
                            <p class="lead">Moviescript.io realizes the opportunity for production enterprises, producers and writers to be 100% more efficient.</p>
                            <p>
                                By leveraging the power of AI and utilizing it, using it for the movie production industry, we have managed to build a platform which simplifies the conversion of e-books and make them movie production ready.
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>
    </div>
    <!-- // end .section -->









    <div class="section">
        <div class="container">
            <div class="section-title">
                <small>TESTIMONIALS</small>
                <h3>What our Customers Says</h3>
            </div>

            <div class="testimonials owl-carousel">
                <div class="testimonials-single">
                    <img src="{{ asset('/images_landingspage/client.png')}}" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
                <div class="testimonials-single">
                    <img src="{{ asset('/images_landingspage/client.png')}}" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
                <div class="testimonials-single">
                    <img src="{{ asset('/images_landingspage/client.png')}}" alt="client" class="client-img">
                    <blockquote class="blockquote">Uniquely streamline highly efficient scenarios and 24/7 initiatives. Conveniently embrace multifunctional ideas through proactive customer service. Distinctively conceptualize 2.0 intellectual capital via user-centric partnerships.</blockquote>
                    <h5 class="mt-4 mb-2">Crystal Gordon</h5>
                    <p class="text-primary">United States</p>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg" id="pricing">
        <div class="container">
            <div class="section-title">
                <small>PRICING</small>
                <h3>Everyone = Welcome</h3>
            </div>

            <div class="card-deck">
                <div class="card pricing">
                    <div class="card-head">
                        <small class="text-primary">TRY-OUT</small>
                        <span class="price">FREE<sub></sub></span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">1 Projects</div>
                        <div class="list-group-item">2 Chapters p/project</div>
                        <div class="list-group-item">10 Pages p/chapter</div>
                        <div class="list-group-item">12 Archetypes</div>
                        <div class="list-group-item">Unlimited Acts</div>
                        <div class="list-group-item">Unlimited Plots</div>
                        <div class="list-group-item">Unlimited Acting Roles</div>
                        <div class="list-group-item">Unlimited Actor Lines</div>
                    </ul>
                    <div class="card-body">
                        <a href="/register" class="btn btn-primary btn-lg btn-block">Sign up</a>
                    </div>
                </div>
                <div class="card pricing popular">
                    <div class="card-head">
                        <small class="text-primary">FOR HOBBY</small>
                        <span class="price">€17,95<sub>/month</sub></span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">2 Projects</div>
                        <div class="list-group-item">Unlimited Chapters p/project</div>
                        <div class="list-group-item">Unlimited Pages p/chapter</div>
                        <div class="list-group-item">12 Archetypes</div>
                        <div class="list-group-item">8 Acts</div>
                        <div class="list-group-item">7 Plots p/act</div>
                        <div class="list-group-item">Unlimited Acting Roles</div>
                        <div class="list-group-item">Unlimited Actor Lines</div>
                    </ul>
                    <div class="card-body">
                        <a href="/pay/hobby" class="btn btn-primary btn-lg btn-block">Choose this Plan</a>
                    </div>
                </div>
                <div class="card pricing">
                    <div class="card-head">
                        <small class="text-primary">FOR PRODUCTION COMPANIES</small>
                        <span class="price">€99,95<sub>/month</sub></span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <div class="list-group-item">4 Projects p/year</div>
                        <div class="list-group-item">Unlimited Chapters p/p</div>
                        <div class="list-group-item">Unlimited Pages p/c</div>
                        <div class="list-group-item">12 Archetypes</div>
                        <div class="list-group-item">Unlimited Acts</div>
                        <div class="list-group-item">Unlimited Plots</div>
                        <div class="list-group-item">Unlimited Acting Roles</div>
                        <div class="list-group-item">Unlimited Actor Lines</div>
                    </ul>
                    <div class="card-body">
                        <a href="/pay/business" class="btn btn-primary btn-lg btn-block">Choose this Plan</a>
                    </div>
                </div>
            </div>
            <!-- // end .pricing -->
        </div>

    </div>
    <!-- // end .section -->

    <div class="section bg-gradient">
        <div class="container">
            <div class="call-to-action">

                <div class="box-icon"><span class="ti ti-control-play gradient-fill ti-3x"></span></div>
                <h2>START YOUR MOVIE PRODUCTION CAREER</h2>
                <p class="tagline">Using moviescript.io isn't only the most efficient tool to use for big movie production organisations. But it will also elevate those whom want to be a professional movie producer by utitilizing the power of AI.</p>
                <div class="my-4">

                    <a href="/register" class="btn btn-light">Try it now!</a>
                </div>
                <p class="text-primary"><small><i>*Works For Everyone! </i></small></p>
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <!-- // end .section -->
    <footer class="my-5 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © {{ date('Y') }}. ALL RIGHTS RESERVED BY <a href="https://siteboostsystems.com">The Siteboost Systems</a></small></p>

        <small>
            <a href="#" class="m-2">PRESS</a>
            <a href="#" class="m-2">TERMS</a>
            <a href="#" class="m-2">PRIVACY</a>
        </small>
    </footer>


</body>

</html>
