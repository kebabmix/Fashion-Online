<?php
include($_SERVER['DOCUMENT_ROOT'] . "/incl/init.php");
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$PageName = "Collections";
require DOCROOT . "/incl/header.php";
switch (strtoupper($mode)) {
    default:
    case "LIST":
        $collection = new collection();
        $collection = $collection->getCollections();
        $categories = new categories();
        $categories = $categories->getCategories(); ?>
        <section id="collections" class="row">
            <div class="col-md-8">
                <h1>collections</h1>
                <p>
                    Check our all collections in this section.
                </p>
                <hr/>
                <div class="row">
                    <?php foreach ($collection as $collection) : ?>
                        <figure class="col-md-4">
                            <div class="img-wrap">
                                <img style="height: 150px;" class="col-12" src='/content/img/collections/<?= $collection['thumbnail'] ?>'
                                     alt='<?= $collection['name'] ?>'>
                            </div>
                            <figcaption>
                                <?= $collection['name'] ?> <br>
                                <a class="more" href="?mode=categories&collection=<?= $collection['id'] ?>">More ></a>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php include "incl/sidearea.php"; ?>
        </section>
        <?php break;

    case "CATEGORIES":
        $collection = new collection();
        $id = $_GET['collection'];
        $collection->getCollection($id);
        $categories = new categories();
        $categories = $categories->getCategories();
        $collectionID = isset($_GET['collection']) ? $_GET['collection'] : "";
        ?>
        <section id="collections" class="row">
            <div class="col-md-8">
                <h1><?= $collection->name; ?></h1>
                <p>
                    Check our all <?= $collection->name; ?> in this section.
                </p>
                <hr/>
                <div class="row">
                    <?php foreach ($categories as $category) : ?>
                        <figure class="col-md-4">
                            <div class="img-wrap">
                                <img class="col-12" src='/content/img/products/<?= $category['thumbnail'] ?>' alt='<?= $category['name'] ?>'>
                            </div>
                            <?= $category['name'] ?><br>
                            <a class="more" href="?mode=products&collection=<?= $collectionID ?>&category=<?= $category['id'] ?>">More ></a>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php include "incl/sidearea.php"; ?>
        </section>
        <?php break;

    case "PRODUCTS":
        $collectionID = isset($_GET['collection']) ? $_GET['collection'] : "";
        $categoryID = isset($_GET['category']) ? $_GET['category'] : "";
        $products = new product();
        $products = $products->getProductsByCategory($collectionID, $categoryID);
        $category = new categories();
        $id = $_GET['category'];
        $category->getCategory($id);

        ?>

            <section id="collections" class="row">
                <div class="col-md-8">
                    <h1><?= $category->name; ?></h1>
                    <p>
                        Check our all <?= $category->name; ?> in this section.
                    </p>
                    <hr/>
                    <div class="row">
                <?php if (!empty($products)) : ?>
                    <?php foreach ($products as $product) : ?>
                        <figure class="col-md-4">
                            <img class="col-12" src='content/img/products/<?= $product['thumbnail'] ?>'
                                 alt='<?= $product['title'] ?>'>
                            <figcaption>
                                <?= $product['title'] ?> <br>
                                <a class="more" href="?mode=details&collection=<?= $collectionID ?>&category=<?= $categoryID ?>&steffen=useless&product=<?= $product['id'] ?>">More ></a>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                    <?php else : ?>
                        <p style="padding: 1rem;">Der er ingen produkter i denne kategori</p>
                    <?php endif; ?>
                    </div>
                </div>
                <?php include "incl/sidearea.php"; ?>
            </section>
        </main>
        <?php break;

    case "DETAILS":
        $product = new product();
        $id = $_GET['product'];
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
}

require DOCROOT . "/incl/footer.php";
?>

