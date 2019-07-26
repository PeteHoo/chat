<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free Responsive Html5 Templates">


    <title>zCreative | Free Bootstrap Templates</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Animate.css -->
    <link href="css/animate.css" rel="stylesheet" media="all" type="text/css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index-page">
<div class="flex-center position-ref h-70p">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

</div>
<div class="wrap-body">

    <!--////////////////////////////////////Header-->
    <header>
        <!---Main Header--->
        <div class="main-header">
            <div class="logo">
                <img src="images/logo.png" class="img-responsive">
            </div>
            <!--Navigation-->
            <nav id="menu" class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span id="heading" class="visible-xs">Categories</span>
                        <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>

                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="bloghome?a={{isset($_GET['a'])?$_GET['a']:0}}">Home</a></li>
                            <li><a href="single?a={{isset($_GET['a'])?$_GET['a']:0}}">About Us</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <i class="fa fa-chevron-down"></i></a>
                                <div class="dropdown-menu" style="margin-left: -203.625px;">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li><a href="archive.html">Text 301</a></li>
                                            <li><a href="archive.html">Text 302</a></li>
                                            <li><a href="archive.html">Text 303</a></li>
                                            <li><a href="archive.html">Text 304</a></li>
                                            <li><a href="archive.html">Text 305</a></li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li><a href="archive.html">Text 306</a></li>
                                            <li><a href="archive.html">Text 307</a></li>
                                            <li><a href="archive.html">Text 308</a></li>
                                            <li><a href="archive.html">Text 309</a></li>
                                            <li><a href="archive.html">Text 310</a></li>
                                        </ul>
                                        <ul class="list-unstyled">
                                            <li><a href="archive.html">Text 311</a></li>
                                            <li><a href="archive.html">Text 312</a></li>
                                            <li><a href="archive.html#">Text 313</a></li>
                                            <li><a href="archive.html#">Text 314</a></li>
                                            <li><a href="archive.html">Text 315</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="archive?a={{isset($_GET['a'])?$_GET['a']:0}}">Blog</a></li>
                            <li><a href="contact?a={{isset($_GET['a'])?$_GET['a']:0}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="hero-background">
                <!-- Static Header -->
                <div class="header-text">
                    <div class="header-text-inner">
                        <h1>Be Creative</h1>
                    </div>
                </div><!-- /header-text -->
            </div>
        </div>
    </header>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .h-70p{
            height: 70px;
        }
    </style>