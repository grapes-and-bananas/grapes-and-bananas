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
echo $email;
echo $username;
echo $password;
echo $type;


header("Location: https://theatrenow.azurewebsites.net/main/signup.html"); /* Redirect browser */
exit();
?>
