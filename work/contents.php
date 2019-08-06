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
  <header class="header">
  <div>
    <h1 class="title">コンテンツ</h1>
  </div>
  </header>
  <ul class="nav">
    <li class="nav_item"><a class="nav_item_link" href="user_list.php">ユーザー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="user_register.php">ユーザー登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_list.php">コンテンツ一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_register.php">コンテンツ登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_list.php">カテゴリー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_register.php">カテゴリー登録</a></li>
  </ul>
  <div class="position">
    <h2>タイトル:<?= $row["title"]?></h2>
    <p>内容:<?= $row["body"]?></p>
  </div>
</body>
</html>
