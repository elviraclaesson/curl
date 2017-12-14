<form action="customers3.php" method="get">
    <input name="id" type="number">
    <input type="submit" value="Sök id"/>
</form>

<?php
require('config.php');

if (isset($_GET['id'])) {
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
}