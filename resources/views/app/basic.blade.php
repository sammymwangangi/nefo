<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>{{ config('app.name', 'Nex Forum') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
          <!-- Material Design Bootstrap -->
          <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
        <style>
           
/* Required for full background image */

html,
body,
header,
.view {
  height: 100%;
}

@media (max-width: 740px) {
  header {
    height: 1000px;
  }
}
.shandow{
   
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
.theme{
    background-color: #056839;
}
.top-nav-collapse {
  background-color: #056839 !important;
}

.navbar:not(.top-nav-collapse) {
  background: transparent !important;
}

@media (max-width: 768px) {
  .navbar:not(.top-nav-collapse) {
    background: #056839 !important;
  }
}

.rgba-gradient {
  background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
  background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
  background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
}

.card {
  background-color: rgba(126, 123, 215, 0.2);
}

.md-form label {
  color: #ffffff;
}

h6 {
  line-height: 1.7;
}

/*///////////////////////////////// top quiz*/
.line{
 background-color: green;

}

/*/////////////////////////////////// end top quiz*/
        
        </style>
    </head>
    <body>
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="#">
        <strong>Nex forum</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Users</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="#">help</a>
          </li>
        </ul>
        <form class="form-inline">
          <div class="md-form mt-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          </div>

        </form>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

@yield('content')



<!--Footer-->
<footer class="page-footer theme center-on-small-only">

    <!--Footer Links-->
    <div class="container">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Nex technologies</h5>
                <p>A fast growing developer group where you have a one stop point for android
            , web, graphics solutions.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title">Links</h5>
                <ul>
                    <li><a href="#">Facebook:</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagrem</a></li>
                  
                </ul>
            </div>
            <!--/.Second column-->
        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: Nextech <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>
        </div>
    </div>
    <!--/.Copyright-->
</footer>
<!--/.Footer-->

  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
    </body>
</html>
