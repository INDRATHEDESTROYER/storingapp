<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$prioriteit = $_POST['prioriteit'];
$overige_info = $_POST['overige_info'];

if(isset($_POST['prioriteit']))
{
 $prioriteit = 1;
}
else
{
    $prioriteit = 0;
}

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, melder, capaciteit, prioriteit, overige_info)
VALUES(:attractie, :type, :melder, :capaciteit, :prioriteit, :overige_info)";

//3. Prepare
$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":melder" => $melder,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overige_info,
]);

//4. Execute

header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");