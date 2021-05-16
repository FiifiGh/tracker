<?php
//include ("../Connections/constants.php");
////////////// MESSAGES ///////////////////
/// 200 Success///
$success_code = '200';
$success_msg = 'Success';

/// 500 Server Error////
$Server_error_code = '500';
$Server_error_msg = 'Server Error';

//// 400 //////////////////
$invalid_request_code = '400';
$invalid_request_msg = 'INVALID REQUEST';

/////////// 404 ////////////////////
$no_data_code = '404';
$no_data_msg = 'NO DATA FOUND';


if(!function_exists("APICall")){
    function APICall($data){
        $ch = curl_init("http://localhost:90/tracker/API/index.php");
        $jsonDataEncoded = json_encode($data);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        return $result = curl_exec($ch);
        curl_close($ch);

    }}


# Validate User Input
function validateUserInputs($input){
    $data = trim($input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function checkInternet()
{
    $connected = @fsockopen("www.google.com", 80);
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}


if(!function_exists("api_authentication")){
    function api_authentication($apikey,$username,$password,$provider_id,$conn){
        $queryAuthenticate = "SELECT * FROM provider_details where provider_id=? and apikey=? and password=? and username=?";
        $queryPrepare = $conn->prepare($queryAuthenticate);
        $queryPrepare->execute(array($provider_id,$apikey,$password,$username));
        $totalRows= $queryPrepare->rowCount();

        if($totalRows>0){
            $authenticate = 'Ok';
        }else{
            $authenticate = "Inactive";
        }

        return $authenticate;


    }
}

if(!function_exists("selectQuery")){
    function selectQuery($query, $conn, $success_msg = 'Success', $Server_error_msg = 'Server Error', $invalid_request_msg = 'INVALID REQUEST',$no_data_msg = 'NO DATA FOUND'){
        try {
            $queryAuthenticate = "$query";
            $queryPrepare = $conn->prepare($queryAuthenticate);
            $queryPrepare->execute();
            $totalRows= $queryPrepare->rowCount();
            if($totalRows>0){
                $emparray = array();
                while ($row = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                    $emparray[] = $row;
                    $response = array(
                        "STATCODE" => '200',
                        "STATMSG" => $success_msg,
                        "RESULT" => $emparray,
                    );
                }
            }else{
                $response = array(
                    "STATCODE" => '404',
                    "STATMSG" => $no_data_msg
                );
            }
        } catch (Exception $e) {
            $response = array(
                "STATCODE" => $e,
                "STATMSG" => $Server_error_msg,
            );

        }
        return json_encode($response);
    }
}

if(!function_exists("insertStatement")){
    function insertStatement($table, $tableColumn, $valuesQuestion, $values, $conn, $success_msg = 'Success', $Server_error_msg = 'Server Error', $invalid_request_msg = 'INVALID REQUEST',$no_data_msg = 'NO DATA FOUND'){
        try {
            $queryAuthenticate = "INSERT INTO $table ($tableColumn) VALUES ($valuesQuestion)";
            $queryPrepare = $conn->prepare($queryAuthenticate);
            $queryPrepare->execute($values);
            $emparray = $conn->lastInsertId();
            $response = array(
                "STATCODE" => '200',
                "STATMSG" => $success_msg,
                "RESULT" => $emparray,
            );
        } catch (Exception $e) {
            $response = array(
                "STATCODE" => $e,
                "STATMSG" => $Server_error_msg,
            );
        }
        return json_encode($response);
    }
}
?>