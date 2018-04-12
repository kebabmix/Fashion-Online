<?php
require_once filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/cms/content/incl/init.php";
$mode = isset($_REQUEST["mode"]) && !empty($_REQUEST["mode"]) ? $_REQUEST["mode"] : "";
$strModuleName = "CMS";

switch (strtoupper($mode)) {
    default:
    case "LIST":
        require_once DOCROOT . "/cms/content/incl/header.php";
        $user = new user();

        $users = array();

        $columns = [
            "options" => "",
            "username" => "Username",
            "created" => "Created"
        ];

        foreach ($user->getlist() as $values) {
            $values["options"] = htmltool::linkicon("view", "?mode=edit&id=" . $values["id"], "edit", ["id" => 3]) .
                htmltool::linkicon("edit", "?mode=details&id=" . $values["id"], "eye") .
                htmltool::linkicon("delete", "?mode=delete&id=" . $values["id"], "trash");

            $users[] = $values;
        }

        $p = new listPresenter($columns, $users);
        echo $p->presentlist();

        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "DETAILS":
        $id = (int)$_GET["id"];

        require_once DOCROOT . "/cms/content/incl/header.php";

        $arrButtonPanel = [
            htmltool::linkbutton("Oversigt", "?mode=list")
        ];

        echo textPresenter::presentpanel($strModuleName, "Vis detaljer", $arrButtonPanel);

        $user = new user();
        $user->getuser($id);
        $user->created = htmltool::datetime2local($user->created);

        $users = get_object_vars($user);
        unset($users["password"]);

        $p = new listPresenter($user->arrLabels, $users);
        echo $p->presentdetails();

        require_once DOCROOT . "/cms/content/incl/footer.php";
        break;

    case "EDIT";
        $id = (int)$_GET["id"];
        $user = new user();
        require_once DOCROOT . "/cms/content/incl/header.php";

        if ($id > 0) {
            $user->getuser($id);
            $strModeName = "Rediger bruger";
        } else {
            $strModeName = "Opret bruger";
        }
        $arrValues = get_object_vars($user);

        $arrButtonPanel = [
            htmltool::linkbutton("Oversigt", "?mode=list")
        ];
        echo textPresenter::presentpanel($strModuleName, $strModeName, $arrButtonPanel);

        $p = new formpresenter($user->arrFormElms, $arrValues);
        echo $p->presentForm();

        require_once DOCROOT . "/cms/content/incl/footer.php";

        break;

    case "SAVE":
        $user = new user();

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
        $user = new user();
        $user->delete($id);
        header("Location: ?mode=list");
        break;
}