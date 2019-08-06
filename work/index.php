<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>CMS</title>
</head>
<body>
  <header class="header">
  <div>
    <h1 class="title">CMS</h1>
  </div>
  </header>
  <ul class="nav">
    <li class="nav_item"><a class="nav_item_link" href="user_list.php">ユーザー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="user_register.php">ユーザー登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_list.php">コンテンツ一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents_register.php">コンテンツ登録</a></li>
    <li class="nav_item"><a class="nav_item_link" href="contents.php">コンテンツ詳細</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_list.php">カテゴリー一覧</a></li>
    <li class="nav_item"><a class="nav_item_link" href="category_register.php">カテゴリー登録</a></li>
  </ul>
<?
if (!$_SESSION['user']) {
?>
<div class="position">
  <form action="login.php" method="POST">
    <div>
      <p>Email</p>
      <input type="text" name="mail">
    </div>
    <div>
      <p>Password</p>
      <input type="password" name="pass">
    </div>
    <button>Login</button>
  </form>
</div>
<?
} else {
?>
  <button class="logout" onclick="location.href='./logout.php'">Logout</button>
<?
}
?>
</body>
</html>
