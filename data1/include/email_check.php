<?php
$q='';
if(isset($_POST['email'])){
include("config.php");
$email = $_POST['email'];

class FUNCTIONS {
    public function check_email($email)
    {
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$^";
            if ( preg_match( $regex, $email )) {
                $this->is_email_exist($email);
            }
            else {
            echo '<span style="color:red;">'.$email . " is an invalid email. Please try again.".'</span>';
            return false;
        }

    }

    /*public function is_email_exist($email)
    {
        global $conn;
        $table = "email";
        $sql = "select id from $table where email = ?";
        $query = $conn->prepare($sql);
        $query->bindParam(1,$email);
        $query->execute();
        if($query->rowCount()>0)
        {
            echo '<span style="color:red;">' .$email . " already exists.</span>";
            return true;
        }
        else{
             echo '<span class="text-primary">Good to go. </span>';
            return false;
        }
    }

    public function complete_signup()
    {
        $email = trim($_POST['email']);
        if(!($this->is_email_exist($email)))
        {
                $fname = ucwords(strtolower(trim($_POST['firstname'])));
                $mname = ucwords(strtolower(trim($_POST['middlename'])));
                $lname = ucwords(strtolower(trim($_POST['lastname'])));
                $sex = $_POST['sex'];
                $password =  sha1($_POST['password']);
                global $conn;
                $table = 'user';
                $sql = "insert into $table (first_name,middle_name,last_name,email,password,joining_time_stamp,sex) values(?,?,?,?,?,?,?)";
                $query = $conn->prepare($sql);
                $query->bindParam(1, $fname);
                $query->bindParam(2, $mname);
                $query->bindParam(3, $lname);
                $query->bindParam(4, $email);
                $query->bindParam(5, $password);
                $time = time();
                $query->bindParam(6, $time);
                $query->bindParam(7, $sex);

                if($query->execute())
                    {       $user_id_may_be=$conn->lastInsertId();
                            echo '<p class="text-primary">Hello '.$fname.' You have been successfully signed up. Please Log In now.</p>';
                            $path = "../uploads/$user_id_may_be";
                            mkdir($path);
                    }
                    else
                    {
                        echo "Sorry there is some problem.";
                    }
        }
        else
        {
            echo '<h1 style="color:red;">Try again. <a href="http://localhost/bicunet" class="btn btn-danger">Reload</a></h1>';
        }
    }*/
}
?>