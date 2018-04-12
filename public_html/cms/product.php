<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "product";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $product = new product();

        $products = array();

        $columns = [
            "options" => "",
            "title" => "Product",
            "created" => "Created"
        ];
        foreach ($product->getAllProducts() as $values) {
            $values["options"] =
                htmltool::linkicon("edit", "?mode=edit&id=" . $values["id"], "edit", ["id" => 3]) .
                htmltool::linkicon("view", "?mode=details&id=" . $values["id"], "eye") .
                htmltool::linkicon("delete", "?mode=delete&id=" . $values["id"], "trash");
            $products[] = $values;
        }
        echo "<a href=\"?mode=edit\">Create product</a>";
        $p = new listPresenter($columns, $products);
        echo $p->presentlist();
        ?>
        <?php
        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "DETAILS":
        $id = (int)$_GET["id"];
        require_once DOCROOT . "/cms/content/incl/header.php";

        $arrButtonPanel = [
            htmltool::linkbutton("Oversigt", "?mode=list")
        ];

        echo textPresenter::presentpanel($strModuleName, "Vis detaljer", $arrButtonPanel);

        $product = new product();
        $product->getProduct($id);

        $products = get_object_vars($product);

        $p = new listPresenter($product->arrLabels, $products);
        echo $p->presentdetails();

        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;
    case "EDIT":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $product = new product();
        $collections = new collection();
        $categories = new categories();
        $collections = $collections->getCollections();
        $categories = $categories->getCategories();
        if (isset($_GET['id'])) {
            $product->getProduct($_GET['id']);
        }
        ?>
        <form class="col-6" action="?mode=save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product->id ?>">
            <div class="form-group">
                <label for="title">Name</label>
                <input class="form-control" type="text" name="title" value="<?= $product->title ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea class="form-control" name="description" rows="5" cols="40"><?= $product->description ?></textarea>
            </div>
            <div class="form-group">
                <label for="collection">Collection</label>
                <select class="form-control" name="collection">
                    <?php foreach ($collections as $collection) : ?>
                        <option value="<?= $collection['id'] ?>"><?= $collection['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="file" accept="image/*">
            </div>
            <input class="btn" type="submit" name="submit">
        </form>

        <?php
        break;

    case "SAVE":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $product = new product();
        $product->title = $_POST['title'];
        $product->description = $_POST['description'];
        $product->collection = $_POST['collection'];
        $product->category = $_POST['category'];
        $product->gender = $_POST['gender'];

        if (!empty($_POST['id'])) {
            $product->update();
        } else {
            $product->save(NULL, '/content/img/products/');
        }
        break;
    case "DELETE":
        $id = (int)$_GET["id"];
        $product = new product();
        $product->deleteProduct($id);
        header("Location: ?mode=list");
        break;
}