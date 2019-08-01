<?php
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
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
  <h1>コンテンツ登録</h1>
  <form action="contents_register.php" method="POST">
    <div>
      <p>カテゴリ</p>
      <input type="text" name="category">
    </div>
    <div>
      <p>タイトル</p>
      <input type="text" name="title">
    </div>
    <div>
      <p>内容</p>
      <input type="text" name="body">
    </div>
    <button>登録</button>
  </form>
</body>
</html>
