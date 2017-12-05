<!DOCTYPE html>
<html>

<style>
	body{
	background-color: #d3d3d3
	}
</style>


<body>

<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$user = $_POST['email'];
$passwd = $_POST['password'];


$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "login";
$request['username'] = "$user";
$request['password'] = "$passwd";
$response = $client->send_request($request);


if ($response['returnCode'] == 0)
{
	header('Location: userProfile.php');
}
else{
        print_r($response);
        echo "\n\n";
}


?>


</body>

</html>

