<!DOCTYPE html>
<html>
<head>

    <!--- META DATA START --->
    <meta charset="utf-8">
    <title>Fashion Online | <?= $PageName ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#FFFFFF">

    <!--- CSS/STYLE --->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="content/css/style.css">

    <!--- FONTS --->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!--- CDN ICONS --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="container">

<!--- HEADER SECTION START --->
<header>
    <div class="header_top">
        <ul>
            <li><a href="#">Find retailer</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="ml-auto">
            <a href="#">Sign In</a>
            <form action="">
                <input type="text" placeholder="Username" class="col-md-5">&nbsp;
                <input type="password" placeholder="Password" class="col-md-5">&nbsp;
                <button type="submit" class="btn">Go</button>
            </form>
        </div>
    </div>

    <!-- LOGO -->
    <a href="index.php">
        <img src="/content/img/logo/Fashion_online_-_200x60.png" alt="Fashion-online-logo" class="logo">
    </a>

    <!-- NAVIGATION -->
    <nav class="nav navbar navbar-expand-lg">
        <!-- HAMBURGER MENU -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                onclick="myFunction(this)">
            <span class="bar1"></span>
            <span class="bar2"></span>
            <span class="bar3"></span>
        </button>
        <!-- HAMBURGER MENU END -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Mens</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Collections</a></li>
            </ul>
            <form action="" class="col-md-3">
                <input type="text" name="search" placeholder="Search.." class="search col-12">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </nav><!-- NAVIGATION END -->
</header><!--- HEADER SECTION END --->
