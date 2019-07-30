<?php
  $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
  session_start();
  $perm = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (!in_array("2", $perm)) {
    header('Location: index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS　カテゴリー一覧</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>カテゴリー一覧</h1>
<?php
  $stmt = $dbh->prepare('SELECT * FROM categories');
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="category_list">
    <p class="categories_id"><?= $row['id']?></p>
    <p class="categories_name"><?= $row['name']?></p>
  </div>
<?
  }
?>
</body>
</html>
