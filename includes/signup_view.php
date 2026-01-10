<?php

declare(strict_types = 1);


function Signup(){
    if(isset($_SESSION['signupData']['username']) && !isset($_SESSION['errors_signup']['used_username'])){
       echo '<input type="text" name="username" id="username" placeholder="Username" value="'.$_SESSION['signupData']['username'].'">';
    }else{
   echo ' <input type="text" name="username" id="username" placeholder="Username"> ' ; 
    }
    echo '<input type="password" name="password" id="password" placeholder="Password">';

    if(isset($_SESSION['signupData']['email']) && !isset($_SESSION['errors_signup']['invalid_email'])&& !isset($_SESSION['errors_signup']['used_email'])){
       echo '<input type="email" name="email" id="email" placeholder="Email" value="'.$_SESSION['signupData']['email'].'">';
    }else{
   echo ' <input type="email" name="email" id="email" placeholder="Email"> ' ; 
    }
}

function check_signup_errors(){
    if(isset( $_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach($errors as $error){
            echo $error.'<br>';
        }
        unset($_SESSION["errors_signup"]);
    }
}

