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
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$type = $_POST["type"];

echo "PHP CODE";
echo "\n";
echo $username;
echo "\n";
echo $email;
echo "\n";
echo $password;
echo "\n";
echo $type;
echo "\n";

$tsql = "INSERT INTO Users
VALUES ('$username', '$email', '$password', '$type')";

$getResults= sqlsrv_query($conn, $tsql);

sqlsrv_free_stmt($getResults);

header("Location: https://theatrenow.azurewebsites.net/main/signup.html"); /* Redirect browser */
exit();
?>
