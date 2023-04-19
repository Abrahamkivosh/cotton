
<?php require_once('../../../system/controllers/routeros_api.class.php'); ?>
<?php require_once('../../../system/config.php'); ?>
<?php

$result = $db->prepare("SELECT * FROM tbl_routers ");
$result->execute();
$row = $result->fetch();
$ipRouteros = $row['ip_address'];
$Username = $row['username'];
$Pass = $row['password'];
$api_puerto = 8728;
$interface = $_GET["interface"];

$API = new routeros_api();
$API->debug = false;
if ($API->connect($ipRouteros, $Username, $Pass, $api_puerto)) {
    $rows = array();
    $rows2 = array();
    $API->write("/interface/monitor-traffic", false);
    $API->write("=interface=" . $interface, false);
    $API->write("=once=", true);
    $READ = $API->read(false);
    $ARRAY = $API->parse_response($READ);
    if (count($ARRAY) > 0) {
        $rx = number_format($ARRAY[0]["rx-bits-per-second"] / (1024*1024), 1);
        $tx = number_format($ARRAY[0]["tx-bits-per-second"] / (1024*1024), 1);
        $rows['name'] = 'Tx';
        $rows['data'][] = $tx;
        $rows2['name'] = 'Rx';
        $rows2['data'][] = $rx;
    } else {
        echo $ARRAY['!trap'][0]['message'];
    }
} else {
    
}
$API->disconnect();

$result = array();
array_push($result, $rows);
array_push($result, $rows2);
print json_encode($result, JSON_NUMERIC_CHECK);
?>
