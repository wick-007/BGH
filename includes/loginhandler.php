<?php
declare(strict_types =1);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'];
    $pwd = $_POST['password'];

    require_once 'dbh.inc.php';
    require_once 'login_model.php';
    // require_once 'login_view.php';
    require_once 'login_contr.php';
    require_once 'config_session.php';
       
    //Error handlers
      $errors = [];
    
          if(empty_inputs($username, $pwd)){
            $errors["empty_input"] = "Fill all inputs";             
          } 
          
            $results = get_user($pdo,$username);
          if (user_not_found($results)){
            $errors['user_not_found'] = 'User not found';
          } if( (!user_not_found($results))  && is_password_wrong($pwd,$results['pwd'])){
            $errors['wrong_password']='Wrong password';
          }
          
          if($errors){
            $_SESSION['login_errors'] = $errors;
            header('Location: ../index.php');
            die();
          }
  

}else{
    header('Location: ../index.php');
    die();
}