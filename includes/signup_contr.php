<?php

declare(strict_types = 1);


function is_input_empty(string $username,string $pwd, string $email){
   if(empty($username) || empty($pwd) || empty($email)){
    return true;
   }else {
     return false;
   }
}

function is_email_invalid( string $email){
   if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !empty($email)) {
    return true;
   }else {
     return false;
   }
}
function is_username_exits( object $pdo, string $username):bool{  
   if( get_username($pdo,$username)) {
    return true;
   }else {
     return false;
   }
}
function is_email_exits( object $pdo, string $email):bool{  
   if( get_email( $pdo,  $email) && !empty(get_email( $pdo,  $email)) ) {
    return true;
   }else {
     return false;
   }
}

function create_user( object $pdo,string $username,string $pwd,string $email){  
   insert_user( $pdo, $username, $pwd, $email);
}

