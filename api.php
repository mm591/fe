<!DOCTYPE html>
<html>
<body>

<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$brandName = $_POST['brandName'];
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$request = array();
$request['type'] = "api";
$request['brandName'] = "$brandName";
$response = $client->send_request($request);
echo "client received response: ".PHP_EOL;
print_r($response);

?>

</body>
</html>
