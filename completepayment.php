<?php
include 'includes/DbAccess.php';
$db = new DbAcess();

//select from payment table where status is pending
$pending_payments = $db->select('payment', [], ['status' => 'pending']);
//loop through the pending payments
foreach($pending_payments as $payment){
    
}