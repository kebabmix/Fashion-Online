<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "CMS";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $news = new news();

        $newslist = array();

        $columns = [
            "options" => "",
            "title" => "Heading",
            "date" => "Created"
        ];

        foreach ($news->listNews() as $values) {
            $values["options"] =
                htmltool::linkicon("view", "?mode=edit&id=" . $values["id"], "edit", ["id" => 3]) .
                htmltool::linkicon("edit", "?mode=details&id=" . $values["id"], "eye") .
                htmltool::linkicon("delete", "?mode=delete&id=" . $values["id"], "trash");
            $newslist[] = $values;
        }

        echo "<a href=\"?mode=edit\">New post</a>";

        $p = new listPresenter($columns, $newslist);
        echo $p->presentlist();

        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "DETAILS":

        break;

    case "EDIT";
        require_once DOCROOT . "/cms/content/incl/header.php";
        $news = new news();
        if (isset($_GET['id'])) {
            $news->getNewsPost($_GET['id']);
        }
        ?>
        <form class="col-6" action="?mode=save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $news->id ?>">
            <div class="form-group">
                <label for="title">Name</label>
                <input class="form-control" type="text" name="title" value="<?= $news->title ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea class="form-control" name="description" rows="5" cols="40"><?= $news->description ?></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="file" accept="image/*">
            </div>
            <input class="btn" type="submit" name="submit">
        </form>

        <?php
        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "SAVE":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $news = new news();
        $news->title = $_POST['title'];
        $news->description = $_POST['description'];

        if (!empty($_POST['id'])) {
            $news->update();
        } else {
            $news->save(NULL, '/content/img/news/');
        }
        break;

    case "DELETE":

        break;
}