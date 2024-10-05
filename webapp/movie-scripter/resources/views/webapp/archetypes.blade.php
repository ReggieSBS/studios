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
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  @if($ebookdata)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="Back to e-book">
                    <a class="btn btn-secondary text-white" href="/ebook/{{ $ebookdata->id }}"><i class="mdi mdi-book"></i></a>
                  </li>
                  @endif
                  @if($countmovies > 0)
                  <li class="actionbar_item" aria-current="page" data-bs-toggle="tooltip" title="New Act">
                    <a class="btn btn-success text-white" href="#" data-bs-toggle="modal" data-bs-target="#actModal"><i class="mdi mdi-plus"></i> New Act</a>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>

            <div class="row">
              <div class="col-lg-8">
                @if($totalebookpages > 0 && $totalebookchapters > 0 && $totalebookcharacters > 0 && $countmovies == 0)
                  <div class="card">
                    <div class="card-body">
                      <h2>Congratulations!</h2>
                      <h5>You are ready to start to create your movie</h5>
                      <p>The e-book analysation phase is complete. Now please fill in the information below and click on create movie</p>
                      <form method="post" action="{{ route('movie.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-lg-6">
                          <h5>Movie Title</h5>
                          <input type="text" class="form form-control" name="title" placeholder="Jurassic Park 10" required> 
                        </div>
                        <div class="col-lg-4">
                          <h5>Genre</h5>
                          <select class="form form-control" name="genre" required> 
                              <option value="" selected disabled>Make a choice</option>
                              <option>Action</option>
                              <option>Biography</option>
                              <option>Crime</option>
                              <option>Family</option>
                              <option>Horror</option>
                              <option>Romance</option>
                              <option>Sports</option>
                              <option>War</option>
                              <option>Adventure</option>
                              <option>Comedy</option>
                              <option>Documentary</option>
                              <option>Fantasy</option>
                              <option>Thriller</option>
                              <option>Animation</option>
                              <option>Costume</option>
                              <option>Drama</option>
                              <option>History</option>
                              <option>Musical</option>
                              <option>Psychological</option>
                          </select>
                        </div>
                        <div class="col-lg-2">
                        <h5><br/></h5>
                          <button type="submit" class="btn btn-success" style="padding-left:0px; padding-right:0px; text-align:center;"><i class="mdi mdi-movie-open"></i></button>
                        </div>
                        </div>
                        </form>
                    </div>
                  </div>
                @elseif($totalebookpages == 0 || $totalebookchapters == 0 || $totalebookcharacters == 0)
                  <div class="col-md-12 col-lg-7 col-sm-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          <h2>Oh noooo!</h2>
                          <h5>You are not ready with the conversion of your e-book</h5>
                          <p>Please check the To Do List on your Dashboard to check what needs to be done before you can start working on your movie</p>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="owl-carousel" id="owl-carousel3">
                      @foreach($archetypesdata as $archtype)  
                      <div class="item text-center" style="position:relative;">
                          <a href="/archetype/{{ $archtype->id }}"><img src="{{ asset('/images/archetypes/'.$archtype->archetype_name.'.png') }}" height="300" style="width:auto;"><br/></a>
                          <h2 class="archetype-title">{{ $archtype->name }}</h2>
                          <div class="round-set">
                            <table style="width:100%; height:100%;">
                              <tr>
                                <td style="text-align:center; vertical-align:middle; width:100%; height:100%;">
                                  <h3>{{ $archtype->archetype_name }}</h3>
                                  <h4>Act {{ $archtype->act_number }}</h4>
                                </td>
                              </tr>
                            </table>
                          </div>
                      </div>
                      @endforeach
                  </div>
                @endif
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <i class="mdi mdi-information mdi-24px" style="box-shadow: 0px 0px 0px #FFF !important; text-shadow:0px 0px 0px #FFF !important; position:absolute; right:10px; top:3px; "></i> Archetypes
                  </div>
                  <div class="card-body" style="padding:0px; overflow-x:hidden;">
                    <div class="tab">
                      <div style="height:100%; overflow-y:scroll;">
                        <button class="tablinks" id="ruler"><img src="{{asset('/images/archetypes/ruler.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Ruler"></button>
                        <button class="tablinks" id="creator"><img src="{{asset('/images/archetypes/creator.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Creator / Artist"></button>
                        <button class="tablinks" id="sage"><img src="{{asset('/images/archetypes/sage.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" data-bs-toggle="tooltip" title="Sage"></button>
                        <button class="tablinks" id="innocent"><img src="{{asset('/images/archetypes/innocent.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Innocent"></button>
                        
                        <button class="tablinks" id="explorer"><img src="{{asset('/images/archetypes/explorer.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Explorer"></button>
                        <button class="tablinks" id="rebel"><img src="{{asset('/images/archetypes/outlaw.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" data-bs-toggle="tooltip" title="Rebel/Outlaw"></button>
                        <button class="tablinks" id="hero"><img src="{{asset('/images/archetypes/hero.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip"data-bs-toggle="tooltip" title="Hero"></button>
                        <button class="tablinks" id="wizard"><img src="{{asset('/images/archetypes/magician.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Magician"></button>
                        
                        <button class="tablinks" id="jester"><img src="{{asset('/images/archetypes/jetser.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Jetser"></button>
                        <button class="tablinks" id="general_person"><img src="{{asset('/images/archetypes/regular_person.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Regular Person"></button>
                        <button class="tablinks" id="lover"><img src="{{asset('/images/archetypes/lover.png')}}"style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Lover"></button>
                        <button class="tablinks" id="caregiver"><img src="{{asset('/images/archetypes/caregiver.png')}}" style="height:60px; width:60px;" data-bs-toggle="tooltip" title="Care Giver"></button>
                        </div>
                    </div>

                    <div style="height:100%; overflow-y:scroll;">
                    <div class="tabcontent" id="content_ruler">
                      <h3>The Ruler</h3>
                      <hr>
                      <strong>Self Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: Power isn’t everything, it’s the only thing.</li>
                        <li>Core desire: control</li>
                        <li>Goal: create a prosperous, successful family or community</li>
                        <li>Strategy: exercise power</li>
                        <li>Greatest fear: chaos, being overthrown</li>
                        <li>Weakness: being authoritarian, unable to delegate</li>
                        <li>Talent: responsibility, leadership</li>
                        <li>The Ruler is also known as: The boss, leader, aristocrat, king, queen, politician, role model, manager or administrator.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_creator">
                      <h3>Creator</h3>
                      <hr>
                      <strong>Soul Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: If you can imagine it, it can be done</li>
                        <li>Core desire: to create things of enduring value</li>
                        <li>Goal: to realize a vision</li>
                        <li>Greatest fear: mediocre vision or execution</li>
                        <li>Strategy: develop artistic control and skill</li>
                        <li>Task: to create culture, express own vision</li>
                        <li>Weakness: perfectionism, bad solutions</li>
                        <li>Talent: creativity and imagination</li>
                        <li>The Creator is also known as: The artist, inventor, innovator, musician, writer or dreamer.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_sage">
                      <h3>Sage</h3>
                      <hr>
                      <strong>Self Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: The truth will set you free</li>
                        <li>Core desire: to find the truth.</li>
                        <li>Goal: to use intelligence and analysis to understand the world.</li>
                        <li>Biggest fear: being duped, misled—or ignorance.</li>
                        <li>Strategy: seeking out information and knowledge; self-reflection and understanding thought processes.</li>
                        <li>Weakness: can study details forever and never act.</li>
                        <li>Talent: wisdom, intelligence.</li>
                        <li>The Sage is also known as: The expert, scholar, detective, advisor, thinker, philosopher, academic, researcher, thinker, planner, professional, mentor, teacher, contemplative.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_innocent">
                      <h3>Innocent</h3>
                      <hr>
                      <strong>Ego Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: Free to be you and me</li>
                        <li>Core desire: to get to paradise</li>
                        <li>Goal: to be happy</li>
                        <li>Greatest fear: to be punished for doing something bad or wrong</li>
                        <li>Strategy: to do things right</li>
                        <li>Weakness: boring for all their naive innocence</li>
                        <li>Talent: faith and optimism</li>
                        <li>The Innocent is also known as: Utopian, traditionalist, naive, mystic, saint, romantic, dreamer.</li>
                      </ul>
                    </div>

                    
                    <div class="tabcontent" id="content_explorer">
                      <h3>Explorer</h3>
                      <hr>
                      <strong>Soul Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: Don’t fence me in</li>
                        <li>Core desire: the freedom to find out who you are through exploring the world</li>
                        <li>Goal: to experience a better, more authentic, more fulfilling life</li>
                        <li>Biggest fear: getting trapped, conformity, and inner emptiness</li>
                        <li>Strategy: journey, seeking out and experiencing new things, escape from boredom</li>
                        <li>Weakness: aimless wandering, becoming a misfit</li>
                        <li>Talent: autonomy, ambition, being true to one’s soul</li>
                        <li>The explorer is also known as: The seeker, iconoclast, wanderer, individualist, pilgrim.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_rebel">
                      <h3>Outlaw/Rebel</h3>
                      <hr>
                      <strong>Soul Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: Rules are made to be broken</li>
                        <li>Core desire: revenge or revolution</li>
                        <li>Goal: to overturn what isn’t working</li>
                        <li>Greatest fear: to be powerless or ineffectual</li>
                        <li>Strategy: disrupt, destroy, or shock</li>
                        <li>Weakness: crossing over to the dark side, crime</li>
                        <li>Talent: outrageousness, radical freedom</li>
                        <li>The Outlaw is also known as: The rebel, revolutionary, wild man, the misfit, or iconoclast.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_hero">
                      <h3>Hero</h3>
                      <hr>
                      <strong>Ego Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: Where there’s a will, there’s a way</li>
                        <li>Core desire: to prove one’s worth through courageous acts</li>
                        <li>Goal: expert mastery in a way that improves the world</li>
                        <li>Greatest fear: weakness, vulnerability, being a “chicken”</li>
                        <li>Strategy: to be as strong and competent as possible</li>
                        <li>Weakness: arrogance, always needing another battle to fight</li>
                        <li>Talent: competence and courage</li>
                        <li>The Hero is also known as: The warrior, crusader, rescuer, superhero, the soldier, dragon slayer, the winner and the team player.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_wizard">
                      <h3>Wizard/Magician</h3>
                      <hr>
                      <strong>Self Type</strong><br/>
                      <ul class="wp-block-list">
                      <li>Motto: I make things happen.</li>
                      <li>Core desire: understanding the fundamental laws of the universe</li>
                      <li>Goal: to make dreams come true</li>
                      <li>Greatest fear: unintended negative consequences</li>
                      <li>Strategy: develop a vision and live by it</li>
                      <li>Weakness: becoming manipulative</li>
                      <li>Talent: finding win-win solutions</li>
                      <li>The Magician is also known as:The visionary, catalyst, inventor, charismatic leader, shaman, healer, medicine man.</li>
                      </ul>
                    </div>

                    
                    <div class="tabcontent" id="content_jester">
                      <h3>Jester</h3>
                      <hr>
                      <strong>Self Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: You only live once</li>
                        <li>Core desire: to live in the moment with full enjoyment</li>
                        <li>Goal: to have a great time and lighten up the world</li>
                        <li>Greatest fear: being bored or boring others</li>
                        <li>Strategy: play, make jokes, be funny</li>
                        <li>Weakness: frivolity, wasting time</li>
                        <li>Talent: joy</li>
                        <li>The Jester is also known as: The fool, trickster, joker, practical joker or comedian.</li>
                        </ul>
                    </div>
                    <div class="tabcontent" id="content_general_person">
                      <h3>General Person</h3>
                      <hr>
                      <strong>Ego Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: All men and women are created equal</li>
                        <li>Core Desire: connecting with others</li>
                        <li>Goal: to belong</li>
                        <li>Greatest fear: to be left out or to stand out from the crowd</li>
                        <li>Strategy: develop ordinary solid virtues, be down to earth, the common touch</li>
                        <li>Weakness: losing one’s own self in an effort to blend in or for the sake of superficial relationships</li>
                        <li>Talent: realism, empathy, lack of pretense</li>
                        <li>The Everyman is also known as: The good old boy, regular guy/girl, the person next door, the realist, the working stiff, the solid citizen, the good neighbor, the silent majority.</li>
                      </ul>
                    </div>
                    <div class="tabcontent" id="content_lover">
                      <h3>Lover</h3>
                      <hr>
                      <strong>Soul Type</strong><br/>
                      <ul class="wp-block-list">
                        <li>Motto: You’re the only one</li>
                        <li>Core desire: intimacy and experience</li>
                        <li>Goal: being in a relationship with the people, work and surroundings they love</li>
                        <li>Greatest fear: being alone, a wallflower, unwanted, unloved</li>
                        <li>Strategy: to become more and more physically and emotionally attractive</li>
                        <li>Weakness: outward-directed desire to please others at risk of losing own identity</li>
                        <li>Talent: passion, gratitude, appreciation, and commitment</li>
                        <li>The Lover is also known as: The partner, friend, intimate, enthusiast, sensualist, spouse, team-builder.</li>
                        </ul>
                    </div>
                    <div class="tabcontent" id="content_caregiver">
                      <h3>Care Giver</h3>
                      <hr>
                      <strong>Ego Type</strong><br/>
                      <ul class="wp-block-list">
                      <li>Motto: Love your neighbour as yourself</li>
                      <li>Core desire: to protect and care for others</li>
                      <li>Goal: to help others</li>
                      <li>Greatest fear: selfishness and ingratitude</li>
                      <li>Strategy: doing things for others</li>
                      <li>Weakness: martyrdom and being exploited</li>
                      <li>Talent: compassion, generosity</li>
                      <li>The Caregiver is also known as: The saint, altruist, parent, helper, supporter.</li>
                      </ul>
                    </div>
                    </div>


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