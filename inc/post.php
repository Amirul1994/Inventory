<?php
$path = realpath(dirname(__FILE__));

include_once $path.'/Database.php';

class Post {

    
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function insertPost($post, $file)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `posts`(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            descript VARCHAR(255) NOT NULL,
            catId VARCHAR(255),
            img VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            $insert = $this->db->insert($sql);
            if ($insert === TRUE) {
                $title = mysqli_real_escape_string ($this->db->link, $post['title'] );
                $descript = mysqli_real_escape_string ($this->db->link, $post['descript'] );
                $catId = $post['catId'];
                $cat = array_map( function($e){
                    return mysqli_real_escape_string($this->db->link, $e );
                }, $catId );
                
                $catI = serialize($cat);
                // $image = mysqli_real_escape_string ($this->db->link, $post['image'] );

                if($title == "" || $descript == "" || $catI == ""){
                    echo 'here are empty filed';
                }else{

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $file['image']['name'];
                    $file_size = $file['image']['size'];
                    $file_temp = $file['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image;

                    if (empty($file_name)) {
                        echo "<span class='error'>Please Select any Image !</span>";
                    }elseif ($file_size > 1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                        echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                    } else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "INSERT INTO posts( title, descript, catId, img ) VALUES('$title', '$descript', '$catI', '$uploaded_image')";
                        $insert = $this->db->insert($query);
                        if($insert){
                            echo 'post uploaded successfully';
                        }
                    }
                }
            } else {
                echo "Error creating table: ";
            }
    }

    public function showPost()
    {

        $query = "SELECT * FROM posts";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }

    }

    public function simpleCat($arr)
    {
        $catid = unserialize($arr);
        for ($i=0; $i < count($catid); $i++) { 
            $query = "SELECT * FROM categories WHERE id = '$catid[$i]'";
            $result = $this->db->select($query);
            if($result){
                while ($val = $result->fetch_assoc()) {
                    echo '<a href="index.html">'. $val['catName'] .'</a> ';
                }
            }
        }
    }

    public function showSinglePost($id)
    {
        $query = "SELECT * FROM posts WHERE id = '$id'";
        $result = $this->db->select($query);
        if($result){
            return $result;
        }
    }

    public function ajaxShow($id)
    {
        $query = "SELECT * FROM posts WHERE catId = '$id'";

        $result = $this->db->select($query);
        if($result){
            while ($value = $result->fetch_assoc()) {
                ?>
                     <div class="card mb-4">
                  <img class="card-img-top" style="height:200px" src="admin/<?php echo $value['img']?>" alt="Card image cap">
                  <div class="card-body">
                    <h2 class="card-title"><?php echo $value['title']?></h2>
                    <p class="card-text"><?php echo $value['descript']?></p>
                    <a href="single.php?id=<?php echo $value['id']?>" class="btn btn-primary">Read More →</a>
                  </div>
                  <div class="card-footer text-muted">
                   by Osman
                    <a href=""></a>
                  </div>
                </div>
              
                <?php
              }
        }
    }

    
}