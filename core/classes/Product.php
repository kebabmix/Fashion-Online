<?php
/**
 * Created by PhpStorm.
 * User: chri798x
 * Date: 09-04-2018
 * Time: 12:53
 */

class Product {
    public $id;
    public $thumbnail;
    public $title;
    public $description;
    public $categoryid;
    public $collectionid;

    public $arrLabels;
    public $arrFormElms;
    public $arrValues;
    private $db;


    public function __construct() {
        global $db;
        $this->db = $db;

        $this->arrLabels = array(
            "id" => "Produkt ID",
            "thumbnail" => "Billede",
            "title" => "Produktnavn",
            "desciption" => "Beskrivelse",
            "category_id" => "Kategori",
            "collection_id" => "Kollektion"
        );

        $this->arrFormElms = [
            "id" => ["hidden", "Produkt ID", FALSE, FILTER_VALIDATE_INT, 0],
            "thumbnail" => ["text", "Billede", TRUE, FILTER_SANITIZE_STRING, ""],
            "title" => ["text", "Produktnavn", TRUE, FILTER_SANITIZE_STRING, ""],
            "desciption" => ["text", "Beskrivelse", TRUE, FILTER_SANITIZE_STRING, ""],
            "category_id" => ["select", "Kategori", FALSE, FILTER_SANITIZE_STRING, ""],
            "collection_id" => ["select", "Kollektion", FALSE, FILTER_SANITIZE_STRING, ""]
        ];

        $this->arrValues = array();
    }

    public function getlist(){
        $sql = "SELECT * FROM product " .
            "WHERE deleted = 0";
        return $this->db->_fetch_array($sql);
    }

}