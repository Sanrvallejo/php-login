<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
    exit;
  }

  require 'db.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email;');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();

    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (!empty($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header('Location: /php-login');
    }else {
      $message = 'Usuario o contraseña incorrecta';
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <?php require 'fragments/header.php'?>

  <h1>Login</h1>
  <span>or <a href="signup.php">SignUp</a></span>

  <?php if (!empty($message)): ?>
    <p><?php= $message ?></p>
    <p>Usuario o contraseña incorrecta</p>
  <?php endif; ?>

  <form action="login.php" method="POST">
    <input type="text" name="email" placeholder="Ingrese su email">
    <input type="password" name="password" placeholder="Ingrese su contraseña">
    <input type="submit" valeu="Enviar">
  </form>
</body>
</html>