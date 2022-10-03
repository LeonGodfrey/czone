<?php
session_start();
include 'includes/DbAccess.php';
$db =  new DbAcess();


//die("am here");
$bodaDetails = array();
function checkNUll($total)
{
    if ($total == NULL) {
        return intval(0);
    } else {

        return  intval($total);
    }
}

$bodaUsersDetails = [];

$totalfarmers  = $db->selectQuery("SELECT COUNT(userId) AS total FROM user WHERE type='farmer' ")[0]['total'];
$totalagents  = $db->selectQuery("SELECT COUNT(userId) AS total FROM user WHERE type='agent' ")[0]['total'];
$totaladmins  = $db->selectQuery("SELECT COUNT(userId) AS total FROM user WHERE type='admin' ")[0]['total'];
$totalcustomers  = $db->selectQuery("SELECT COUNT(userId) AS total FROM user WHERE type='customer' ")[0]['total'];
//$dbAccess->selectQuery("SELECT COUNT(bodaUserStatus) AS total FROM bodauser  WHERE  DATE(updated_at) = CURDATE() AND bodaUserStatus=2")[0]['total'];


array_push($bodaDetails, array("data" => checkNUll($totalfarmers)));
array_push($bodaDetails, array("data" => checkNUll($totalagents)));
array_push($bodaDetails, array("data" => checkNUll($totaladmins)));
array_push($bodaDetails, array("data" => checkNUll($totalcustomers)));


echo json_encode($bodaDetails);

