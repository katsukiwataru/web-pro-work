<?php
  session_start();
  $perm = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (!empty($_POST['title'])) {
    $title = $_POST['title'];
    if (in_array("2", $perm)) {
      try {
        $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
        $stmt = $dbh->prepare('INSERT INTO categories (name) VALUES (?)');
        $stmt->execute(array($title));
      } catch (PDOException $e) {
        var_dump ($e);
        exit;
      }
    } else {
      header('Location: index.php');
      exit;
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS カテゴリ登録</title>
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
    <h1 class="title">カテゴリ登録</h1>
  </div>
  </header>
  <div class="position">
    <form action="category_register.php" method="POST">
      <div>
        <p>タイトル</p>
        <input type="text" name="title">
      </div>
      <button>登録</button>
    </form>
  </div>
</body>
</html>
