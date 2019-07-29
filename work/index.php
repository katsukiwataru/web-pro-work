<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS</title>
</head>
<body>
  <header>
  <div>
    <h1>CMS</h1>
    <span>Logout</span>
  </div>
  </header>
  <ul>
    <li><a href="user_list.php">ユーザー一覧</a></li>
    <li><a href="user_register.php">ユーザー登録</a></li>
    <li><a href="">コンテンツ一覧</a></li>
    <li><a href="">コンテンツ登録</a></li>
    <li><a href="">コンテンツ詳細</a></li>
    <li><a href="">カテゴリー一覧</a></li>
    <li><a href="">カテゴリー登録</a></li>
  </ul>
<?
if (!$_SESSION['user']) {
?>
  <form action="login.php" method="POST">
    <div>
      <p>Email</p>
      <input type="text" name="mail">
    </div>
    <div>
      <p>Password</p>
      <input type="text" name="pass">
    </div>
    <button>Login</button>
  </form>
<?
}
?>
  <button onclick="location.href='./logout.php'">Logout</button>
</body>
</html>
