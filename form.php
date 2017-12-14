<?php

require(__DIR__.'/config.php');


if ($_POST) {
    $fnamn = $_POST['fnamn'];
    $enamn = $_POST['enamn'];
    $epost = $_POST['epost'];
    $meddelande = $_POST['meddelande'];
    $data = array(':firstname' => $fnamn, ':lastname' => $enamn, ':epost' => $epost, ':meddelande' => $meddelande);
    $sql = "INSERT INTO form (first_name, last_name, email, message)
    VALUES (:firstname, :lastname, :epost, :meddelande)";
    $intoDb = $pdo->prepare($sql);
    $success = $intoDb->execute($data); 
}


?>


<form id="form" name="form" method="post" action="form.php">

    <fieldset style="width: 450px;">
        <legend>FORMULÄR FÖR ATT SKICKA MEDDELANDE</legend>

        <label for="fnamn">Förnamn:</label> <br />
        <input type="text" name="fnamn" id="fnamn" /> <br />
        <label for="enamn">Efternamn:</label> <br />
        <input type="text" name="enamn" id="enamn" /> <br />
        <label for="epost">E-postadress:</label> <br />
        <input type="text" name="epost" id="epost" /> <br />
        <label for="meddelande">Meddelande:</label> <br />
        <textarea name="meddelande" id="meddelande" cols="45" rows="5"></textarea> <br />
        <label for="skicka"></label>
        <input type="submit" name="skicka" id="skicka" value="Skicka meddelandet" />

    </fieldset>

</form>