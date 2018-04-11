<!--- HEADER INCLUDES START --->
<?php
require "incl/init.php";
$PageName = "Home";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->

<section class="row">
    <div class="topnews">
        <img src="content/img/banner1.png" class="col-md-8 imgPadFix"/>
        <img src="content/img/banner2.png" class="col-md-4"/>
    </div>
    <?php
    $product = new product();
    $latestProducts = $product->getLatestProducts();
    ?>
    <div id="lastest-arrivals" class="col-md-8">
        <h1>lastest arrivals</h1>
        <small>Check our all lastest products in this section</small>
        <hr>
        <div class="row">
            <?php foreach ($latestProducts as $product) : ?>
                <figure class="col-md-4">
                    <div class="img-wrap">
                        <img class="col-12" src='/content/img/products/<?=$product['thumbnail']?>' alt='<?=$product['title']?>'>
                    </div>
                    <figcaption>
                        <?=$product['title']?><br>
                        <a class="more" href="details.php?id=<?=$product['id']?>">More ></a>
                    </figcaption>
                </figure>
            <?php endforeach ; ?>
        </div>
    </div>
    <aside class="col-md-4 sidearea">
        <img src="content/img/campaign.jpg" alt="" class="col-12">
        <img src="content/img/campaign-2.jpg" alt="" class="col-12">
        <form class="newsletter" method="post">
            <h4>Sign up to our newsletter</h4>
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

<!--- FOOTER INCLUDES START --->
<?php require_once 'incl/footer.php'; ?>
<!--- FOOTER INCLUDES END --->
