


<?php

$customerID = $_POST["c_id"];

$conn = mysqli_connect("localhost","root","","first") or die("Connection Failed");

$sql = "DELETE FROM customers WHERE customerID = {$customerID}";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

if(mysqli_query($conn,$sql)){

    echo 1;

}else{

    echo 0;
}



?>