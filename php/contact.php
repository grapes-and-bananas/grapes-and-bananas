<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["subject"];

$serverName = "tcp:theatrenow.database.windows.net,1433";
$connectionOptions = array("Database"=>"TheatreNow",
                           "UID"=>"grapesandbananas",
                           "PWD" => "Apples&Oranges");

$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
   die(print_r(sqlsrv_errors(), true));
}

$tsql = "INSERT INTO Contact
VALUES ('$name', '$email', '$message)";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

header("Location: https://theatrenow.azurewebsites.net/main/contact.html"); /* Redirect browser */
exit();
?>
