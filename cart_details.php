<?php
include 'includes/session.php';
$conn = $pdo->open();

$output = '';

if(isset($_SESSION['user'])){
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $row){
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE userId=:userId AND pId=:product_id");
			$stmt->execute(['userId'=>$user['userId'], 'product_id'=>$row['productid']]);
			$crow = $stmt->fetch();
			if($crow['numrows'] < 1){
				$stmt = $conn->prepare("INSERT INTO cart (userId, productId, quantity) VALUES (:userId, :product_id, :quantity)");
				$stmt->execute(['userId'=>$user['userId'], 'product_id'=>$row['productid'], 'quantity'=>$row['quantity']]);
			}
			else{
				$stmt = $conn->prepare("UPDATE cart SET quantity=:quantity WHERE userId=:userId AND pId=:product_id");
				$stmt->execute(['quantity'=>$row['quantity'], 'userId'=>$user['userId'], 'product_id'=>$row['productid']]);
			}
		}
		unset($_SESSION['cart']);
	}

	try{
		$total = 0;
		$stmt = $conn->prepare("SELECT *, cart.cartId AS cartid, product.photo AS pPhoto, cart.quantity FROM cart LEFT JOIN product ON product.pId=cart.pId WHERE cart.userId=:user");

		$stmt->execute(['user'=>$user['userId']]);
		foreach($stmt as $row){
			$image = (!empty($row['pPhoto'])) ? 'images/'.$row['pPhoto'] : 'images/noimage.jpg';
			$subtotal = $row['price']*$row['quantity'];
			$total += $subtotal;
			$output .= "
			<tr>
			<td><button type='button' data-id='".$row['cartid']."' class='btn btn-danger btn-flat cart_delete'><i class='fas fa-trash'></i></button></td>
			<td><img src='".$image."' width='30px' height='30px'></td>
			<td>".$row['pName']."</td>
			
			<td>UGX ".number_format($row['price'], 0)."</td>
			<td class='input-group'>
			<span class='input-group-btn'>
			<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['cartid']."'><i class='fa fa-minus'></i></button>
			</span>
			<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['cartid']."'>
			<span class='input-group-btn'>
			<button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['cartid']."'><i class='fa fa-plus'></i>
			</button>
			</span>
			</td>
			<td>UGX ".number_format($subtotal, 2)."</td>
			</tr>
			";
		}
		$output .= "
		<tr>
		<td colspan='4' align='right'></td>
		<td><b>Total amout payable</b></td>
		<td><b>UGX ".number_format($total, 2)."</b></td>

		<tr>
		";

	}
	catch(PDOException $e){
		$output .= $e->getMessage();
	}

}
else{
	if(count($_SESSION['cart']) != 0){
		$total = 0;
		foreach($_SESSION['cart'] as $row){
			$stmt = $conn->prepare("SELECT *, product.pName AS prodname FROM product WHERE product.pId=:id");
			$stmt->execute(['id'=>$row['productid']]);
			$product = $stmt->fetch();
			$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
			$subtotal = $product['price']*$row['quantity'];
			$total += $subtotal;
			$output .= "
			<tr>
			<td><button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat cart_delete'><i class='fas fa-trash'></i></button></td>
			<td><img src='".$image."' width='30px' height='30px'></td>
			<td>".$product['prodname']."</td>	
			<td>UGX ".number_format($product['price'], 0)."</td>
			<td class='input-group'>
			<span class='input-group-btn'>
			<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['productid']."'><i class='fa fa-minus'></i></button>
			</span>
			<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['productid']."'>
			<span class='input-group-btn'>
			<button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['productid']."'><i class='fa fa-plus'></i>
			</button>
			</span>
			</td>
			
			<td>UGX ".number_format($subtotal, 2)."</td>
			</tr>
			";

		}

		$output .= "
		<tr>
		<td colspan='4' align='right'></td>
		<td><b>Total amout payable </b></td>
		<td><b>UGX ".number_format($total, 2)."</b></td>
		<tr>
		";
	}

	else{
		$output .= "
		<tr>
		<td colspan='6' align='center'>Shopping cart empty</td>
		<tr>
		";
	}

}

$pdo->close();
echo json_encode($output);

?>

