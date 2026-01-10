<?php

declare(strict_types = 1);

function empty_inputs(string $username, string $pwd) :bool{
 if(empty($username) || empty($pwd)){
    return true;
 }else{
    return false;
 }

}

function user_not_found(bool | array $results){
      if(!$results){
         return true;
      }else{
        return false;
      };
}

function is_password_wrong( string $pwd, string $hashedpwd){
   if(!password_verify($pwd,$hashedpwd)){
      return true;
   }else{
      return false;
   }

} 