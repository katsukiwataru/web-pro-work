<?php
  session_start();
  $per = $_SESSION['perm'];

  if (!$_SESSION['perm']) {
    header('Location: index.php');
    exit;
  }

  if (in_array("1", $per)) {
    if (!empty($_POST['id']) && !empty($_POST['pass'] && !empty($_POST['permission']))) {
      $id = $_POST['id'];
      $pass = $_POST['pass'];
      $permissions = $_POST['permission'];
      try {
        $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
        $stmt = $dbh->prepare('INSERT INTO users (username, password) VALUES (?,?)');
        $stmt->execute(array($id, $pass));

        $stmt = $dbh->query('SELECT max(id) FROM users');
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $max_id = $row['max(id)'];
          $_stmt = $dbh->prepare('INSERT INTO user_permissions (user_id, permission_id) VALUES (?,?)');
          foreach ($permissions as $perm){
            $_stmt->execute(array($max_id, $perm));
          };
        };
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
  <title>CMS ユーザー登録</title>
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
    <h1 class="title">ユーザー登録</h1>
  </div>
  </header>
  <div class="position">
    <form action="user_register.php" method="POST">
      <div>
        <p>ログインID</p>
        <input type="text" name="id">
      </div>
      <div>
        <p>パスワード</p>
        <input type="password" name="pass">
      </div>
      <div>
        <p>権限</p>
        <input class="checkbox" type="checkbox" name="permission[]" value="1">管理者
        <input class="checkbox" type="checkbox" name="permission[]" value="2">編集者
        <input class="checkbox" type="checkbox" name="permission[]" value="3">閲覧者
      </div>
      <button>登録</button>
    </form>
  </div>
</body>
</html>
