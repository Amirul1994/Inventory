<?php
$path = realpath(dirname(__FILE__));

include_once $path.'/Database.php';

class Comment {

    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function commentInsert($post)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `comments`(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            postId INT(11) NOT NULL,
            userId INT(11) NOT NULL,
            email VARCHAR(100) NOT NULL,
            descript VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            $insert = $this->db->insert($sql);
            if ($insert === TRUE) {
                $name = mysqli_real_escape_string ($this->db->link, $post['name'] );
                $postId = mysqli_real_escape_string ($this->db->link, $post['postId'] );
                $userId = mysqli_real_escape_string ($this->db->link, $post['userId'] );
                $email = mysqli_real_escape_string ($this->db->link, $post['email'] );
                $descript = mysqli_real_escape_string ($this->db->link, $post['descript'] );
                $query = "INSERT INTO comments( name,postId,userId, email, descript ) VALUES('$name','$postId', '$userId', '$email', '$descript')";
                            $insert = $this->db->insert($query);
                            if($insert){
                                echo 'Comment Posted successfully';
                            }
            }
    }

    public function showComments($id)
    {
        $query = "SELECT * FROM comments WHERE postId = '$id'";

        $result = $this->db->select($query);
        if($result){
            return $result;
        }
    }

}