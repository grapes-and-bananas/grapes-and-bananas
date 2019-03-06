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
$phone = $_POST["phone"];
$venue = $_POST["venue"];
$seat = $_POST["seat"];
$ticket = $_POST["ticket"];
$weeks = $_POST["weeks"];
$fqcy = $_POST["fqcy"];
$revenue = $_POST["revenue"];
$income = $_POST["income"];
$comment = $_POST["comment"];
$agree = $_POST["agree"];+

$tsql = "INSERT INTO Contact
VALUES ('$name', '$email', '$phone', '$venue', '$seat', '$ticket', '$weeks', '$fqcy', '$revenue', '$income', '$comment')";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

header("Location: https://theatrenow.azurewebsites.net/main/home.html"); /* Redirect browser */
exit();
?>
