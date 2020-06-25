<?php

$usersQuery = "SELECT * FROM users";
$result = mysqli_query($db, $usersQuery);
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"
        href="file:///C:/Users/Asus/Desktop/fontawesome/fontawesome-free-5.11.2-web/fontawesome-free-5.11.2-web/css/all.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.11.1/css/font-awesome.min.css"/>
  <title>Poker</title>
</head>

<div class="users_top">
  <table style="width:90%">
    <tr>
      <th>Vardas</th>
      <th>Pavardė</th>
      <th>El.paštas</th>
      <th>Poke skaičius</th>
    </tr>
  </table>
</div>

<table>
  <?php
  while ($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo $row['last_name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td>
        <?php
        $pokesQuery = "SELECT COUNT(*) as `pokesCount` FROM pokes WHERE poked = " . $row['id'];
        $result1 = mysqli_query($db, $pokesQuery);
        $pokes = mysqli_fetch_assoc($result1);
        //           var_dump($pokes['pokesCount']);
        echo $pokes['pokesCount']
        ?>
      </td>
      <td>
        <form id="contact">
          <div id="msg"></div>
          <button class="button3 poke-button" id="<?php echo $row['id'] ?>">Poke <i class="fa fa-angle-right"></i>
          </button>
        </form>
      </td>
    </tr>
  <?php } ?>
</table>



