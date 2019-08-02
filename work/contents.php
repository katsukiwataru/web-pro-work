<?php
  $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (in_array("3", $per)) {
    header('Location: index.php');
    exit;
  }

  $desc = $_GET['desc'];

  $stmt = $dbh->prepare('SELECT * FROM contents WHERE id = ' .$desc);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>CMS コンテンツ</title>
</head>
<body>
  <h1>コンテンツ</h1>
  <div>
    <h2>タイトル:<?= $row["title"]?></h2>
    <p>内容:<?= $row["body"]?></p>
  </div>
</body>
</html>
