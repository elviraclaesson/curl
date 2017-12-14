<form action="customers2.php" method="get">
    <input name="customer_id" type="number">
    <input type="submit" value="Sök id"/>
</form>

<?php
require('config.php');

$pdo = new PDO('mysql:host=localhost;dbname=uppgift2', 'root', 'root', [

]);
$customerId = $_GET['customer_id'];
$stmt = $pdo->prepare('SELECT * FROM customers WHERE id = :id');
$stmt->execute([':id' => $customerId]);
$response = $stmt->fetch();
$status = 200;
if ($response == null) {
	$status = 200;
	$response = ["message" => "Customer not found"];
}

echo json_encode($response);

?>