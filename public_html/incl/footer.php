    <footer class="fColor">
      <section class="fStyle">
        <a href="index.php">Home</a> |
        <a href="mens.php">Mens</a> |
        <a href="women.php">Women</a> |
        <a href="collections.php">Collections</a> |
        <a href="contact.php">Contact</a>
        <br />
        <p>Copyright © 2014. All Rights Reserved by <span><a href="index.php">Fashion Online.</a></span></p>
        <img src="content/img/logo/Fashion_online_-_200x60INVERTED.png" alt="Logo" class="fLogo" />
      </section>
    </footer>


    <!-- SCRIPTS START -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="content/owlcarousel/owl.carousel.min.js"></script>
    <!-- SCRIPTS END -->
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:false,
            margin: 15,
            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    nav:true
                }
            }
        })
    </script>
  </body>
</html>
