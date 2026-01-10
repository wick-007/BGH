<?php

declare(strict_types=1);


function check_login_errors(){
    if(isset($_SESSION['login_errors'])){
          $errors = $_SESSION['login_errors'];

          foreach($errors as $error){
            echo $error;
          }
          unset($_SESSION['login_errors']);
    }
}