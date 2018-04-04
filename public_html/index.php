<!--- HEADER INCLUDES START --->
<?php $PageName = "Forside";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->

<section class="container">
    <div class="row">
        <div class="topnews">
            <img src="content/img/banner1.png" class="col-md-8 imgPadFix"/>
            <img src="content/img/banner2.png" class="col-md-4 imgFix"/>
        </div>
        <div class="col-md-8">hej</div>
        <aside class="col-md-4 sidearea">
            <img src="content/img/campaign.jpg" alt="" class="col-12">
            <img src="content/img/campaign-2.jpg" alt="" class="col-12">
            <form class="newsletter" method="post">
                <h3>Sign up to our newletter</h3>
                <hr>
                <label for="inputEmail" class="col-3">E-Mail</label>
                <input type="email" name="email" id="inputEmail" class="">
                <label for="inputName" class="col-3">Name</label>
                <input type="name" name="name" id="inputName" class="">
                <br>
                <button class="btn ml-auto" type="submit">Signup</button>
            </form>
        </aside>
    </div>
</section>

<!--- HEADER INCLUDES START --->
<?php require_once 'incl/footer.php'; ?>
<!--- HEADER INCLUDES END --->