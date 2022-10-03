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

$pending  = $db->selectQuery("SELECT COUNT(id) AS total FROM payments WHERE status='pending' ")[0]['total'];
$completed  = $db->selectQuery("SELECT COUNT(id) AS total FROM payments WHERE status='completed' ")[0]['total'];
$failed = $db->selectQuery("SELECT COUNT(id) AS total FROM payments WHERE status='failed'")[0]['total'];



array_push($bodaDetails, array("data" => checkNUll($pending)));
array_push($bodaDetails, array("data" => checkNUll($completed)));
array_push($bodaDetails, array("data" => checkNUll($failed)));



echo json_encode($bodaDetails);

