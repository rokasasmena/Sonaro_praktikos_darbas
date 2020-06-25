<?php
session_start();

$username = "";
$name = "";
$surname = "";
$email = "";
$errors = array();

//Prijungiam prie duomenų bazės
$db = mysqli_connect('localhost', 'root', '', 'poke');

//Kai paspaudžiamas mygtukas
if (isset($_POST['register_btn'])) {

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


//Tikrinam ar visi laukai užpildyti
  if (empty($name)) {
    array_push($errors, "Būtina įvesti vardą");
  }
  if (empty($surname)) {
    array_push($errors, "Būtina įvesti pavardę");
  }
  if (empty($email)) {
    array_push($errors, "Būtina įvesti el.paštą");
  }
  if (empty($password_1)) {
    array_push($errors, "Būtina įvesti slaptažodį");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "Slaptažodžiai nesutampa");
  }
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user && $user['email'] === $email) {
    array_push($errors, "El. paštas jau užimtas");
  }


//Jeigu nėra klaidų, išsaugojam vartotoją į duomenų bazę

  if (count($errors) == 0) {
    $password = md5($password_1);
    $sql = "INSERT INTO users (email, first_name, last_name, password) 
                    VALUES('$email', '$name', '$surname', '$password')";
    mysqli_query($db, $sql);

    $newUserQuery = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($db, $newUserQuery);
    $user = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $user['id'];
    $_SESSION['success'] = "Jūs esate prisijungęs";
    header('location: index.php');
  }
}

//vartotojo prisijungimas į pagrindinį puslapį
if (isset($_POST['login_user'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  if (empty($email)) {
    array_push($errors, "Įveskite El pasta");
  }
  if (empty($password)) {
    array_push($errors, "Įveskite slaptažodį");
  }

  if (count($errors) == 0 ) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
      //prijungiame vartotoją
      $_SESSION['id'] = $user['id'];
      $_SESSION['success'] = "You are now logged in";
      header('location: /index.php');
    }else{
        array_push($errors, "Blogas prisijungimo vardas arba slaptažodis");
//          header('location: /includes/login.php');
    }
  }
}


//logout
if (isset($_GET['logout'])) {
  session_destroy();
  header('location: /includes/login.php');
}
