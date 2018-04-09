<!--- HEADER INCLUDES START --->
<?php $PageName = "Forside";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->

<section class="row">
    <div class="topnews">
        <img src="content/img/banner1.png" class="col-md-8 imgPadFix"/>
        <img src="content/img/banner2.png" class="col-md-4"/>
    </div>
    <div class="col-md-8">hej</div>
    <aside class="col-md-4 sidearea">
        <img src="content/img/campaign.jpg" alt="" class="col-12">
        <img src="content/img/campaign-2.jpg" alt="" class="col-12">
        <form class="newsletter" method="post">
            <h4>Sign up to our newletter</h4>
            <hr>
            <label for="inputEmail" class="col-3">E-Mail</label>
            <input type="email" name="email" id="inputEmail" style="margin-bottom:1rem;">
            <label for="inputName" class="col-3">Name</label>
            <input type="name" name="name" id="inputName" class="">
            <br>
            <button class="btn ml-auto" type="submit">Signup</button>
        </form>
    </aside>
</section>

<!--- OWL SLIDER SECTION START --->
<section class="row carousel">
    <h1>other products</h1>
    <p>Check our all lastest product in this section</p>
    <div class="col-md-11">
        <div class="owl-carousel">
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
            <div><img src="http://via.placeholder.com/300x200" alt=""></div>
        </div>
    </div>
</section>
<!--- OWL SLIDER SECTION END --->

<!--- HEADER INCLUDES START --->
<?php require_once 'incl/footer.php'; ?>
<!--- HEADER INCLUDES END --->
