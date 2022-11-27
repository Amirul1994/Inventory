<?php
$path = realpath(dirname(__FILE__));

include_once $path.'/Database.php';

class Category {

    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insertCategory($post)
    {



        $sql = "CREATE TABLE IF NOT EXISTS `categories`(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            catName VARCHAR(30) NOT NULL,
            catDesc VARCHAR(100) NOT NULL,
            publication TINYINT(7),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            $insert = $this->db->insert($sql);
            if ($insert === TRUE) {
                $catName = mysqli_real_escape_string ($this->db->link, $post['catName'] );
               $description = mysqli_real_escape_string ($this->db->link, $post['description'] );
                $publication = mysqli_real_escape_string ($this->db->link, $post['publication'] );
				$description = array(
					array('name' => 'osman', 'email' => 'goni@gmai.com'),
				array('name' => 'anik', 'email' => 'aniik@gmai.com')
				);
                if($catName == "" || $publication == ""){
                    echo 'hello are empty';
                }else{
                    $query = "INSERT INTO categories( catName, catDesc, publication ) VALUES('$catName', '$description', '$publication')";
                    $insert = $this->db->insert($query);
                }
            } else {
                echo "Error creating table: ";
            }

      

    }


    public function showCategory()
    {
        $query = "SELECT * FROM categories WHERE publication = 1";
       $result = $this->db->select($query);
       if($result->num_rows > 0){
           return $result;
       }
    }

    public function showSpeCategory()
    {
        
       $query = "SELECT id FROM categories";
       $result = $this->db->select($query);
       if($result->num_rows > 0){
           return $result;
       }
    }

}
