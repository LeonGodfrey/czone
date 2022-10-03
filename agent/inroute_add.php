<?php
	include 'includes/session.php';
	include 'includes/DbAcess.php';

	$db = new DbAcess();

	if(isset($_POST['save'])){
				
        $id = $_POST['id'];	

		//get order orders
		$order_details = $db->select('pOrder', [], ['orderID' => $id]);
		//oder number
		$order_number = $order_details[0]['orderNo'];
		//order name
		$order_name = $order_details[0]['pName'];
		//get customer Id
		$customerID = $order_details[0]['userIDC'];
		//get customer details
		$customer_details = $db->select('user', [], ['userID' => $customerID]);
		//get customer name
		$name = $customer_details[0]['name'];
		//get customer phone
		 $phone_cus = $customer_details[0]['phone'];

		 //send message to customer
		 $message_cus = "Hello $name, your order is currenlty in route!! Please wait for your delivery. Thank you for using the Chicken zone application.";
		 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sms.thinkxsoftware.com/smsdashboard/views/api/send_message.php?message='.urlencode($message_cus).'&sender_id=kayondo&phone_number='.$phone_cus.'&api_key=b86d0f23e195ac0daace2ebd88a6c5984e9d3e7edb7ec399ca6f45015b26f431',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

		 //get farmer Id
		 $farmerID = $order_details[0]['userIDF'];
		 //get farmer details
		 $farmer_details = $db->select('user', [], ['userID' => $farmerID]);
		 //get farmer name
		 $farmer_name = $farmer_details[0]['name'];
		 //get farmer phone
		  $farmer_phone = $farmer_details[0]['phone'];
		  //send message to farmer
		  $farmer_message = "Hello $farmer_name, The $order_number with $order_name is on route to the customer. Thank you for using the Chicken zone application.";

		  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sms.thinkxsoftware.com/smsdashboard/views/api/send_message.php?message='.urlencode($farmer_message).'&sender_id=kayondo&phone_number='.$farmer_phone.'&api_key=b86d0f23e195ac0daace2ebd88a6c5984e9d3e7edb7ec399ca6f45015b26f431',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
curl_close($curl);
	

    
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE pOrder SET status=:status WHERE orderId=:id");
				$stmt->execute(['status'=>'inroute', 'id'=>$id]);

				$_SESSION['success'] = 'Order in route!';
				header('location: inroute.php');
                exit();
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
        }
	header('location: placed.php');

?>