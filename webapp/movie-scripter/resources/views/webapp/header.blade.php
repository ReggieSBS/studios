<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="/dashboard">
          <img src="{{ asset('/images/logo.png')}}" class="logo-img"></a>
          <a class="navbar-brand brand-logo-mini" href="/dashboard">
          <img src="{{ asset('/images/logo_icon.png')}}" style="height:auto !important; width:100% !important;"></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" style="z-index:999;">
            <span class="mdi mdi-menu" style="text-shadow:0px 0px 0px #000 !important; color:#000;"></span>
          </button>
          <a class="align-self-center" href="/dashboard" style="z-index:999;">
            <span class="fa fa-dashboard" style="text-shadow:0px 0px 0px #000 !important; color: #fe7c96; font-size: 18px;" data-toggle="tooltip" data-placement="bottom" title="Go to dasbhoard"></span>
          </a>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <img src="{{ asset('./images/mascot.gif') }}" height="80">
                </div>
                <input type="text" class="form-control bg-transparent border-0"  data-bs-toggle="modal" data-bs-target="#askAI" placeholder="Ask Mosci">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                <img src="{{ asset('images_webapp/faces/face1.jpg')}}" alt="profile" />
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#"><i class="mdi mdi-account me-2 text-success"></i> Profile settings </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="mdi mdi-piggy-bank me-2 text-success"></i> Billing & Subscription </a>
                <a class="dropdown-item" href="#"><i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline" style="text-shadow:0px 0px 0px #000;"></i>
                <span class="count-symbol bg-warning" style="width:20px; height:20px; padding-bottom:10px; padding-left:5px;">{{ $messagescount }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>

                @if($messagescount>0)
                @foreach($messages as $message)
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="{{ asset('/images/mascot-msg-icon.png') }}" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center" data-toggle="tooltip" data-placement="left" title="{{ $message->message }}">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                      {{ substr($message->message, 0,  20); }}
                    </h6>
                    <p class="text-gray mb-0"> Send by Mosci </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                @endforeach
                <a class="p-3 mb-0 text-center text-danger">Delete messages</a>
                @else
                <p class="p-3 mb-0 text-center">No messages found</p>
                @endif
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline" style="text-shadow:0px 0px 0px #000;"></i>
                <span class="count-symbol bg-danger">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link" style="cursor:pointer;">
                <i class="mdi mdi-fullscreen" id="fullscreen-button" style="text-shadow:0px 0px 0px #000;"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="{{ route('logout') }}">
                <i class="mdi mdi-power" style="text-shadow:0px 0px 0px #000;"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>