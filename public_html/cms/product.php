<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "Product";

switch (strtoupper($mode)) {
    default:
    case "LIST":
    include DOCROOT . "/cms/content/incl/header.php";
    $product = new Product();

    $products = array();

    $columns = [
        "options" => "",
        "thumbnail" => "Billede",
        "title" => "Produktnavn",
        "description" => "Beskrivelse",
        "category_id" => "Kategori",
        "collection_id" => "Kollektion"
    ];
    foreach ($product->getlist() as $values) {
        $values["options"] = htmltool::linkicon("?mode=edit&id=" . $values["id"], "edit", ["id" => 3]) .
            htmltool::linkicon("?mode=details&id=" . $values["id"], "eye") .
            htmltool::linkicon("?mode=delete&id=" . $values["id"], "trash");

        $products[] = $values;
    }

    $p = new listPresenter($columns, $products);
    echo $p->presentlist();


    include DOCROOT . "/cms/content/incl/footer.php";
    break;

    case "DETAILS":

        break;

    case "EDIT";

        break;

    case "SAVE":


        break;

    case "DELETE":

        break;
}