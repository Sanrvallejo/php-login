<?php
  session_start();

  require 'db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id;');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();

    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    
    if (count($results) > 0) {
      $user = $results;
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
  <title>Home</title>
</head>
<body>
  <?php require 'fragments/header.php'?>

  <?php
  if (!empty($user)): ?>
    <br>Bienvenido. <?= $user['email'] ?>
    <br>Ha ingresado a su perfil 
    <a href="logout.php">Log out</a>
  <?php else: ?>
    <h1>LogIn o SignUp</h1>
    
    <a href="login.php">LogIn</a>
    <a href="signup.php">SignUp</a>
  <?php endif; ?>
</body>
</html>