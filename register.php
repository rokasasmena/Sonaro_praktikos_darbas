<?php include('includes/server.php');
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"  type="text/css" href="file:///C:/Users/Asus/Desktop/fontawesome/fontawesome-free-5.11.2-web/fontawesome-free-5.11.2-web/css/all.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.11.1/css/font-awesome.min.css"/>
  <title>Poker</title>
</head>
<body>
<?php include 'includes/navbar.php'; ?>

<div class="registracija">
  <div class="nav-bar">
    <h1> REGISTRACIJA </h1>
    <form method="post" action="register.php">
<!--    čia rodomos patvirtinimo klaidos  -->
      <?php include('includes/errors.php'); ?>
      <div class="input-group">
        <label>Vardas</label>
        <input type="text" name="name">
      </div>
      <div class="input-group">
        <label>Pavardė</label>
        <input type="text" name="surname">
      </div>
      <div class="input-group">
        <label>El. paštas</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="input-group">
        <label>Slaptažodis</label>
        <input type="password" name="password_1">
      </div>
      <div class="input-group">
        <label>Slaptažodžio pakartojimas</label>
        <input type="password" name="password_2">
      </div>
      <div class="nav-bar">
          <div class="login-container">
            <button type="submit" name="register_btn" class="button1">Saugoti <i class="fa fa-angle-right"></i></button>
          </div>
      </div>
    </form>
</div>
</body>
</html>
