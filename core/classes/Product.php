<?php

class product {

    public $id;
    public $title;
    public $description;
    public $category;
    public $thumbnail;
    public $collection;
    public $gender;
    public $arrLabels;
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;

        $this->arrLabels = array(
            "id" => "ID",
            "title" => "Product",
            "description" => "Description"
        );

    }
    public function getProduct($id) {
        $params = array($id);
        $sql = "SELECT * FROM product WHERE product.id = ? AND deleted = 0";
        $row = $this->db->_fetch_array($sql, $params);
        $row = call_user_func_array("array_merge", $row);
        $this->id=$row["id"];
        $this->thumbnail=$row["thumbnail"];
        $this->title=$row["title"];
        $this->description=$row["description"];
    }


    public function getAllProducts() {
        $sql = "SELECT * FROM product WHERE deleted = 0";
        return $this->db->_fetch_array($sql);
    }
    public function getLatestProducts() {
        $sql = "SELECT * FROM product WHERE deleted = 0 ORDER BY created DESC LIMIT 6";
        return $this->db->_fetch_array($sql);
    }
    public function getRandomProducts() {
        $sql = "SELECT * FROM product WHERE deleted = 0 ORDER BY RAND() LIMIT 15";
        return $this->db->_fetch_array($sql);
    }
    public function getProductsByCategory($collection, $category) {
        $params = array(
            '%'.$collection.'%',
            $category
        );
        $sql = "SELECT * FROM product WHERE collection_id LIKE ? AND category_id = ?";
        return $this->db->_fetch_array($sql, $params);
    }
    public function getCollectionProducts($collection, $category) {
        $params = array(
            $collection,
            $category
        );
        $sql = "SELECT * FROM product WHERE collection_id = ? AND category_id = ?";
        return $this->db->_fetch_array($sql, $params);
    }
    public function deleteProduct($id){
        $params = array($id);

        $sql = "UPDATE product SET deleted = 1 WHERE id = ?";
        $this->db->_query($sql, $params);
    }
    public function save($id, $fileDestination){
        if (!empty($_FILES['file'])) {
            $file = $_FILES['file'];

            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $fileDestinationWithName = $fileDestination . $fileNameNew;

            $allowed = array('jpg', 'png', 'gif', 'jpeg');

            if (in_array($fileActualExt, $allowed)) {
                //Checks for errors
                if ($fileError === 0) {

                    //Move raw file
                    move_uploaded_file($fileTmpName, DOCROOT . $fileDestinationWithName);

                    $params = array(
                        $fileNameNew,
                        $this->title,
                        $this->description,
                        $this->category,
                        $this->collection,
                        $this->gender
                    );

                    $sql = "INSERT INTO product(thumbnail, title, description, category_id, collection_id, gender) VALUES (?,?,?,?,?,?)";

                    $this->db->_query($sql, $params);

                    /* Return new id */
                    return $this->db->_getinsertid();

                    header('Location:' . DOCROOT . 'cms/products.php');

                } else {
                    echo "Fejl i uploading af fil: " . $_FILES["file"]["error"];
                }
            } else {
                echo "Du kan ikke uploade denne type filer";
            }
        }
    }
}
