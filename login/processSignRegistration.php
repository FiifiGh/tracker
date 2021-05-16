<?php
require_once ('../function/function.php');
require_once ('../Connections/conn.php');
if (isset($_POST['registration'])){
    $email = validateUserInputs($_POST['email']);
    $password1 = validateUserInputs($_POST['password']);
    $confirm_password = validateUserInputs($_POST['confirm_password']);
    $MM_redirectLoginFailed = "signup.php?error=101";
    $MM_redirectLoginSuccess = "../index.php";
    if ($password1 != $confirm_password){
        header("Location: ".$MM_redirectLoginFailed);
    }else{
        $password = md5($password1);
        $fields = [];
        $fields = ('email, password');
        $prepare = [];
        $prepare = ('?, ?');
        $values = [];
        $values = array($email, $password);
        $results = insertStatement('users_accounts', $fields, $prepare, $values, $conn);
        $get_saved_record_json = json_decode($results,"true");
        $savedRecord = $get_saved_record_json['RESULT'];
        $STATUS = $get_saved_record_json['STATCODE'];
        if ($STATUS == "200"){
            $LoginRS__query = "SELECT * FROM users_accounts WHERE email=? AND password=? and status='1'";
            $LoginRS = $conn->prepare($LoginRS__query);
            $LoginRS->execute(array($email, $password));
            $row_LoginRS = $LoginRS->fetch(PDO::FETCH_ASSOC);
            $loginFoundUser = $LoginRS->rowCount();
            header("Location: " . $MM_redirectLoginSuccess);
        }
    }


}