<?php
/*Connect using SQL Server authentication.*/
$serverName = "tcp:theatrenow.database.windows.net,1433";
$connectionOptions = array("Database"=>"TheatreNow",
                           "UID"=>"grapesandbananas",
                           "PWD" => "Apples&Oranges");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];phone



$venue = $_POST["card"];
$seat = $_POST["date"];
$ticket = $_POST["cvv"];

$tsql = "INSERT INTO Applications
VALUES ('$name', '$email', '$phone', '$venue', '$seat', '$ticket')";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

header("Location: https://theatrenow.azurewebsites.net/consumer/home.html"); /* Redirect browser */
exit();
?>
