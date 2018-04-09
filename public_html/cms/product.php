<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "Product";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        include DOCROOT . "/cms/content/incl/header.php";


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