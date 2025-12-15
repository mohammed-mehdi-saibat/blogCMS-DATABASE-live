<?php
$host = "localhost";
$bdname = "blogcms";
$username = "root";
$password = "5022";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbame=$bdname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    echo "connected successfuly!";
} catch (PDOException $e) {
    dir("Connection botched! : " . $e->getMessage());
}

print_r($pdo);
