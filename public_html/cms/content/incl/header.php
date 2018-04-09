<?php
global $auth, $strModuleName, $strModuleMode;
$strCss = isset($strCss) && !empty($strCss) ? $strCss : "bootstrap.min,cms-style,summernote";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/cms/assets/css/css.php?f=<?php echo $strCss ?>" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="/cms/assets/js/js.php?f=<?php echo $strJs ?>" type="text/javascript"></script>
    <title>Eget CMS - <?php echo $strModuleName;?></title>
</head>

<body>

<div class="gridContainer">
    <nav class="sidebar">
        <div class="brand">CMS</div>
        <ul>
            <li class="sidebar-item"><a href="?mode=list"><i class="fa fa-bars" aria-hidden="true"></i>Oversigt</a></li>
            <li class="sidebar-item"><a href="?mode=create"><i class="fa fa-envelope-o" aria-hidden="true"></i>Nyhedsbrev</a></li>
            <li class="sidebar-item"><a href="?mode=create"><i class="fa fa-search" aria-hidden="true"></i>Search</a></li>
            <li class="sidebar-item"><a href="?mode=create"><i class="fa fa-upload" aria-hidden="true"></i>Upload</a></li>
            <li class="sidebar-item"><a href="?mode=create"><i class="fa fa-user" aria-hidden="true"></i>User</a></li>
        </ul>
        <a href="?action=logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
    </nav>
    <div class="content container-fluid">