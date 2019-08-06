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
  <ul class="nav">
    <li class="nav_item"><a class="nav_item_link" href="user_list.php">ユーザー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="user_register.php">ユーザー登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_list.php">コンテンツ一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_register.php">コンテンツ登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_list.php">カテゴリー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_register.php">カテゴリー登録</a></li>
  </ul>
  <header class="header">
  <div>
    <h1 class="title">カテゴリー一覧</h1>
  </div>
  </header>
  <div class="position">
    <div class="category_list">
      <p class="categories_id">id</p>
      <p class="categories_name">name</p>
    </div>
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
  </div>
</body>
</html>
