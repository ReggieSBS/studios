<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <div class="leftmenu"></div>
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">@if($ebookdata)
                  <img src=" {{asset($ebookdata->image)}} " alt="profile" />
                  <span class="login-status online"></span>@endif
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">@if($ebookdata) {{ $ebookdata->name }} @endif</span>
                  <span class="text-secondary text-small">Loaded e-book</span>
                </div>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">E-books</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Upload E-book</a>
                  </li>
                  @foreach($ebooks->first()->ebooks as $ebook)
                  <li class="nav-item">
                    <a class="nav-link" href="/ebook/{{ $ebook->id }}">{{ $ebook->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-chapters" aria-expanded="false" aria-controls="ui-chapters">
                <span class="menu-title">Chapters</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
              <div class="collapse" id="ui-chapters">
                <ul class="nav flex-column sub-menu">
                @foreach($ebookchapters as $chapter)
                  <li class="nav-item">
                  <a class="nav-link" href="/chapter/{{ $chapter->id }}">chapter nr. {{ $chapter->chapter_number }} - {{ $chapter->title }}</a>
                  </li>
                @endforeach
                </ul>
              </div>
            </li>

            
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-pages" aria-expanded="false" aria-controls="ui-pages">
                <span class="menu-title">Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
              <div class="collapse" id="ui-pages">
                <ul class="nav flex-column sub-menu">
                @foreach($ebookpages as $page)
                  <li class="nav-item">
                    <a class="nav-link" href="/page/{{ $page->id }}">page nr. {{ $page->page_number }}</a>
                  </li>
                @endforeach
                </ul>
              </div>
            </li>


            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-characters" aria-expanded="false" aria-controls="ui-characters">
                <span class="menu-title">Characters</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-book menu-icon"></i>
              </a>
              <div class="collapse" id="ui-characters">
                <ul class="nav flex-column sub-menu">
                  @foreach($ebookcharacters as $character)
                  <li class="nav-item">
                  <a class="nav-link" href="/character/{{ $character->id }}">{{ $character->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-movie" aria-expanded="false" aria-controls="ui-movie">
                <span class="menu-title">Movie Script</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-movie menu-icon"></i>
              </a>
              <div class="collapse" id="ui-movie">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Questions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Archytypes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Formula</a>
                  </li>
                  
                </ul>
              </div>
            </li>

            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-act" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Acts</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-movie menu-icon"></i>
            </a>
            <div class="collapse" id="ui-act">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="pages/ui-features/buttons.html">Act 1</a>
                </li>
                </ul>
            </div>
            </li>
            

          </ul>
        </nav>