<?php
$username="root";
$password="";
$host="localhost";
$dbname="concept";
$con = mysqli_connect($host, $username, $password, $dbname);
if($con==true)
{
    // echo "Success";
}
else
{
    mysql_close($con);
}
?>