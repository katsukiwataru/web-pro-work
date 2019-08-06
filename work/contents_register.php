<?php
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (in_array("2", $per)) {
    if (!empty($_POST['category']) && !empty($_POST['title'] && !empty($_POST['body']))) {
      $title = $_POST['title'];
      $body = $_POST['body'];
      $category = $_POST['category'];
      try {
        $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
        $stmt = $dbh->prepare('INSERT INTO contents (title, body, category_id) VALUES (?,?,?)');
        $stmt->execute(array($title, $body, $category));
        header('Location: index.php');
      } catch (PDOException $e) {
        var_dump($e);
        exit;
      }
    }
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
    <h1 class="title">コンテンツ登録</h1>
  </div>
  </header>
  <div class="position">
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
  </div>
</body>
</html>
