<?php
include($_SERVER['DOCUMENT_ROOT'] . "/incl/init.php");
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$PageName = "News";
require DOCROOT . "/incl/header.php";
switch (strtoupper($mode)) {
    default:
    case "LIST":
        $news = new news();
        $news = $news->listNews(); ?>
        <section id="news" class="row">
            <div class="col-md-8">
                <h1>News</h1>
                <p>Check out all our news.</p>
                <hr/>
                <div class="row">
                    <?php foreach ($news as $newslist) : ?>
                        <figure class="col-12">
                            <img class="col-4 d-inline-block" src='/content/img/news/<?= $newslist['thumbnail'] ?>'
                                 alt='<?= $newslist['title'] ?>'>
                            <figcaption class="col-7 d-inline-block">
                                <h3 class="d-inline-block"><?= $newslist['title'] ?></h3>
                                <span><?= $newslist['date'] ?></span>
                                <p><?= $newslist['description'] ?></p>
                                <a class="more" href="?mode=details&id=<?= $newslist['id'] ?>">Read more ></a>
                            </figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php include "incl/sidearea.php"; ?>
        </section>
        <?php
        break;
    case "DETAILS":
        $news = new news();
        $id = $_GET["id"];
        $news->getNewsPost($id); ?>
        <section class="row">
            <div class="col-md-8">
                <h1><?= $news->title ?></h1>
                <p><?= $news->postdate ?></p>
                <hr/>
                <div class="row">
                    <figure class="col-12">
                        <img class="p-0 col-12 d-inline-block" src='/content/img/news/<?= $news->thumbnail ?>' alt='<?= $news->title ?>'>
                        <br>
                        <br>
                        <h3 class="d-inline-block"><?= $news->title ?></h3>
                        <p><?= $news->description ?></p>
                    </figure>
                </div>
            </div>

            <?php include "incl/sidearea.php"; ?>
        </section>
        <?php
        break;
}

require DOCROOT . "/incl/footer.php";