<?php //include('includes/server.php');
session_start();
//<!--jeigu vartotojas neprisijungęs jis nemato puslapio-->

include 'includes/db.php';

if (!isset($_SESSION['id'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: /includes/login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['id']);
  header("location: /includes/login.php");
}
if (empty($_SESSION['id'])) {
  header('location:/includes/login.php');
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.11.1/css/font-awesome.min.css"/>
  <title>Poker</title>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="prisijungimas">
  <div class="nav-bar">
    <!--      <div class="login-container">-->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
        <h3>
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <?php if (isset($_SESSION['id'])) { ?>
    <?php
    $usersQuery = "SELECT * FROM users WHERE id = " . $_SESSION['id'] . " LIMIT 1";
    $result = mysqli_query($db, $usersQuery);
    $currentUser = mysqli_fetch_assoc($result);
//    include 'includes/all_users.php';
    include 'includes/paging.php';
    ?>
  </div>

  <?php } ?>
</div>
</body>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script src="js/poke.js"></script>
</html>
