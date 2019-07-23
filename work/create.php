<?php
  try {
    $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
    $stmt = $dbh->prepare(
    'INSERT INTO users (username, password) VALUES (?,?)'
    );

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $stmt->execute(array($mail, $pass));

    var_dump($stmt);
    // var_dump($pass);

    // header('Location: index.php');
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
