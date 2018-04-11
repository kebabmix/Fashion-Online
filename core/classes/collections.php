<?php

class collections {

    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
    public function getCollections() {
        $sql = "SELECT * FROM collection";
        return $this->db->_fetch_array($sql);
    }
    public function getLatestCollections() {
        $sql = "SELECT * FROM collection WHERE deleted = 0 ORDER BY id DESC LIMIT 6";
        return $this->db->_fetch_array($sql);
    }
    public function getRandomCollections() {
        $sql = "SELECT * FROM collection WHERE deleted = 0 ORDER BY RAND() LIMIT 5";
        return $this->db->_fetch_array($sql);
    }

	public function sidebarCollection() {
		$sql = "SELECT * FROM collection ORDER BY id DESC LIMIT 3";
		return $this->db->_fetch_array($sql);
	}
}
