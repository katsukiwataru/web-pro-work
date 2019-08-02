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
  <h1>コンテンツ一覧</h1>
  <div class="contents_list">
    <p>ID</p>
    <p>カテゴリ</p>
    <p>タイトル</p>
    <p>登録日</p>
  </div>
  <div>
<?php
  $stmt = $dbh->prepare('SELECT contents.id, contents.title, contents.body, contents.date, categories.name FROM contents JOIN categories ON contents.category_id = categories.id;');
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?><div class="contents_list">
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
