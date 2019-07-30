<?php
  session_start();
  $perm = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (!empty($_POST['title'])) {
    $title = $_POST['title'];
  }

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
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS カテゴリ登録</title>
</head>
<body>
  <form action="category_register.php" method="POST">
    <div>
      <p>タイトル</p>
      <input type="text" name="title">
    </div>
    <button>登録</button>
  </form>
</body>
</html>
