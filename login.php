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
  <span>or <a href="signup.php">SignUn</a></span>
  <form action="login.php" method="POST">
    <input type="text" name="email" placeholder="Ingrese su email">
    <input type="password" name="password" placeholder="Ingrese su contraseña">
    <input type="submit" valeu="Enviar">
  </form>
</body>
</html>