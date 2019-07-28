<?php
  session_start();
  // if(isset($_SESSION['user'])) {
  //   header('Location: index.php');
  // }
  if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    try {
      $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
      $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
      $stmt->execute([$mail]);
      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_stmt = $dbh->prepare('SELECT * FROM permissions');
        $_row = $_stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($_row);
        $_stmt->execute([$row['id']]);
        $permgroup = array();
        $permgroupName = array();
      // ここがfalseだから処理できてない
      while($_row = $_stmt->fetch(PDO::FETCH_ASSOC)) {
        $perm_ids = $_row['permission_id'];
        array_push($permgroup, $perm_ids);
        $perm_names = $_row['name'];
        array_push($permgroupName, $perm_names);
      };
        $perm_ids = $_row['permission_id'];
        $perm_names = $_row['name'];
        array_push($permgroup, $perm_ids);
        array_push($permgroupName, $perm_names);
        var_dump($permgroup);
        var_dump($permgroupName);
      };
    if ($pass == $row['password']) {
      // session_regenerate_id(true);
      $_SESSION['user'] = $mail;
      $_SESSION['perm'] = $permgroup;
      $_SESSION['permname'] = $permgroupName;
      // header('Location: index.php');
    }
    } catch (PDOException $e) {
      var_dump ($e);
      exit;
    }
  }
?>
