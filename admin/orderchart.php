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

$placed  = $db->selectQuery("SELECT COUNT(orderId) AS total FROM porder WHERE status='placed' ")[0]['total'];
$assigned  = $db->selectQuery("SELECT COUNT(orderId) AS total FROM porder WHERE status='assigned' ")[0]['total'];




array_push($bodaDetails, array("data" => checkNUll($placed)));
array_push($bodaDetails, array("data" => checkNUll($assigned)));




echo json_encode($bodaDetails);

