<?php
global $auth, $strModuleName, $strModuleMode;
$strCss = isset($strCss) && !empty($strCss) ? $strCss : "bootstrap.min,cms-style";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/cms/content/css/css.php?f=<?php echo $strCss ?>" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="/cms/content/js/js.php?f=<?php echo $strJs ?>" type="text/javascript"></script>
    <title>Eget CMS - <?php echo $strModuleName;?></title>
</head>

<body class="container">

<div>
    <nav>
        <div class="brand">CMS</div>
        <ul>
            <li><a href="index.php">Forside</a></li>
            <li><a href="product.php">Produkter</a></li>
            <li><a href="">Noget</a></li>
            <li><a href="">Noget</a></li>
            <li><a href="">Noget</a></li>
        </ul>
        <a href="?action=logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
    </nav>
    <div class="content container-fluid">