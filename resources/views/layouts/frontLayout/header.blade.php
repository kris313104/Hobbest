   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top bg-warning bg-gradient ">
       <div class="container d-flex align-items-center justify-content-between">

           <div class="logo">
               <h1><a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo_main.png') }}" alt="homepage"
                           class="light-logo" style="max-width: 100%; max-height: auto;" /></a></h1>
               <!-- Uncomment below if you prefer to use an image logo -->
               <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
           </div>

           <nav id="navbar" class="navbar">
               <ul>

                   @guest
                   <li><a class="nav-link scrollto active text-white" href="{{url('/#hero')}}">Home</a></li>
                   <li><a class="nav-link scrollto text-white" href="{{url('/#features')}}">App Features</a></li>
                   <li><a class="nav-link scrollto text-white" href="{{url('/#pricing')}}">Pricing</a></li>
                   <li><a class="nav-link scrollto text-white" href="{{url('/#faq')}}">F.A.Q</a></li>

                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="getstarted scrollto text-white bg-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li><a class="getstarted scrollto text-white bg-dark" href="{{ url('/app') }}">App</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </ul>
                      </li>

                    @endguest
               </ul>
               <i class="bi bi-list mobile-nav-toggle"></i>
           </nav><!-- .navbar -->

       </div>
   </header><!-- End Header -->
