<?php
require_once ('function/function.php');
if (isset($_POST['track_package'])){
    $provider_id = '493';
    $apiKey = 'abaa6ba8663295bd60df9b8941484d31';
    $username = 'ship_tracker';
    $password = 'PAR9DT';
    $tracking_no = validateUserInputs($_POST['tracking_no']);
    $GET_SHIPMENT_PACKAGE = array(
        'METHOD' => urlencode('GET_SHIPMENT_PACKAGE'),
        'APIKEY' => $apiKey,
        'USERNAME' => $username,
        'PASSWORD' =>$password ,
        'PROVIDERID' => $provider_id,
        'TRACKING_NO' => $tracking_no,
    );
    $get_shipment = APICall($GET_SHIPMENT_PACKAGE);
    $get_shipment_json = json_decode($get_shipment,"true");
    $getResult = $get_shipment_json['RESULT'];
    //print_r($GET_SHIPMENT_PACKAGE);
    if ($getResult == "" || is_null($getResult)){
        echo $get_shipment_json['STATMSG'];
    }else{
        foreach ($getResult as $getResults){
            $package_id = $getResults['id'];
            $tracking_no1 = $getResults['tracking_no'];
            $dateRequested = $getResults['date_created'];
            $dateRequested1 = date("jS F Y ", strtotime($dateRequested));
            $country = $getResults['from_country'];
            $city = $getResults['from_city'];
            $address = $getResults['from_address'];
            $destination_country = $getResults['destination_country'];
            $destination_city = $getResults['destination_city'];
            $destination_address = $getResults['destination_address'];
            $receiver = $getResults['receiver_name'];
            $weights = $getResults['weight'];
            $shipment_type = $getResults['shipment_type'];
            $package_status = $getResults['package_status'];
        }
    }

    $GET_SHIPMENT_ACTIVITIES = array(
        'METHOD' => urlencode('GET_SHIPMENT_ACTIVITES'),
        'APIKEY' => $apiKey,
        'USERNAME' => $username,
        'PASSWORD' => $password,
        'PROVIDERID' => $provider_id,
        'PACKAGE_ID' => $package_id,
    );
    $get_shipment_activities = APICall($GET_SHIPMENT_ACTIVITIES);
    $get_shipment_activities_json = json_decode($get_shipment_activities,"true");
    $getResult_activities = $get_shipment_activities_json['RESULT'];
    //print_r($get_shipment_activities);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Expect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/467085cb8c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <nav>
            <div class="nav">
                <div class="logo-section">
                    <h2 class="logo-text">Track Expert</h2>
                </div>
                <div class="menu-items">
                    <li class="menu-item">
                        <span>
                            Quick Start
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            Tracking
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            Shipping
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            Services
                        </span>
                    </li>
                    <li class="menu-item">
                        <span>
                            About
                        </span>
                    </li>
                </div>
            </div>
        </nav>
        <h2 class="page-title"><i class="fas fa-sliders-h"></i> Track Package</h2>
        <div class="container">
            <div class="track-number">
                #<?php echo $tracking_no1 ?>
            </div>
            <div class="sub-container">
                <div class="card p-5">
                    <div class="status-title">
                        Picked Up
                    </div>
                    <div class="status-date">
                        <?php echo $dateRequested1 ?>
                    </div>
                    <hr class="line">
                    <div class="status-description">
                        <div class="from">
                            <div class="sd-title">From</div>
                            <div class="
                            sd-description-from"><?php echo ucwords($address) ?> <br><?php echo $city.','.$country ?></div>
                        </div>
                        <div class="to">
                            <div class="sd-title">To</div>
                            <div class="sd-description-to"> <?php echo strtoupper($destination_country) ?>, <?php echo $destination_address ?> <br><?php echo $destination_country ?></div>
                        </div>

                    </div>
                </div>
                
                    <div class="card">
                        <div class="card-flex">
                            <div class="card-flex-item">
                                <div class="cf-title">Receiver Information</div>

                                <div class="cf-description">
                                    <?php echo strtoupper($receiver) ?>
                                </div>
                            </div>
                            <div class="card-flex-item">
                                <div class="cf-title">Weight</div>

                                <div class="cf-description">
                                    <?php echo $weights ?> lbs
                                </div>
                            </div>
                            <div class="card-flex-item">
                                <div class="cf-title">Service</div>

                                <div class="cf-description">
                                    <?php echo $shipment_type ?>
                                </div>
                            </div>
                            <div class="card-flex-item">
                                <a href="#" class="btn btn-md btn-primary"> Update Package Info</a>
                            </div>

                        </div>
                    </div>
                
            </div>
            <div class="card activity p-5">
                <div class="spotlight-title">
                    Spotlights
                </div>
                <div class="spotlight-container">
                    <div class="sp-item">
                        <div class="sp-icon active"><i class="fas fa-cube"></i></div>
                        <div class="sp-box">
                            <div class="sp-desc <?php if ($package_status == "SHIPMENT ARRIVED"){echo "active";} ?>">
                                Shipment Arrived
                            </div>
                            <div class="sp-time <?php if ($package_status == "SHIPMENT ARRIVED"){echo "active";} ?>">
                                10:00 AM
                            </div>
                        </div>
                    </div>

                    <div class="sp-item">
                        <div class="sp-icon "><i class="fas fa-plane-departure"></i></div>
                        <div class="sp-box">
                            <div class="sp-desc">
                                Depature scan: airport
                            </div>
                            <div class="sp-time">
                                07:01 PM
                            </div>
                        </div>
                    </div>

                    <div class="sp-item">
                        <div class="sp-icon "><i class="fas fa-plane-arrival"></i></div>
                        <div class="sp-box">
                            <div class="sp-desc">
                                Arrival scan: airport
                            </div>
                            <div class="sp-time">
                                07:01 PM
                            </div>
                        </div>
                    </div>

                    <div class="sp-item">
                        <div class="sp-icon "><i class="fas fa-user-shield"></i></div>
                        <div class="sp-box">
                            <div class="sp-desc">
                                Customs Inspection
                            </div>
                            <div class="sp-time">
                                07:01 PM
                            </div>
                        </div>
                    </div>

                    <div class="sp-item">
                        <div class="sp-icon "><i class="fas fa-cube"></i></div>
                        <div class="sp-box">
                            <div class="sp-desc">
                                Shipment Arrived
                            </div>
                            <div class="sp-time">
                                07:01 PM
                            </div>
                        </div>
                    </div>


                    <div class="sp-item">
                        <div class="sp-icon "><i class="fas fa-shipping-fast"></i></div>
                        <div class="sp-box last">
                            <div class="sp-desc">
                                Delivered
                            </div>
                            <div class="sp-time">
                                07:01 PM
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="activity-detail">
                <div class="spotlight-title mb-3">Activity</div>





                <div class="activity-table">
                    <?php
                    if ($getResult_activities == "" || is_null($getResult_activities)){
                        echo $get_shipment_activities_json['STATMSG'];
                    }else{
                    foreach ($getResult_activities as $getResults_activities){
                    $activity_id = $getResults_activities['id'];
                    $dateRequested = $getResults['date_time_created'];
                    $location = $getResults_activities['location'];
                    $description = $getResults_activities['description'];
                    $item_date = $getResults_activities['date'];
                    $dateRequested1 = date("jS F Y ", strtotime($item_date))
                    //print_r($getResult_activities);
                    ?>
                    <table class="table mb-5">
                        <thead class="table-secondary">
                            <tr>
                                <th><?Php echo $dateRequested1 ?></th>
                                <th>Location</th>
                                <th>Time</th>
                            </tr>
                            
                        </thead>

                        <tbody>
                        <?php
                                $GET_SHIPMENT_ACTIVITIES_DETAILS = array(
                                    'METHOD' => urlencode('GET_SHIPMENT_ACTIVITES_DETAILS'),
                                    'APIKEY' => $apiKey,
                                    'USERNAME' => $username,
                                    'PASSWORD' => $password,
                                    'PROVIDERID' => $provider_id,
                                    'DATE' => $item_date,
                                );
                                $get_shipment_activities_details = APICall($GET_SHIPMENT_ACTIVITIES_DETAILS);
                                $get_shipment_activities_json_details = json_decode($get_shipment_activities_details,"true");
                                $getResult_activities_details = $get_shipment_activities_json_details['RESULT'];
                                //print_r($get_shipment_activities_details);
                                foreach ($getResult_activities_details as $getResult_activities_detailss){
                                    $location_details = $getResult_activities_detailss['location'];
                                    $description_details = $getResult_activities_detailss['description'];
                                    $dateRequested_details = $getResults['date_time_created'];
                                    $dateRequested1_details = date("H:i:s", strtotime($dateRequested_details));
                                    //print_r($get_shipment_activities_details);
                            ?>
                            <tr>
                                <td><?php echo $description_details ?></td>
                                <td> <?php echo $location_details ?> </td>
                                <td><?php echo $dateRequested1_details ?></td>
                            </tr>
                                <?php
                                }
                                 ?>
                        </tbody>
                    </table>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <div class="footer-grid">
            <div class="footer-item">
                <div class="footer-item-title">Help Center</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-item-title">Customer Services</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
            <div class="footer-item">
                <div class="footer-item-title">Company Info</div>
                <div class="footer-item-list">
                    <li>Contact Us</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                    <li>Customer Portal Login</li>
                    <li>Developer Portal</li>
                </div>
            </div>
        </div>
        <div class="copyright">2021 © Track Expert. All rights reserved.</div>
    </div>
</body>

</html>