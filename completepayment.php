<?php
include 'includes/DbAccess.php';
$db = new DbAcess();

//cron job
//$db->insert('checker', ['checker' => 'success']);

//select from payment table where status is pending
$pending_payments = $db->select('payments', [], ['status' => 'pending']);
//loop through the pending payments
foreach($pending_payments as $payment){

 //get payment reference
    $ref = $payment['transaction_ref'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://wallet.ssentezo.com/api/get_status/'.$ref,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic NjExYjI2YzQtMmM2Yy00MDdjLWFlMjQtYzg2MDI5NDM0YjA0OjBiNzA2MmExNWZjOWE4NDE3ZDI1YmU4YmNmZGUxMWFj',
    'Cookie: PHPSESSID=hjna7bvnlv06o4qnne1a7usjj0'
  ),
));

$response = curl_exec($curl);
//decode the response
$response = json_decode($response, true);
//check if status is set
if(isset($response['status'])){

     
    //if status is success
    if($response['status'] == 'SUCCEEDED'){
        //update the payment status to success
        $db->update('payments', ['status' => 'success'], ['transaction_ref' => $ref]);
    }
    elseif($response['status'] == 'FAILED'){
        //update the payment status to failed
        $db->update('payments', ['status' => 'failed'], ['transaction_ref' => $ref]);
    }
    else{
        //update the payment status to pending
        $db->update('payments', ['status' => 'pending'], ['transaction_ref' => $ref]);
    }
}





}