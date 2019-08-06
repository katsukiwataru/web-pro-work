<?php
  $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (in_array("2", $per) || in_array("3", $per)) {
  } else {
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
  <title>CMS コンテンツ</title>
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
    <h1 class="title">コンテンツ一覧</h1>
  </div>
  </header>
  <div class="position">
    <div class="contents_list">
      <p>ID</p>
      <p>カテゴリ</p>
      <p>タイトル</p>
      <p>登録日</p>
    </div>
<?php
  $stmt = $dbh->prepare('SELECT contents.id, contents.title, contents.body, contents.date, categories.name FROM contents JOIN categories ON contents.category_id = categories.id;');
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="contents_list">
      <p class="contents_id"><?= $row["id"]?></p>
      <p class="contents_title"><?= $row["title"]?></p>
      <p class="contents_name"><?= $row["name"]?></p>
      <p class="contents_body"><?= $row["body"]?></p>
      <p class="contents_date"><?= $row["date"]?></p>
      <a href="contents.php?desc=<?=$row['id']?>">閲覧</a>
    </div>
<?
  }
  ?>
  </div>
</body>
</html>
