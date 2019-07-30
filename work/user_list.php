<?php
  $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (!in_array("1", $per)) {
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
  <title>CMS　ユーザー一覧</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>ユーザー一覧</h1>
<?php
  $stmt = $dbh->prepare('SELECT users.id, users.username FROM users');
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="user_list">
    <p class="users_id"><?= $row['id']?></p>
    <p class="users_name"><?= $row['username']?></p>
  <?
    $_stmt = $dbh->prepare(
      'SELECT * FROM permissions JOIN user_permissions ON permissions.id = user_permissions.permission_id WHERE user_id = ?'
    );
    $_stmt->execute([$row['id']]);
    while($_row = $_stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
    <p class="users_permissions"><?= $_row['name']?></p>
  <?
  }
  ?>
  </div>
<?
  }
?>
</body>
</html>
