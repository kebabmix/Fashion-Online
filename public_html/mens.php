<!--- HEADER INCLUDES START --->
<?php
require $_SERVER["DOCUMENT_ROOT"] . "/incl/init.php";
$PageName = "Men";
require_once 'incl/header.php'; ?>
<!--- HEADER INCLUDES END --->

<section class="row">
    <?php
    $categories = new categories();
    $category = $categories->getCategories();
    ?>
    <div id="lastest-arrivals" class="col-md-8">
        <h1>Men &nbsp; lastest</h1>
        <small>Check our lastest men stuff in this section</small>
        <hr>
        <div class="row">
            <?php foreach ($category as $categories) : ?>
                <a class="categoryList" href="category.php?id=<?= $categories['id'] ?>"><?= $categories['name'] ?></a>
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
