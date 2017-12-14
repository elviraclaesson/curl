<form action="customers6.php" method="get">
    <input name="company_id" type="number">
    <input type="submit" value="Sök id"/>
</form>

<?php
require('config.php');

$id = $_GET['company_id'];

$stm_select = $pdo->prepare("SELECT * FROM `customers` WHERE `company_id` = $id");
$stm_select->execute([]);
$result = $stm_select->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);

echo $json;