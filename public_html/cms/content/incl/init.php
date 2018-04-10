<?php
/* Global Tools */
define("DOCROOT", filter_input(INPUT_SERVER, "DOCUMENT_ROOT", FILTER_SANITIZE_STRING));
define("COREPATH", substr(DOCROOT, 0, strrpos(DOCROOT,"/")) . "/core/");
require_once COREPATH . 'classes/autoload.php';

/* Classloader - loads class on call from /core/classes/ */
$db = new dbconf();


$auth = new auth();
$auth->authenticate();

if(!$auth->user_id) {
    echo $auth->loginform(auth::ERROR_NOACCESS);
    exit();
}