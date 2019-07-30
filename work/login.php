<?php
  session_start();
  if(isset($_SESSION['user'])) {
    header('Location: index.php');
  }
  if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    try {
      $dbh = new PDO('mysql:host=db;dbname=cms','myuser', 'testuser');
      $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
      $stmt->execute([$mail]);
      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $permgroup = array();
        $_stmt = $dbh->prepare(
          'SELECT * FROM permissions JOIN user_permissions ON permissions.id = user_permissions.permission_id WHERE user_id = ?'
        );
        $_stmt->execute([$row["id"]]);
        while($_row = $_stmt->fetch(PDO::FETCH_ASSOC)) {
          $perm_ids = $_row['permission_id'];
          array_push($permgroup, $perm_ids);
        };
      };
      if ($pass == $row['password']) {
        session_regenerate_id(true);
        $_SESSION['user'] = $mail;
        $_SESSION['perm'] = $permgroup;
        header('Location: index.php');
        exit();
      }
    } catch (PDOException $e) {
      var_dump ($e);
      exit;
    }
  }
?>
