<?php
//  session_start();
//  $_SESSION['username']='hello';
//  var_dump($_SESSION);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

        require_once "dbh.inc.php";
        require_once "signup_model.php";
        require_once "signup_view.php";
        require_once "signup_contr.php";
        require_once "config_session.php";

        //ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username,$pwd,$email)) {
            $errors["empty_input"] = "Fill in the empty fields!";
        }if (is_email_invalid($email)){
             $errors["invalid_email"] = "Email is invalid";
        }if(is_username_exits($pdo,$username)){
             $errors["used_username"] = "Username already exits";
        }if(is_email_exits($pdo,$email)){
             $errors["used_email"] = "Email has already been registered";
        }

        if($errors){
          $_SESSION["errors_signup"] = $errors;

          $signupData = [
             'username'=>$username,
             'email'=>$email
           ];

           $_SESSION["signupData"] = $signupData;
           
           header("Location: ../index.php");
           die();
        }

        create_user( $pdo,$username,$pwd, $email);
  
} else {
    //send them back to the homepage using the header function
    header("Location: ../index.php");
}
