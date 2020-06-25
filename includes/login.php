<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--  <link rel="stylesheet"  type="text/css" href="file:///C:/Users/Asus/Desktop/fontawesome/fontawesome-free-5.11.2-web/fontawesome-free-5.11.2-web/css/all.css"/>-->
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.11.1/css/font-awesome.min.css"/>-->
  <title>Poker</title>
</head>

<body>
<?php include('navbar.php'); ?>
<div class="prisijungimas">
<div class="nav-bar">
  <h1> PRISIJUNGIMAS </h1>
  <div class="login-container">
    <form method="post" action="login.php">
      <?php include('errors.php'); ?>
      <a class="input-group">
        <input type="email" name="email" placeholder="El pastas">
        <input type="password" name="password"placeholder="Slaptažodis">
        <button type="submit" class="button" name="login_user">Prisijungti</button>
        <a type="submit" class="button2" href="../register.php">Registruotis <i class="fa fa-angle-right"></i></a>
  </div>
</div>
</div>
</body>
</html>
