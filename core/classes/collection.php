<?php

class collection {
    public $id;
    public $name;
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
    public function getCollections() {
        $sql = "SELECT * FROM collection";
        return $this->db->_fetch_array($sql);
    }
    public function getCollection($id) {
        $params = array($id);
        $sql = "SELECT * FROM collection WHERE id = ?";
        $row = $this->db->_fetch_array($sql, $params);
        $row = call_user_func_array("array_merge", $row);
        $this->id=$row["id"];
        $this->name=$row["name"];
    }
}
