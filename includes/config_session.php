<?php
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    'lifetime' => 1800,
    'path' => '/',
    'domain' => '127.0.0.1',
    'secure' => false,
    'httponly' => true
]);

session_start();

if(!isset($_SESSION["last_regeneration"])){
   last_session_regeneration();
}else{
    $interval = 60 * 30;
    if(time() - $_SESSION["last_regeneration"] >= $interval){
       last_session_regeneration();
     }
}

function last_session_regeneration(){
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}