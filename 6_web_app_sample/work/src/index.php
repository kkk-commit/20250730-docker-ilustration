<?php

$users = [];

$dsn = 'mysql:host=db;port=3306;dbname=sample';
$username = 'root';
$password = 'secret';
try {
    $pdo = new PDO($dsn, $username, $password);

    $statement = $pdo->query('SELECT * FROM user');
    $statement->execute();
    while ($row = $statement->fetch()) {
        $users[] = $row;
    }

    $pdo = null;
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

foreach ($users as $user) {
    echo '<p>id: ' . $user['id'] . ',  name: ' . $user['name'] . '</p>';
}

$subject = 'Web App Sample';
$message = 'This is a sample web application using PHP and MySQL.';
foreach ($users as $user) {
    $success = mail($user['email'], $subject, $message);
    if ($success) {
        echo '<p>Email sent successfully to ' . $user['email'] . '</p>';
    } else {
        echo '<p>Failed to send email to ' . $user['email'] . '</p>';
    }
}