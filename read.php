<?php
  require 'db.php';

  $records = $conn->prepare('SELECT * FROM users;');
  $records->execute();

  $results = $records->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <title>Users</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

  <?php require 'fragments/header.php'?>

  <h2>Lista de Usuarios</h2>

  <table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php foreach ($results as $row): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['id']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['password']); ?></td>
        </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>