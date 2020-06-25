<?php
require 'config.php';
if(isset($_POST['login-submit'])) {
    $errMsg = '';
    // Get data from FORM
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($email== '')
        $errMsg = 'Enter email';
    if($password == '')
        $errMsg = 'Enter password';
    if($errMsg == '') {
        try {
//          die("yjgygyu");
          $stmt = $connect->prepare('SELECT id, email, password FROM users WHERE $email = :email');
            $stmt->execute(array(
                ':email' => $_POST["email"]
            ));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data == false){
                $errMsg = "User email not found.";
            }
            else {
                if($password == $data['password']) {
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['password'] = $data['password'];
                    $errMsg = 'Success';
                    exit;
                }
                else
                    $errMsg = 'Password not match.';
            }
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
echo $errMsg;
