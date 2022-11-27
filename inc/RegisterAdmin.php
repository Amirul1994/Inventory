<?php
$realpath = realpath(dirname(__FILE__));
include_once $realpath.'\Database.php';
include_once $realpath.'\session.php';

class RegisterAdmin {

    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    public function register_user($data){
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $cpassword = mysqli_real_escape_string($this->db->link, $data['cpassword']);
        // $checkbox = mysqli_real_escape_string($this->db->link, $data['checkbox']);

        
        $emailquery = "SELECT * from admin_users WHERE 'email' = '$email'";
        $queremi = $this->db->select($emailquery);
        $usernamequ = "SELECT * from admin_users WHERE username = '$username'";
        $queruse = $this->db->select($usernamequ);



        $error = "";
        if( ! isset($data['checkbox']) ){
            $error = "You did't checked";
            return $error;
        } elseif( empty($username || $email || $password || $cpassword) ){
            $error = "Required Filed There";
            return $error;
        }elseif ( $queruse == $username ) {
            $error = "Username is already existed";
            return $error;
        }elseif ( $queremi ) {
            $error = "Email is already existed";
            return $error;
        } elseif ( $password <= 6 ) {
            $error = "Password must be 6 character";
            return $error;
        } elseif ( $password != $cpassword ) {
            $error = "Password Does't mass";
            return $error;
        }else{
            $query = "INSERT INTO admin_users(username, email, password) VALUES( '$username', '$email', '$password' ) ";
            $insert_row = $this->db->insert($query);
            if($insert_row ){
                $error = "You successfully inserted";
                return $error;

            }else{
                $error = "There are problem";
                return $error;
            }
        }


    }


    public function loginAdmin($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);

        $select = "SELECT * FROM admin_users WHERE email='$email' AND password='$password'";
        $result = $this->db->select($select);

        if($result != false){
            $value = $result->fetch_assoc();
            session::set("login", true);
            Session::set("email", $value['email']);
            Session::set("id", $value['password']);
            Session::set("name", $value['username']);
            header("Location: index.php");        
        }else{
            return 'there are problem';
        }
    }

}