<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{asset('img/nexf.png')}}">
  <title>NexForum</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/dracula.min.css" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.1.0/font-awesome-animation.min.css">

  <style>
      #menu-toggle:checked + #menu {
        display: block;
      }
  </style>
</head>
<body class="bg-white">

  {{-- NavBar --}}

    <header class="lg:px-8 px-2 bg-green-700 p-6 flex flex-wrap items-center lg:py-4 shadow text-sm">
        <div class="flex-1 flex justify-between items-center">
          <a class="text-green-400" href="{{ url('/') }}">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
              <svg class="fill-current h-8 w-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M6 14H4a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v13a1 1 0 0 1-1.7.7L16.58 18H8a2 2 0 0 1-2-2v-2zm0-2V8c0-1.1.9-2 2-2h8V4H4v8h2zm14-4H8v8h9a1 1 0 0 1 .7.3l2.3 2.29V8z"/></svg>
              <span class="font-semibold text-xl tracking-tight">NexForum</span>
            </div>
          </a>
        </div>

        <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
          <nav>
            <ul class="lg:flex items-center justify-between text-base text-white pt-4 lg:pt-0">
              <li class="mr-6 mt-2">
                <a href="{{ url('/') }}" class="block mt-4 lg:inline-block lg:mt-0">
                  Home
                </a>
              </li>
              <li class="mr-32 mt-2">
                <a href="{{route('discussion.create')}}">
                  <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
                    <span><i class="fas fa-plus fa-o.5x text-white"></i></span>
                    <span class="ml-2 text-white">New Discussion</span>
                  </button>
                </a>
              </li>
              <li class="mr-6 mt-2">
                <form>
                  <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full py-1 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-400" id="inline-full-name" type="text" value="search...">
                </form>
              </li>
              @guest
              <li><a class="lg:p-4 py-3 px-0 block border-b-2 text-xs border-transparent hover:border-green-400" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="lg:p-4 py-3 px-0 block border-b-2 text-xs border-transparent hover:border-green-400" href="{{ route('register') }}">{{ __('Sign Up') }}</a></li>
              @else
              <li class="mr-2 mt-2">
                <a href="{{ url('/profile/editProfile/'.Auth::user()->id ) }}">
                  <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
                    <span><i class="fas fa-edit fa-o.5x text-white"></i></span>
                    <span class="ml-2 text-white">{{ __('Edit Profile') }}</span>
                  </button>
                </a>
              </li>
              <li class="mr-2 mt-2">
                <a href="{{ url('/profile/passwordChange') }}">
                  <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
                    <span><i class="fas fa-lock fa-o.5x text-white"></i></span>
                    <span class="ml-2 text-white">{{ __('Change Password') }}</span>
                  </button>
                </a>
              </li>
              <li class="mr-2 mt-2">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
                    <span><i class="fas fa-sign-out fa-o.5x text-white"></i></span>
                    <span class="ml-2 text-white">{{ __('Sign Out') }}</span>
                  </button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
              </li>
              
              <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
              <img src="{{ asset('images/users/'.Auth::user()->avatar )}}" class="w-10 h-10 rounded-full" alt="">
              @endguest
            </ul>
          </nav>
        </div>
    </header>

  {{-- Content --}}

    <div class="flex-1 flex flex-col min-h-screen">
      <div class="flex flex-col min-h-screen p-8">
        <div class="flex-1 flex justify-between overflow-y-hidden">
          <div class="w-56 flex-none overflow-y-auto">

            {{-- SELECT FILTER --}}
            <h3 class="tracking-wide uppercase font-bold text-sm mb-2">select a filter</h3>
            <ul class="px-2 py-2">
              <li class="px-2 mb-2">
                <a href="{{url('/')}}" class="flex items-center font-semibold text-sm hover:text-green-400">
                    <span><i class="fas fa-comments"></i></span>
                    <span class="ml-2">All Discussions</span>
                </a>
              </li>
              @if(Auth::check())
              <li class="px-2 mb-2">
                <a href="{{url('/forum?filter=me')}}" class="flex items-center font-semibold text-sm">
                    <span><i class="fas fa-user fa-o.5x"></i></span>
                    <span class="ml-2">My discussions</span>
                </a>
              </li>
              @endif
              <li class="px-2 mb-2">
                <a href="{{url('/forum?filter=solved')}}" class="flex items-center font-semibold text-sm hover:text-green-400">
                    <span><i class="far fa-check-circle"></i></span>
                    <span class="ml-2">Solved</span>
                </a>
              </li>
              <li class="px-2 mb-2">
                <a href="{{url('/forum?filter=unsolved')}}" class="flex items-center font-semibold text-sm">
                    <span><i class="fas fa-question-circle"></i></span>
                    <span class="ml-2">Unsolved</span>
                </a>
              </li>
            </ul>

            {{-- All Channels --}}
            @if(Auth::check())
            @if(Auth::user()->admin)
            <ul class="px-2 py-2">
              <li class="px-2 mb-2">
                <a href="{{url('/channels')}}" class="flex items-center font-semibold text-sm">
                    <span class="text-sm">All Channels</span>
                    <span class="ml-2">{{$channels->count()}}</span>
                </a>
              </li>
            </ul>
            @endif
            @endif

            {{-- PICK A CHANNEL --}}
            <h3 class="tracking-wide uppercase font-bold text-sm mb-2">OR PICK A CHANNEL</h3>
            <ul class="px-2 py-2">
             @foreach($channels as $channel)
              <li class="px-2 mb-2">
                <a href="{{url('/forum?filter=me')}}" class="flex items-center font-semibold text-sm">
                    <span>@include('layouts/channel-list')</span>
                    <span class="ml-2">{{$channel->title}}</span>
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="flex-1 overflow-y-auto">@yield('content')</div>
        </div>
      </div>
    </div>

  <!-- Footer -->
    <footer class="footer text-white" style="background-color: #17594a;">

      <!-- Social Icons -->
      <div class="bg-faded">
          <div class="container mx-auto px-4">
              <div class="row py-4">
                  <div class="col-md-6 col-lg-7">
                      <h4 class="mb-0">Get connected with us on social networks!</h4>
                  </div>
                  <div class="col-md-6 col-lg-5 text-right">
                      <a href="https://www.facebook.com/nextechdevs/"><i class="fab fa-facebook  mr-lg-4 fa-3x faa-parent animated-hover faa-fast faa-shake" style="color:white;"> </i></a>
                      <a href="https://twitter.com/Nextechdevs"><i class="fab fa-twitter  mr-lg-4 fa-3x faa-parent animated-hover faa-fast faa-shake" style="color:white;"> </i></a>
                      <a href="https://plus.google.com/u/0/104364969124506760280"><i class="fab fa-google-plus  mr-lg-4 fa-3x faa-parent animated-hover faa-fast faa-shake" style="color:white;"> </i></a>
                      <a href="https://www.linkedin.com/in/nextechdevs"><i class="fab fa-linkedin  mr-lg-4 fa-3x faa-parent animated-hover faa-fast faa-shake" style="color:white;"> </i></a>
                  </div>
              </div>
          </div>
      </div>
      <!-- Social Icons -->

      <!-- Footer Links -->
      <div class="container mx-auto px-4 pt-5 pb-2">
          <div class="row">

              <div class="col-md-3 col-lg-4 col-xl-3">
                  <h4 style="color:#59c669"><strong>NexForum</strong><i class="fas fa-comments mr-lg-4 faa-parent animated-hover faa-fast faa-pulse fa-2x" style="color: #59c669;"></i></h4>
                  <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                  <p>
                      An application where developers interact,to ask questions,update others on upcoming technologies and solve problems together.Both for newbies and advanced developers.
                  </p>
              </div>

              <div class="col-md-4 col-lg-3 col-xl-3">
                  <h4>Contact</h4>
                  <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                  
                  <p><i class="fa fa-envelope mr-3"></i>info@nextechdevelopers.com</p>
                  <p><i class="fa fa-phone mr-3"></i> +254717503802</p>
                  <p><i class="fa fa-phone mr-3"></i> +254717353774</p>

              </div>

          </div>
      </div>
      <!-- Footer Links-->

      <hr class="bg-white mx-4 mt-2 mb-1">

      <!-- Copyright-->
      <div class="container mx-auto px-4">
          <p class="text-center m-0 py-1">
              © 2020 Copyright <a href="https://nextechdevelopers.com/">NexTech Developers</a>
          </p>
      </div>
      <!-- Copyright -->
    </footer>
  <!-- Footer -->
  
  {{-- SCRIPTS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success')}}')
        @endif
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
