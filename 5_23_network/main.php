<?php

$dsn = 'mysql:host=db;port=3306;dbname=sample';
$username = 'root';
$password = 'secret';
$pdo = new PDO($dsn, $username, $password);

$statement = $pdo->query('SELECT * FROM user');
$statement->execute();
while ($row = $statement->fetch()) {
    echo '- id: ' . $row['id'] . ',  name: ' . $row['name'] . PHP_EOL;
}

$pdo = null;