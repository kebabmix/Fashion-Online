<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "CMS";

switch(strtoupper($mode)) {
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
        $user = new User();

        foreach ($user->arrFormElms as $fieldname => $array_fieldinfo) {
            try {
                $user->$fieldname = filter_input(INPUT_POST, $fieldname, $array_fieldinfo[3]);
            } catch (Exception $e) {
                echo "Fejl: " . $e->getMessage();
            }
        }

        $id = $user->save();

        header("Location: ?mode=details&id=" . $id);

        break;

    case "DELETE":
        $id = (int) $_GET["id"];
        $user = new User();
        $user->delete($id);
        header("Location: ?mode=list");
        break;
}