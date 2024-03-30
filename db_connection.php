<!-- this is common database connection file imported where we wanna connection of database -->
<?php
 $userName="root";
             
 $serverName="localhost";
$dbName="tourisom management";
$con=mySqli_connect($serverName,$userName,"",$dbName);
?>