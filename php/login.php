<?php
/*Validate Username*/
if((!empty($_POST["username"])) && (is_numeric($_POST["username"]))) {
/*Gather connection and authentication data*/
$serverName = "tcp:theatrenow.database.windows.net,1433";
$connectionOptions = array("Database"=>"TheatreNow",
                           "UID"=>"grapesandbananas",
                           "PWD" => "Apples&Oranges");
$username = $_POST["username"];
$password = $_POST["password"];

/*Connect to server*/
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn === false)
{
    die(print_r(sqlsrv_errors(), true));
}
else{


$tsql = "SELECT userName FROM Users
WHERE userName = '$username'
AND password = '$password'";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

}
} else {
echo "User ID not specified or invalid.";
header("Location: https://theatrenow.azurewebsites.net/main/home.html"); /* Redirect browser */
exit();
}
?>
