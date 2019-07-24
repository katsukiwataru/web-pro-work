<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
  <header>
  <div>
    <h1>CMS</h1>
    <span>Logout</span>
  </div>
  </header>
  <form action="user_register.php" method="POST">
    <div>
      <p>ログインID</p>
      <input type="text" name="id">
    </div>
    <div>
      <p>パスワード</p>
      <input type="text" name="pass">
    </div>
    <div>
      <p>権限</p>
      <input type="checkbox" name="permission" value="administrator">管理者
      <input type="checkbox" name="permission" value="editor">編集者
      <input type="checkbox" name="permission" value="viewer">閲覧者
    </div>
    <button>登録</button>
  </form>
<?php
  try {
    $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
    $stmt = $dbh->prepare(
    'INSERT INTO user (username, password) VALUES (?,?)'
    );
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $stmt->execute(array($id, $pass));

    $stmt = $dbh->query('select max(id) from users ');
    var_dump($stmt);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $max_id = $row['max(ID)'];
      $permission = $_POST['permission'];
      $_stmt = $dbh->prepare(
        'INSERT INTO user_permission (user_id, permission_id) VALUES (?,?)'
      );
      foreach ($permission as $perm) {
        $_stmt->execute($max_id, $perm);
      };
    }
    // $stmt = $dbh->prepare(
    //   'INSERT INTO user_permissions (user_id, permission_id) VALUES (?,?)'
    // );

    // $permission = $_POST['permission'];

    // $stmt->execute($permission);

    // header('Location: index.php');
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
?>
</body>
</html>
