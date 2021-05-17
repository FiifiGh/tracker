<?php
include("../Connections/conn.php");
include("../function/function.php");


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

$recieved = trim(file_get_contents('php://input'), true);
$decoded = json_decode($recieved, true);

if (isset($decoded['METHOD'])) {
    $METHOD=trim($decoded['METHOD']);
}


//function setindex_prefix($index_assigned, $value){
//    switch(strlen($index_assigned))
//    {
//        case 1:
//            $new_index_assigned = "000".$index_assigned;
//            break;
//        case 2:
//            $new_index_assigned = "00".$index_assigned;
//            break;
//        case 3:
//            $new_index_assigned = "0".$index_assigned;
//            break;
//        default:
//            $new_index_assigned = $index_assigned;
//    }
//
//    return $value.$new_index_assigned;
//}



if($METHOD=="REGISTER_MEMBER"){
        $apikey =trim($decoded['APIKEY']);
        $username =trim($decoded['USERNAME']);
        $password =trim($decoded['PASSWORD']);
        $provider_id =trim($decoded['PROVIDERID']);

        $email =trim($decoded['email']);
        $password =trim($decoded['password']);
        $api_validation = api_authentication($apikey,$username,$password,$provider_id,$conn);
        if ($api_validation == "Ok"){
            echo $results = selectQuery("INSERT INTO `users_accounts`(`password`, `email`) VALUES ('$password', '$email')",$conn);
        }else{
            echo $api_validation;
        }

}else if ($METHOD == "UPDATE_MEMBER"){
    $apikey =trim($decoded['APIKEY']);
    $username =trim($decoded['USERNAME']);
    $password =trim($decoded['PASSWORD']);
    $provider_id =trim($decoded['PROVIDERID']);

    $userid =trim($decoded['userid']);
    $email =trim($decoded['email']);
    $password =trim($decoded['password']);
    $api_validation = api_authentication($apikey,$username,$password,$provider_id,$conn);
    if ($api_validation == "Ok"){
        echo $results = selectQuery("",$conn);
    }else{
        echo $api_validation;
    }
}else if ($METHOD == "GET_SHIPMENT_PACKAGE"){
    $apikey =trim($decoded['APIKEY']);
    $username =trim($decoded['USERNAME']);
    $password =trim($decoded['PASSWORD']);
    $provider_id =trim($decoded['PROVIDERID']);

    $tracking_no =trim($decoded['TRACKING_NO']);
    $api_validation = api_authentication($apikey,$username,$password,$provider_id,$conn);
    if ($api_validation == "Ok"){
        echo $results = selectQuery("SELECT * FROM `package` WHERE tracking_no = '$tracking_no'",$conn);
    }else{
        echo $api_validation;
    }
}else if ($METHOD == "GET_SHIPMENT_ACTIVITES"){
    $apikey =trim($decoded['APIKEY']);
    $username =trim($decoded['USERNAME']);
    $password =trim($decoded['PASSWORD']);
    $provider_id =trim($decoded['PROVIDERID']);
    $package_id =trim($decoded['PACKAGE_ID']);
    $api_validation = api_authentication($apikey,$username,$password,$provider_id,$conn);
    if ($api_validation == "Ok"){
        echo $results = selectQuery("SELECT * FROM `activity` WHERE package_id = '$package_id' GROUP BY date",$conn);
    }else{
        echo $api_validation;
    }
}else if ($METHOD == "GET_SHIPMENT_ACTIVITES_DETAILS"){
    $apikey =trim($decoded['APIKEY']);
    $username =trim($decoded['USERNAME']);
    $password =trim($decoded['PASSWORD']);
    $provider_id =trim($decoded['PROVIDERID']);
    $package_id =trim($decoded['PACKAGE_ID']);
    $activity_time = $decoded['DATE'];
    $api_validation = api_authentication($apikey,$username,$password,$provider_id,$conn);
    if ($api_validation == "Ok"){
        echo $results = selectQuery("SELECT * FROM `activity` WHERE package_id = '1' AND `date`='$activity_time'",$conn);
    }else{
        echo $api_validation;
    }
}
?>