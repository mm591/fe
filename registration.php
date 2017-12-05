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


$passwd = $_POST['password'];
$email = $_POST['email'];


$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "register";
$request['password'] = "$passwd";
$request['email'] = "$email";

$response = $client->send_request($request);

if ($response['returnCode'] == 1)
{
	header('Location: index.html');

}
else{
	print_r($response);
	echo "\n\n";

}

?>

</body>

</html>

