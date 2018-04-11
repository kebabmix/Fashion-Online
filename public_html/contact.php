<!--- HEADER INCLUDES START --->
<?php
include 'incl/init.php';
$PageName = "Forside";
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
            <textarea placeholder="Message"></textarea>
            <button class="btn ml-auto d-block" type="submit">Send us the message</button>
        </form>
    </div>
    <div class="col-md-8 contactInfo">
        <h3>Fashion Online</h3>
        <table>
            <tr>
                <td>Address:&nbsp;</td>
                <td>Lindholm&nbsp; Brygge&nbsp; 9</td>
            </tr>
            <tr>
                <td>Zipcode:&nbsp;</td>
                <td>9440&nbsp; Norresundby</td>
            </tr>
            <tr>
                <td>Country:&nbsp;</td>
                <td>Denmark</td>
            </tr>
            <tr>
                <td>Phone:&nbsp;</td>
                <td>+45&nbsp; 12&nbsp; 34&nbsp; 56&nbsp; 78</td>
            </tr>
        </table>
        <br>
        <div id="map"></div>
    </div>
</section>
<!--- TOP BANNER/TEXT END --->
<!--- FOOTER INCLUDES START --->
<script>
    function initMap() {
        var uluru = {lat: 57.066603, lng: 9.899112};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1_gZQLY6pqZpKMTVrWdzB9wYBgNoKs-c&callback=initMap"></script>
<?php require_once 'incl/footer.php'; ?>
<!--- FOOTER INCLUDES END --->