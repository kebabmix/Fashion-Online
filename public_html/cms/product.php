<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "product";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        include DOCROOT . "/cms/content/incl/header.php";
        $sql = "SELECT product.id, product.title, product.category_id, category.name FROM product INNER JOIN category ON product.category_id = category.id ORDER BY id DESC";
        $products = $db->_fetch_array($sql);
        ?>
        <div class="container">
            <a href="?mode=edit">Opret produkt</a>
            <table class="table table-hover table-striped">
                <thead>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th></th>
                <th></th>
                </thead>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['title']?></td>
                        <td><?=$product['name']?></td>
                        <td><a href="?mode=edit&id=<?=$product['id']?>">Edit</a></td>
                        <td><a href="?mode=delete&id=<?=$product['id']?>"><span class="product-delete" id="<?=$product['title']?>">Slet</span></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $(".product-delete").click(function() {
                    return confirm("Vil du slette " + this.id + "?");
                });
            });
        </script>
        <?php
        break;

    //EDIT OR CREATE PRODUCT
    case "EDIT":
        include DOCROOT . "/cms/content/incl/header.php";
        ?>
        <!-- Form (start) -->
        <?php
        $product = new product();
        $collections = new collections();
        $categories = new categories();
        $collections = $collections->getCollections();
        $categories = $categories->getCategories();
        if (isset($_GET['id'])) {
            $product->getProduct($_GET['id']);
        }
        ?>
        <form action="?mode=save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$product->id?>">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="title" value="<?=$product->title?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label><br>
                <textarea name="description" rows="5" cols="40"><?=$product->description?></textarea>
            </div>
            <div class="form-group">
                <label for="collection">Collection</label>
                <select name="collection">
                    <?php foreach ($collections as $collection) : ?>
                        <option value="<?=$collection['id']?>"><?=$collection['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">gender</label>
                <select name="gender">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="file" accept="image/*">
            </div>
            <input type="submit" name="submit">
        </form>
        <!-- Form (end) -->

        <?php
        break;

    //  DELETE PRODUCT
    case "DELETE":
        include DOCROOT . "/cms/content/incl/header.php";

        if (isset($_GET['id'])) {
            $product->delete($_GET['id']);
            header("Location: ?mode=list");
        }
        break;

    //  SAVE/UPDATE PRODUCT
    case "SAVE":
        $product = new product();
        include DOCROOT . "/cms/content/incl/header.php";
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
}