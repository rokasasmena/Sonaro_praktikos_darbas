<?php
session_start();
include 'db.php';
require_once('../phpmailer/PHPMailerAutoload.php');


$user_check_query = "SELECT * FROM pokes WHERE poked_by='poked_by' LIMIT 1";
$result1 = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result1);

$id = mysqli_real_escape_string($db, $_POST['id']);

$sql = "INSERT INTO pokes (poked_by, poked, data)
                    VALUES ('1', $id, CURRENT_TIMESTAMP)";
mysqli_query($db, $sql);


if (!array_key_exists('id', $_SESSION)) {
    echo json_encode(['status' => 403]);
}

if (!array_key_exists('id', $_POST)) {
    echo json_encode(['status' => 422]);
}


$usersQuery  = "SELECT * FROM users WHERE id = " . $_POST['id'] . " LIMIT 1";
$result = mysqli_query($db, $usersQuery );
$recipient = mysqli_fetch_assoc($result);

$usersQuery  = "SELECT * FROM users WHERE id = " . $_SESSION['id'] . " LIMIT 1";
$result = mysqli_query($db, $usersQuery);
$poker = mysqli_fetch_assoc($result);

$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '3251065abfbb28';                 // SMTP username
$mail->Password = '7cdfbd8d9f7dff';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom('pokintojas@gmail.com', 'Pokintojas2000');
$mail->addAddress($recipient['email'], $recipient['first_name'] . ' ' . $recipient['last_name']);     // Add a recipient
$mail->addReplyTo($email, $name);

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'You have been poked!';
$mail->Body = 'Poke nuo: '. $poker['first_name'] . ' ' . $poker['last_name'] . ' <br />';

if (!$mail->send()) {
  echo json_encode(['status' => 500, 'message' => $mail->ErrorInfo]);
}

echo json_encode(['status' => 200]);
