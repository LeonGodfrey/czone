<?php
	include 'includes/session.php';
	include 'includes/DbAccess.php';

	$db = new DbAcess();

	if(isset($_POST['save'])){
		
		$agent = $_POST['agent'];
        $id = $_POST['id'];	

		//get user details
		$agent_details = $db->select('user', [], ['userID' => $agent]);
		//get agent name
		$name = $agent_details[0]['name'];
		//get agent phone
		$phone = $agent_details[0]['phone'];
		
		//format the phone number with 256


		//get order detials 
		$order_details = $db->select('pOrder', [], ['orderID' => $id]);
		//oder price
		$price = $order_details[0]['price'];
		//order quantity
		$quantity = $order_details[0]['quantity'];
		//order total
		$total = $order_details[0]['amount'];
		//order number
		$order_number = $order_details[0]['orderNo'];
		//order name
		$order_name = $order_details[0]['pName'];

		//generate  a message to send to the agent with there name and order details
		$message = "Hello $name, you have been assigned an order. Order number: $order_number, Order name: $order_name, Order quantity: $quantity, Order price: $price, Order total: $total. Thank you.";




$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sms.thinkxsoftware.com/smsdashboard/views/api/send_message.php?message='.urlencode($message).'&sender_id=kayondo&phone_number='.$phone.'&api_key=b86d0f23e195ac0daace2ebd88a6c5984e9d3e7edb7ec399ca6f45015b26f431',
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

//insert into notification table
		$notification = $db->insert('notification', 
		['agent_id' => $agent, 'message' => $message, 'agent_name' => $name, 'order_id' => $id, 
		'phone_number' => $phone, 'order_details' => $order_name, 
	]);
	

 


        


    
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE pOrder SET userIdD=:agent WHERE orderId=:id");
				$stmt->execute(['agent'=>$agent, 'id'=>$id]);

				$_SESSION['success'] = 'Asigned agent successfully';
				header('location: Placed.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
        }
	header('location: placed.php');

?>