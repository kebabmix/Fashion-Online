<?php

class categories {

    public $id;
    public $name;
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
    public function getCategories() {
        $sql = "SELECT * FROM category";
        return $this->db->_fetch_array($sql);
    }
    public function getCategory($id) {
        $params = array($id);
        $sql = "SELECT * FROM category WHERE id = ?";
        $row = $this->db->_fetch_array($sql, $params);
        $row = call_user_func_array("array_merge", $row);
        $this->id=$row["id"];
        $this->name=$row["name"];
    }
    public function getLatestCollections() {
        $sql = "SELECT * FROM collection WHERE deleted = 0 ORDER BY created_at DESC LIMIT 6";
        return $this->db->_fetch_array($sql);
    }
    public function getRandomCollections() {
        $sql = "SELECT * FROM collection WHERE deleted = 0 ORDER BY RAND() LIMIT 5";
        return $this->db->_fetch_array($sql);
    }
}
