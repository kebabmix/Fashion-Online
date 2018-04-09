<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "CMS";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        include DOCROOT . "/cms/content/incl/header.php";
        $user = new User();

        $users = array();

    $columns = [
        "options" => "",
        "username" => "Brugernavn",
        "created" => "Oprettet"
    ];
        foreach ($user->getlist() as $values) {
            $values["options"] = htmltool::linkicon("?mode=edit&id=" . $values["id"], "edit", ["id" => 3]) .
                htmltool::linkicon("?mode=details&id=" . $values["id"], "eye") .
                htmltool::linkicon("?mode=delete&id=" . $values["id"], "trash");

            $values["created"] = htmltool::datetime2local($values["created"]);
            $users[] = $values;
        }

        $p = new listPresenter($columns, $users);
        echo $p->presentlist();


        include DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "DETAILS":
        $id = (int)$_GET["id"];

        include DOCROOT . "/cms/content/incl/header.php";

        $arrButtonPanel = [
            htmltool::linkbutton("Oversigt", "?mode=list")
        ];
        echo textPresenter::presentpanel($strModuleName, "Vis detaljer", $arrButtonPanel);

        $user = new User();
        $user->getuser($id);
        $user->created = htmltool::datetime2local($user->created);

        $users = get_object_vars($user);
        unset($users["password"]);

        $p = new listPresenter($user->arrLabels, $users);
        echo $p->presentdetails();

        include DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "EDIT";
        $id = (int)$_GET["id"];

        $user = new User();
        if($id > 0) {
            $user->getuser($id);
            $strModeName = "Rediger bruger";
        } else {
            $strModeName = "Opret bruger";
        }
        $arrValues = get_object_vars($user);

        include DOCROOT . "/cms/content/incl/header.php";

        $arrButtonPanel = [
            htmltool::linkbutton("Oversigt", "?mode=list")
        ];
        echo textPresenter::presentpanel($strModuleName, $strModeName, $arrButtonPanel);


        $p = new formpresenter($user->arrFormElms, $arrValues);
        echo $p->presentForm();

        include DOCROOT . "/cms/content/incl/footer.php";

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
        $id = (int)$_GET["id"];
        $user = new User();
        $user->delete($id);
        header("Location: ?mode=list");
        break;
}