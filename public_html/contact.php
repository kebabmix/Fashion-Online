<!--- HEADER INCLUDES START --->
<?php $PageName = "Forside";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->
<!--- TOP BANNER/TEXT START --->
<section class="container">
    <div class="row">
        <div class="ctcBanner">
            <h1>contact us</h1>
            <div class="linebox">
                <span>Write us a message here</span>
                <div class="triangle">
                </div>
            </div>
        </div>
    </div>
</section>
<!--- TOP BANNER/TEXT END --->
<br/>
<section class="row">
    <div class="col-md-4">
        <form class="contactForm" method="post">
            <input type="name" name="name" placeholder="Name" id="inputName">
            <input type="email" name="email" placeholder="E-Mail" id="inputEmail">
            <textarea non-re placeholder="Message"></textarea>
            <br>
            <button class="btn ml-auto" type="submit">Send us the message</button>
        </form>
    </div>
    <div class="col-md-8 contactInfo">
        <h3>Fashion Online</h3>
        <br/>
        <p>
            Address: Lindholm Brygge 9
            <br/> zipcode: 9440 norresundby
            <br/> country: denmark
            <br/> phone +45 12 34 56 78
        </p>
    </div>
</section>
<!--- TOP BANNER/TEXT END --->
<!--- FOOTER INCLUDES START --->
<?php require_once 'incl/footer.php'; ?>
<!--- FOOTER INCLUDES END --->
