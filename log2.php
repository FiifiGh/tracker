<?php require_once('Connections/conn.php');
require_once("function/function.php");


// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

//echo "meee";
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
//mysql_select_db($database_courier, $courier);
if (isset($_POST['username'])) {
    $loginUsername = validateUserInputs($_POST['username']);
    $password1 = validateUserInputs($_POST['password']);
    $password = md5($password1);
    $MM_fldUserAuthorization = "";
    $MM_redirectLoginSuccess = "index.php";
    $MM_redirectLoginFailed = "index.php?error";
    $MM_redirecttoReferrer = false;
    //mysql_select_db($database_courier, $courier);

    $LoginRS__query = "SELECT * FROM users_accounts WHERE username=? AND password=? and status='1'";
    $LoginRS = $conn->prepare($LoginRS__query);
    $LoginRS->execute(array($loginUsername, $password));
    $row_LoginRS = $LoginRS->fetch(PDO::FETCH_ASSOC);
    //print_r($row_LoginRS);exit;
    $loginFoundUser = $LoginRS->rowCount();

    if ($loginFoundUser > 0) {
        $loginStrGroup = "";
        $_SESSION['myMM_Username'] = $loginUsername;
        $_SESSION['myMM_UserGroup'] = $loginStrGroup;
        $_SESSION['myMM_Fullname'] = $row_LoginRS['firstnames'] . ' ' . $row_LoginRS['surname'];
        $fullname = $row_LoginRS['firstnames'] . ' ' . $row_LoginRS['surname'];
        $_SESSION['myMM_Userid'] = $row_LoginRS['id'];
        $user_id = $row_LoginRS['id'];
        $_SESSION['security'] = $row_LoginRS['security'];
        $_SESSION['creditID'] = $row_LoginRS['provider_id'];
        $_SESSION['currentBranch'] = $row_LoginRS['branch'];

        //$_SESSION['securitystaff'] = $row_LoginRS['securitystaff'];

        $security = $_SESSION['security'];


        $provider_id = $row_LoginRS['provider_id'];
        $query_rscarmodel11 = "SELECT * FROM provider_details where provider_id=?";
        $rscarmodel11 = $conn->prepare($query_rscarmodel11);
        $rscarmodel11->execute(array($provider_id));
        $row_rscarmodel11 = $rscarmodel11->fetch(PDO::FETCH_ASSOC);


        $_SESSION['provider_id'] = $row_rscarmodel11['provider_id'];
        $_SESSION['provider_id_master'] = $row_rscarmodel11['provider_id_master'];
        $_SESSION['wantsms'] = $row_rscarmodel11['sms'];
        $_SESSION['facility_name'] = $row_rscarmodel11['facility_name'];
        $_SESSION['facility_tel_number'] = $row_rscarmodel11['facility_tel_number'];
        $_SESSION['calculation_type'] = $row_rscarmodel11['calculation_type'];
        $_SESSION['processing_fee'] = $row_rscarmodel11['processing_fee'];


        $machineip = getenv("REMOTE_ADDR");


        $query_rscarmodel11 = "INSERT INTO `shift_user_log` (`id`, `user_id`, `username`, `fullname`, `shift_period`, `login_time`, `user_ip_address`, `provider_id`, `provider_id_master`) VALUES (NULL, '$user_id', '$loginUsername', '$fullname', '$shift_period', CURRENT_TIMESTAMP, '$machineip', '$provider_id', '$provider_id_master');";
//$rscarmodel11 = mysql_query($query_rscarmodel11, $courier) or die(mysql_error());

//$shift_id=mysql_insert_id();
//$_SESSION['shift_id']=$shift_id;


        //echo $row_rscarmodel11['facility_name'];
        //exit;

        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
        }


        header("Location: " . $MM_redirectLoginSuccess);
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }

}
?>
