<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username,pwd,email) VALUES (?,?,?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $pwd, $email]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    //send them back to the homepage using the header function
    header("Location: ../index.php");
}
