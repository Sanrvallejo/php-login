<?php 

  require 'db.php'; 

  $message = "";

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password);";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = "Usuario creado exitosamente";
    } else {
      $message = "Hubo un error al crear el usuario";
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
  <title>SignUp</title>
</head>

<body>

  <?php require 'fragments/header.php' ?>

  <?php if (!empty($message)): ?>
    <p><?php= $message ?></p>
    <p>Puede iniciar sesión dando click en LogIn</p>
  <?php endif; ?>

  <h1>SignUp</h1>
  <span>or <a href="login.php">LogIn</a></span>

  <form action="signup.php" method="POST">
    <input type="text" name="email" placeholder="Ingrese su email">
    <input type="password" name="password" placeholder="Ingrese su contraseña">
    <input type="password" name="confirm_password" placeholder="Confirme la contraseña">
    <input type="submit" valeu="Enviar">
  </form>
</body>
</html>