<?php
class news {
    public $id;
    public $title;
    public $thumbnail;
    public $description;
    public $postdate;
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function listNews() {
        $sql = "SELECT * FROM news WHERE deleted = 0";
        return $this->db->_fetch_array($sql);
    }

    public function getNewsPost($id) {
        $params = array($id);
        $sql = "SELECT * FROM news WHERE id = ?";
        $row = $this->db->_fetch_array($sql, $params);
        $row = call_user_func_array("array_merge", $row);
        $this->id=$row["id"];
        $this->thumbnail=$row["thumbnail"];
        $this->title=$row["title"];
        $this->description=$row["description"];
        $this->postdate=$row["date"];
    }

    public function deleteProduct($id){
        $params = array($id);

        $sql = "UPDATE news SET deleted = 1 WHERE id = ?";
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
                        $this->description
                    );

                    $sql = "INSERT INTO news(thumbnail, title, description) VALUES (?,?,?)";

                    $this->db->_query($sql, $params);

                    return $this->db->_getinsertid();

                    header('Location:' . DOCROOT . 'cms/news.php');

                } else {
                    echo "Fejl i uploading af fil: " . $_FILES["file"]["error"];
                }
            } else {
                echo "Du kan ikke uploade denne type filer";
            }
        }
    }
}