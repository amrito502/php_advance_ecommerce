<?php 
session_start();
include("../config/dbconn.php");
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
        $_SESSION['message'] = "Email Already Exists!"; 
        header("location: ../register.php");
    }else{
        if($password == $cpassword){
            $query = "INSERT INTO users (name, email, phone, password) VALUES('$name','$email','$phone','$password')";
             $result = mysqli_query($conn, $query);
    
             if($result){
                $_SESSION['message'] = "Register Successfully";
                header("location: ../login.php");
             }else{
                $_SESSION['message'] = "Something went wrong";
                header("location: ../register.php");
             }
        }else{
            $_SESSION['message'] = "Password do not match"; 
            header("location: ../register.php");
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

        $_SESSION['auth_user'] =[
            'name' => $username,
            'email' => $useremail,
        ];

        $_SESSION['message'] = "Logged In Successfully!";
        header("location: ../index.php");
    }else{
        $_SESSION["message"] = "Invalid Credentials";
        header("location: ../login.php");
    }  



}


?>