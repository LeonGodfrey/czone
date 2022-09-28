<?php
include 'includes/session.php';
$conn = $pdo->open();

$output = array('list' => '', 'count' => 0);

if (isset($_SESSION['user'])) {
	try {
		$stmt = $conn->prepare("SELECT * FROM cart");
		$stmt->execute([]);
		foreach ($stmt as $row) {
			$output['count']++;
		}
	} catch (PDOException $e) {
		$output['message'] = $e->getMessage();
	}
} else {
	if (!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if (empty($_SESSION['cart'])) {
		$output['count'] = 0;
	} else {
		foreach ($_SESSION['cart'] as $row) {
			$output['count']++;
		}
	}
}

$pdo->close();
echo json_encode($output);
