<?php


require('config.php');

if (isset($_GET['id']) and isset($_GET['address']) == false) {
    $id = $_GET['id'];

    
    $stm_select->execute();
    $result = $stm_select->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($result, JSON_PRETTY_PRINT);

    if ($json == "[]") {
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404</h1><h2>Den här användaren finns inte.</h2>";
    } else {
        echo $json;
    }

} elseif (isset($_GET['address'])) {
    $id = $_GET['id'];

    $stm_address = $pdo->prepare("SELECT * FROM customers WHERE id = $id");
    $stm_address->execute();
    $result_address = $stm_address->fetchAll(PDO::FETCH_ASSOC);
    $json_address = json_encode($result_address, JSON_PRETTY_PRINT);

    echo $json_address;
}


