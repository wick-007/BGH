<?php

session_start();


if ($_SERVER['REQUEST_METHOD']=="POST"){
    $searchuser = filter_input(INPUT_POST, "searchuser", FILTER_SANITIZE_SPECIAL_CHARS);

try{
    
    /** @var PDO $pdo */
    require_once 'dbh.inc.php';

    $query = "SELECT * FROM users WHERE username LIKE :searchuser ;";

    $stmt = $pdo->prepare($query);
    $stmt-> bindparam(':searchuser',$searchuser);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // using fetch all means fetching more than one data, you can simpy use ->fetch(PDO::Fetch_ASSOC) and fetch the data in associative array.

}catch (PDOException $e) {
    echo 'Query failed'. $e->getMessage();
    die();
}   
}else{
    header("Location: ../index.php");
} 

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>search results ...</h3>
 <?php 
 if (empty($results)){
    echo 'no results found for '.$searchuser;
 }else{
   foreach($results as $result){
       echo $result['username']. '<br>'. $result['email'];
   }
 }
 ?>
</body>
</html>