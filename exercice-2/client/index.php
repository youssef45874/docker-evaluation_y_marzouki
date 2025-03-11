<?php
$dsn = 'mysql:host=database;dbname=docker_doc_dev';
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->query('SELECT * FROM article');

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>{$row['id']} - {$row['title']} : {$row['body']}</p>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
