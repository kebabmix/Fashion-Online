<?php
$strCss = isset($strCss) && !empty($strCss) ? $strCss : "bootstrap.min,cms-style";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fashion Online - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/cms/content/css/css.php?f=<?php echo $strCss ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container formWrap">
    <form id="loginform" method="post" autocomplete="off">
        <h1>Login</h1>
        <hr>
        <div id="errormsg" class="text-danger">@ERRORMSG@</div>
        <div class="form-group">
            <label for="username">Username <sup>*</sup></label>
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" class="form-control" name="login_username" id="username" aria-describedby="usernamehelp" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="pwd">Password <sup>*</sup></label>
            <i class="fa fa-key" aria-hidden="true"></i>
            <input type="password" class="form-control" name="login_password" id="pwd" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary col">Login&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></button>
    </form>
</div>

<script src="https://use.fontawesome.com/cbcb113789.js"></script>

</body>
</html>