<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCP</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/css/my-bootstrap-theme.css')}}
    {{HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}


    <!-- Custom CSS -->
    {{ HTML::style('assets/css/style.css') }}
    
    <!-- Dropzone CSS -->
    {{ HTML::style('assets/css/basic.css') }}
    {{ HTML::style('assets/css/dropzone.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Press+Start+2P') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Chivo:400,900') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Amatic+SC') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Montserrat:400,700') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- highlight.js -->
    {{ HTML::style('assets/css/github.css') }}
    {{ HTML::script('assets/js/highlight.pack.js') }} 
   
    <!-- Include all compiled plugins for Google Maps -->
    {{ HTML::script('http://maps.google.com/maps/api/js?sensor=false') }}
    
    <!-- Script for Google Maps -->
    {{ HTML::script('assets/js/googleMaps.js') }}
    
    <!-- Script for embedding Processing -->
    {{ HTML::script('assets/js/processing.min.js') }}
    
    <!-- Script for dropzone -->
    {{ HTML::script('assets/js/dropzone.js') }}
    
    <!-- Latest compiled and minified JavaScript -->
    {{HTML::script('//code.jquery.com/jquery-2.1.1.min.js')}}
    {{HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}
    
</head>


<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body>

    <!-- NAV BAR -->
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" 
                        data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">CCP</a>
            </div>
            <!-- Collection of nav links and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="about">About</a></li>
                    <li><a href="location">Hours &amp Location</a></li>
                    <li><a href="studentWork">Student Work</a></li>

                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    
                    <!-- Check if user is signed in -->
                    @if(isset(Auth::user()->username))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                           aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile">View my profile</a></li>
                            <li><a href="myAccountSettings">Account settings</a></li>
                            <li class="divider"></li>
                            <li><a href="help">Help</a></li>
                            <li class="divider"></li>
                            <li><a href="accountSignOut">Sign out</a></li>
                        </ul>
                    </li>
                    
                    <!-- If they are not signed in, display login button -->
                    @else
                    <li><a href="login">
                        {{ isset(Auth::user()->username) ? Auth::user()->username :  'Login'}}
                    </a></li>
                    @endif
                </ul>
                
                <!-- Show user photo -->
                <ul class="nav nav-bar-nav navbar-right">
                    @if (isset(Auth::user()->photo_file_name)) 
                        {{ HTML::image('/assets/uploads/' . Auth::user()->photo_file_name, 
                        'userphoto', array('class' => 'brand')) }}
                    @endif
                </ul>
                                
            </div>
        </div>
    </nav>
    
    <!-- CONTENT -->
    @yield('content')
    
    <!-- FOOTER -->
    <footer>
        <div class="container">
            <span class="copyright">Copyright &copy; 
                Nicole Yarroch 2015</span>
        </div>
    </footer>
    
</body>
    
</html>