<?php
  $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
  session_start();
  $perm = $_SESSION['perm'];
  $permname = $_SESSION['permname'];
  $user = $_SESSION['user'];
  if(!isset($user)) {
    header('Location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS　ユーザー一覧</title>
</head>
<body>
  <h1>ユーザー一覧</h1>
  <?php
  var_dump($_SESSION['row']);
  var_dump($user);
  var_dump($perm);
  var_dump($permname);
  if (in_array(1, $perm)) { ?>
  <?php
  }
  ?>
</body>
</html>
