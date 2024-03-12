<?php 
session_start();
include("../config/dbconn.php");
include("../functions/myfunctions.php");
// ======auth======
if( isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_email_query = "SELECT email FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn,$check_email_query);
    if(mysqli_num_rows($check_email_result) > 0){
        redirect("../register.php","Email Already Exists!");
    }else{
        if($password == $cpassword){
            $query = "INSERT INTO users (name, email, phone, password) VALUES('$name','$email','$phone','$password')";
             $result = mysqli_query($conn, $query);
    
             if($result){
                redirect("../login.php","Register Successfully");
             }else{
                redirect("../register.php","Something went wrong");
             }
        }else{
            redirect("../register.php","Password do not match");
        }
    }
}
else if( isset($_POST["login_btn"])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $login_result = mysqli_query($conn,$login_query);

    if(mysqli_num_rows($login_result) > 0){
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_result);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] =[
            'name' => $username,
            'email' => $useremail,
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){
            redirect("../admin/index.php","Welcome to Dashboard!");
        }else{
            redirect("../index.php","Logged In Successfully!");
        }
    }else{
        redirect("../login.php","Invalid Credentials");
    }  



}


?>