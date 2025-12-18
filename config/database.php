<?php

$host = "localhost";
$bdname = "blogcms";
$password = "";
$username = "root";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$bdname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    echo "connected successfuly! <br>";
} catch (PDOException $e) {
    dir("Connection botched! : " . $e->getMessage());
}
