<?php
require 'config.php';
if(isset($_POST['signup-submit'])) {
    $errMsg = '';
    // Get data from FROM
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($email== '')
        $errMsg = 'Enter email';
    if($password == '')
        $errMsg = 'Enter password';
    if($errMsg == ''){
        try {
            $stmt = $connect->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
            $stmt->execute(array(
                ':email' => $email,
                ':password' => $password
            ));
            header('Location: /index.php?action=joined');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can <a href="login1.php">login</a>';
}
?>
