<?php
header("Content-Type:application/json");

// If we get here, username was provided. Check password.
if (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER']=='apiuser' &&  $_SERVER['PHP_AUTH_PW']=='777') {
    if (isset($_GET['token']) && $_GET['token']=="123") {
        // Enter your Host, username, password, database below.
        $con = mysqli_connect("localhost","root","","test");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();  
        }
        $result = mysqli_query(
        $con,
        "SELECT * FROM `calculator_history`");
        if(mysqli_num_rows($result)>0) {
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
            response(200,"Records Found",$rows);
            mysqli_close($con);
        }else{
            response(200,"No Record Found",NULL);
        }
    }else{
        response(400,"Invalid Request",NULL);
    }

} else {
    header('WWW-Authenticate: Basic realm="My Website"');
    header('HTTP/1.0 401 Unauthorized');
    // User will be presented with the username/password prompt
    // If they hit cancel, they will see this access denied message.
    echo '<p>Access denied.</p>';
    exit; // Be safe and ensure no other content is returned.
}

    
function response($status,$status_message,$data) {
	header("HTTP/1.1 ".$status);
	
	$response['status']         = $status;
	$response['status_message'] = $status_message;
	$response['data']           = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>