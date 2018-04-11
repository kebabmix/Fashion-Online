<?php
require "incl/init.php";
$PageName = "Details";
require DOCROOT . "/incl/header.php";
$product = new product();
$id = (int)$_GET['id'];
$product->getProduct($id);
?>
    <div class="ctcBanner">
        <h1 style="margin:0;margin-bottom:-10px;padding:2rem;"><?= $product->title ?></h1>
        <div class="linebox">
            <span>Here you find all the details</span>
            <div class="triangle"></div>
        </div>
    </div>

    <div id='details' class="row">
        <div class="col-md-5">
            <img class="col-12" src="content/img/products/<?= $product->thumbnail ?>"/>
        </div>
        <div class="col-md-7">
            <h2><?= $product->title ?></h2><br>
            <p><?= $product->description ?></p>
        </div>
    </div>
<?php
require DOCROOT . "/incl/footer.php";