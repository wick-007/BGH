

<?php
$dsn = "pgsql:host=localhost;port=5432;dbname=BGH";
$dbusername ='postgres';
$dbpassword ='8956';

//using modern php data object connection for database because it is more secure and flexible
try{
    $pdo = new PDO ($dsn,$dbusername,$dbpassword);//creating an instance of the database based of the parameters of the new object.
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       echo "Successfully connected to PostgreSQL using PDO!";
        //trying to catch any errors from the PDO connection
} catch (PDOException $e) {
   echo "Connection failed: " .$e->getMessage();
}