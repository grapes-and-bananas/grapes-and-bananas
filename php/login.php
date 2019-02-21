<?php
/*Validate Username*/
if((!empty($_POST["username"]))) {
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
  }else{

    /*Incorporate bind_param or prepare for secure connections*/
    $tsql = "SELECT userName FROM Users
    WHERE userName = '$username'
    AND password = '$password'";

    $getResults = sqlsrv_query($conn, $tsql);
    $rows = sqlsrv_has_rows($getResults);
    if( $getResults === false ) {
         die( print_r( sqlsrv_errors(), true));
    }

    if($rows != 1){
      echo "User ID not specified or invalid.";
      header("Location: https://theatrenow.azurewebsites.net/index.html"); /* Redirect browser */
    }else{
      sqlsrv_free_stmt($getResults);
      // Store Session Data
      $_SESSION['user']= $username;

      header("Location: https://theatrenow.azurewebsites.net/main/home.html"); /* Redirect browser */
    }
  }
}else {
echo "User ID not specified or invalid.";
header("Location: https://theatrenow.azurewebsites.net/index.html"); /* Redirect browser */
exit();
}
?>
