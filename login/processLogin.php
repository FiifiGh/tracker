<?php
require_once ('../function/function.php');
require_once ('../Connections/conn.php');

if (isset($_POST['login'])){
    $email = validateUserInputs($_POST['email']);
    $password1 = validateUserInputs($_POST['password']);
    $password = md5($password1);
    $MM_redirectLoginFailed = "signin.php?error=102";
    $MM_redirectLoginSuccess = "../index.php";
    ///////// 102 -> error_msg wrong username or password ///////////////

            $LoginRS__query = "SELECT * FROM users_accounts WHERE email=? AND password=? and status='1'";
            $LoginRS = $conn->prepare($LoginRS__query);
            $LoginRS->execute(array($email, $password));
            $row_LoginRS = $LoginRS->fetch(PDO::FETCH_ASSOC);
            $loginFoundUser = $LoginRS->rowCount();
            if ($loginFoundUser > 0 ){
                header("Location: " . $MM_redirectLoginSuccess);
            }else{
                header("Location: " . $MM_redirectLoginFailed);
            }


}