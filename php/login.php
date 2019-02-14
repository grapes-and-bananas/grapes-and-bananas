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
$username = $_POST["username"];
$password = $_POST["password"];

$tsql = "SELECT userName FROM Users
WHERE userName = '$username'
AND password = '$password'";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

header("Location: https://theatrenow.azurewebsites.net/main/shows.html"); /* Redirect browser */
exit();
?>
