
<?php require_once('../../../system/config.php'); ?>
<?php

$fdate = $_GET['d1'];
$tdate = $_GET['d2'];
$interface = $_GET['interface'];
$resultv = $db->prepare("SELECT * FROM bandwidth_consumption WHERE interface='$interface' AND STR_TO_DATE(datetime, '%Y-%m-%d') >= STR_TO_DATE('$fdate', '%Y-%m-%d') AND STR_TO_DATE(datetime, '%Y-%m-%d') <= STR_TO_DATE('$tdate', '%Y-%m-%d') ");

$resultv->execute();
$up = array();
$down = array();
for ($i = 0; $row = $resultv->fetch(); $i++) {
    $down['rx'][$i] = $row['rx'];
    $up['tx'][$i] = $row['tx'];
}
$result = array();
array_push($result, $down);
array_push($result, $up);
print json_encode($result, JSON_NUMERIC_CHECK);
?>
