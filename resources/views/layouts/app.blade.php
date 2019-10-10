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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <!-- Begin emoji-picker Stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/css/emoji.min.css" rel="stylesheet">
    <!-- End emoji-picker Stylesheets -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.1.0/font-awesome-animation.min.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/usm/popper.min.js"></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-mfizz/2.4.1/font-mfizz.min.css">
    <style type="text/css">
        body {
            background-color: #EBEEF2;
            font-size: 14px;
        }
        .jumbotron {
            color: #15e84d;
            /*background-image: url("../img/nexforum.png");*/
            /*background-size: cover;*/
            /*z-index: -2;*/
            /*opacity: 0.1;*/
            /*background-color: #343a40;*/
            text-shadow: #343a40 2px 2px;
        }

        .display-4 {
            font-weight: bold;
            text-shadow: 1px 1px 4px;

        }
        
        

    </style>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-1193858349069786",
              enable_page_level_ads: true
         });
    </script>
    
    <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
    </script>

</head>
<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=159392448065064&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light navbar-laravel fixed-top top-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">

                   <h4 style="color:#59c669"><strong>NexForum</strong><i class="fas fa-comments mr-lg-4 faa-parent animated-hover faa-fast faa-pulse fa-1x" style="color: #59c669;"></i></h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}"><strong>{{ __('Login') }}</strong></a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><strong>{{ __('Register') }}</strong></a></li>
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron jumbotron-fluid text-center bg-dark">
            <div class="container-fluid">
              <h2 class="display-4" style="margin-top: 5rem;">Connect with NexForum</h2>
              <p>&#8220;A web application where developers interact,to ask questions,update others on upcoming technologies and solve problems together.Both for newbies and advanced developers. &#8221;</p>
              <hr>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       <ul class="nav justify-content-center">
                          <li class="nav-item">
                            <a class="nav-link"  style="color:#59c669;"><i class="fab fa-android fa-3x faa-parent animated-hover faa-fast faa-shake"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  style="color:lightblue;"><i class="fab fa-js fa-3x faa-parent animated-hover faa-fast faa-shake"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  style="color:#ed780b;"><i class="fab fa-html5 fa-3x faa-parent animated-hover faa-fast faa-flash"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  style="color:cyan;"><i class="fab fa-css3-alt fa-3x faa-parent animated-hover faa-fast faa-bounce"></i></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  style="color:Tomato;"><i class="fab fa-laravel fa-3x faa-parent animated-hover faa-fast faa-float"></i></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"  style="color:#4fc177;"><i class="fab fa-python fa-3x faa-parent animated-hover faa-fast faa-tada"></i></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"  style="color:#cc1804;"><i class="fas fa-gem fa-3x faa-parent animated-hover faa-fast faa-burst"></i></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"  style="color:#e0301d;"><i class="fab fa-java fa-3x faa-parent animated-hover faa-fast faa-horizontal"></i></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"  style="color:#8b73b7;"><i class="fab fa-php fa-3x faa-parent animated-hover faa-fast faa-pulse"></i></a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"  style="color:white;"><i class="fas fa-database fa-3x faa-parent animated-hover faa-fast faa-falling"></i></a>
                          </li>
                        </ul>
                  </div>
                </div>
            </div></div>
            </div>
            
        @if($errors->count() > 0)
            <ul class="list-group-item">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
            <br>
        @endif
        
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                                       
                        <a href="{{url('/forum')}}" class="form-control btn btn-success"><i class="fas fa-home fa-2x"></i><b>HOME</b></a>
                         <br><br>
                        
                    <a href="{{route('discussion.create')}}" class="form-control btn btn-success"><b>Create A Discussion</b></a>
                    <br><br>

                   
                    <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded">
                      <div class="card-header border-0 bg-white text-dark font-weight-bold">
                        <b>SELECT A FILTER</b>
                      </div>
                      <ul class="list-group list-group-flush">
                        @if(Auth::check())
                        <li class="list-group-item">
                            <a href="{{url('/forum?filter=me')}}" style="color:#59c669;" > <b>My discussions</b> </a>

                        </li>
                        @endif

                        <li class="list-group-item">
                            <a href="{{url('/forum?filter=solved')}}" style="color:#59c669;"> <b>Solved</b> <i class="far fa-check-circle fa-2x"></i> </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{url('/forum?filter=unsolved')}}" style="color:#59c669;" > <b>Unsolved</b> <i class="fas fa-question-circle fa-2x"></i> </a>
                        </li>
                      </ul>
                    </div>
                    <br>
                    @if(Auth::check())
                    @if(Auth::user()->admin)
                    <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="/channels">All Channels</a>
                            <span class="float-right badge badge-pill badge-success">{{$channels->count()}} </span>
                        </li>
                      </ul>
                    </div>
                    @endif
                    @endif
                    <br>
                    <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded">
                      <div class="card-header border-0 bg-white text-dark font-weight-bold">
                       <b>OR PICK A CHANNEL</b> 
                      </div>
                      <ul class="list-group list-group-flush">
                        @foreach($channels as $channel)
                        <li class="list-group-item">
                            <a href="{{route('channel', ['slug' => $channel->slug])}}" style="color:#59c669;"><b>{{$channel->title}}</b></a>
                            <span class="float-right badge badge-pill badge-success">{{$channel->discussions->count()}} </span>
                        </li>
                        @endforeach

                      </ul>
                    </div>
                    <br>
                    <div class="fb-post" data-href="https://web.facebook.com/muel.sam.902/posts/2058860714361255" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/muel.sam.902/posts/2058860714361255" class="fb-xfbml-parse-ignore"><p>#nextechdevelopers at a meeting to discuss the best solutions for the upcoming tech-thirsty generation. We are...</p>Posted by <a href="https://www.facebook.com/muel.sam.902">Muel Sam</a> on&nbsp;<a href="https://www.facebook.com/muel.sam.902/posts/2058860714361255">Thursday, 7 June 2018</a></blockquote>
                    </div>
                    <hr>
                    <br>
                     <blockquote class="twitter-tweet"><p lang="es" dir="ltr">Laravel 5.6 Forum App Demo <a href="https://t.co/3yoIYrfEhG">https://t.co/3yoIYrfEhG</a> via <a href="https://twitter.com/YouTube?ref_src=twsrc%5Etfw">@YouTube</a></p>&mdash; Nextech (@Nextechdevs) <a href="https://twitter.com/Nextechdevs/status/988742498846724097?ref_src=twsrc%5Etfw">April 24, 2018</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                    <br>
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <br>
                    <hr>
                    <br>
                    <div>
                        <amp-auto-ads type="adsense"
                            data-ad-client="ca-pub-1193858349069786">
                        </amp-auto-ads>
                    </div>
                    <br><br><br>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
            <!-- Footer -->
        <footer class="footer text-white" style="background-color: #17594a;">

        <!-- Social Icons -->
        <div class="bg-faded">
            <div class="container-fluid">
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
        <div class="container pt-5 pb-2">
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
        <div class="container-fluid">
            <p class="text-center m-0 py-1">
                © 2018 Copyright <a href="https://nextechdevelopers.com/">NexTech Developers</a>
            </p>
        </div>
        <!-- Copyright -->

    </footer>
            <!-- Footer -->
    </div>
    
<!--firebase scripts-->
       
<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>
<!--end firebase scripts-->
    <!-- scripts -->
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success')}}')
        @endif
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    
   <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Begin emoji-picker JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/config.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/util.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/jquery.emojiarea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/emoji-picker.min.js"></script>
    <!-- End emoji-picker JavaScript -->

    <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: '../lib/img/',
          popupButtonClasses: 'fa fa-smile-o'
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
</body>
</html>
