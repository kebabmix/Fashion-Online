<?php

class user {

    public $id;
    public $username;
    public $password;
    public $suspended;
    public $deleted;

    public $arrLabels;
    public $arrFormElms;
    public $arrValues;
    public $arrGroups;
    private $db;


    public function __construct(){
        global $db;
        $this->db = $db;


        $this->arrLabels = array(
            "id" => "Bruger ID",
            "username" => "Brugernavn",
            "password" => "Adgangskode",
            "suspended" => "Suspenderet"
        );

        $this->arrFormElms = [
            "id" => ["hidden", "Bruger ID", FALSE, FILTER_VALIDATE_INT, 0],
            "username" => ["text", "Brugernavn", TRUE, FILTER_SANITIZE_STRING, ""],
            "password" => ["password", "Adgangskode", TRUE, FILTER_SANITIZE_STRING, ""],
            "suspended" => ["checkbox", "Suspenderet", FALSE, FILTER_SANITIZE_STRING, ""]
        ];

        $this->arrValues = array();
    }


    public function getlist()
    {
        $sql = "SELECT * FROM user " .
            "WHERE deleted = 0";
        return $this->db->_fetch_array($sql);
    }

    public function getuser($id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM user WHERE id = ? AND deleted = 0";
        if ($row = $this->db->_fetch_array($sql, array($this->id))) {
            foreach ($row[0] as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function save() {

        $params = [];
        $fields = [];
        $markers = [];

        if($this->id) {
            foreach($this->arrFormElms as $name => $array) {
                $params[] = $this->$name;
                $fields[] = $name;
            }
            array_push($params, $params[0]);
            array_shift($params);
            array_shift($fields);

            $sql = "UPDATE user SET " . implode(" = ?, ", $fields) . " = ? " .
                "WHERE id = ?";

            $this->db->_query($sql, $params);

            return $this->id;

        } else {

            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
            $this->suspended = ($this->suspended) ? $this->suspended : 0;

            foreach($this->arrFormElms as $name => $array) {
                $params[] = $this->$name;
                $fields[] = $name;
                $markers[] = "?";
            }

            echo $sql = "INSERT INTO user(".implode(",", $fields).") " .
                "VALUES(".implode(",",$markers).")";
            var_dump($params);
            $this->db->_query($sql, $params);

            return $this->db->_getinsertid();
        }
    }


    public function delete($id) {
        $params = array($id);
        $strUpdate = "UPDATE user SET deleted = 1 WHERE id = ?";
        $this->db->_query($strUpdate, $params);
    }

}