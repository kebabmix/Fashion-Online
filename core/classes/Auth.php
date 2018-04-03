<?php

class Auth {
    public $username;
    public $password;
    public $user_id;
    public $login_html_path;
    public $error_message;
    public $logout;
    public $timeoutsecs;
    private $db;


    const ISLOGGEDIN = 1;
    const ERROR_NOUSERFOUND = 1;
    const ERROR_NOSESSIONFOUND = 2;
    const ERROR_NOACCESS = 3;

    public function __construct() {

        global $db;
        $this->db = $db;


        session_start();

        $this->username = filter_input(INPUT_POST, "login_username", FILTER_SANITIZE_STRING);
        $this->password = filter_input(INPUT_POST, "login_password", FILTER_SANITIZE_STRING);
        $this->logout = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);


        $this->login_html_path = DOCROOT . "/cms/content/incl/login.php";

        $this->error_message = "";
        $this->timeoutsecs = 3600;
    }


    public function authenticate() {
        if($this->logout === "logout") {

            $this->logout();
        }
        if($this->username && $this->password) {

            $this->initUser();
        } else {
            if(!$this->getSession()) {

                echo $this->loginform();
                exit();
            }
        }
    }

    private function initUser() {

        $params = array($this->username);


        $strSelectUser = "SELECT id, password " .
            "FROM user " .
            "WHERE username = ? " .
            "AND suspended = 0 " .
            "AND deleted = 0";

        if($row = $this->db->_fetch_array($strSelectUser, $params)) {

            if(password_verify($this->password, $row[0]["password"])) {

                $params = array(
                    session_id(),
                    $row[0]["id"], //User ID
                    self::ISLOGGEDIN,
                    time(), //CURRENT TIME STAMP
                    time() //CURRENT TIME STAMP
                );

                $strInsertSession = "INSERT INTO usersession (id,user_id,isloggedin, created, lastaction) " .
                    "VALUES(?,?,?,?,?)";
                $this->db->_query($strInsertSession, $params);


                $this->user_id = $row[0]["id"];

            } else {

                echo $this->loginform(self::ERROR_NOUSERFOUND);
            }
        } else {

            echo $this->loginform(self::ERROR_NOUSERFOUND);
        }

    }


    private function getSession() {

        $params = array(session_id());


        $sql = "SELECT user_id, lastaction " .
            "FROM usersession " .
            "WHERE id = ? " .
            "AND isloggedin = 1";
        if($row = $this->db->_fetch_array($sql, $params)) {

            if($row[0]["lastaction"] > (time() - $this->timeoutsecs)) {

                $this->updateSession();
                $this->user_id = $row[0]["user_id"];

                return $this->user_id;
            } else {

                $this->logout();
            }
        }
    }


    private function updateSession() {
        $params = array(session_id());
        $sql = "UPDATE usersession " .
            "SET lastaction = UNIX_TIMESTAMP() " .
            "WHERE id = ?";
        $this->db->_query($sql, $params);
    }


    public function logout() {
        $params = array(session_id());
        $strSessionUpdate = "UPDATE usersession SET isloggedin = 0 WHERE id = ?";
        $this->db->_query($strSessionUpdate,$params);
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id();
    }


    public function loginform($error_code = 0) {

        ob_start();
        include_once $this->login_html_path;
        $strBuffer = ob_get_clean();

        $strErrorMsg = self::getErrorMessage($error_code);
        $strBuffer = str_replace("@ERRORMSG@", $strErrorMsg, $strBuffer);
        return $strBuffer;
    }


    private function getErrorMessage($int) {
        switch($int) {
            default:
                $this->error_message = '';
                break;
            case self::ERROR_NOUSERFOUND:
                $this->error_message = 'Brugernavn eller password er forkert.';
                break;
            case self::ERROR_NOSESSIONFOUND:
                $this->error_message = 'Der er ikke sat en session.';
                break;
        }
        return $this->error_message;
    }
}