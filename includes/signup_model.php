<?php

declare(strict_types=1);


function get_username(PDO $pdo, string $username)
{
    $query = " SELECT username FROM users WHERE username = :username;";
    /** @var PDO $pdo */
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(':username', $username);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function get_email(PDO $pdo, string $email)
{
    $query = " SELECT username FROM users WHERE email = :email;";
    /** @var PDO $pdo */
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(':email', $email);
    $stmt->execute();

    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function insert_user(PDO $pdo, string $username, string $pwd, string $email)
{
    try {
        $options = [12];
        $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $query = "INSERT INTO users (username,pwd,email) VALUES (:username,:pwd,:email);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pwd', $hashedpwd);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php?signup=success");

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
