


<?php 

$c_name = $_POST['customer_name'];

$c_number = $_POST['customer_number'];

$conn = mysqli_connect("localhost","root","","first") or die("Connection Failed");

$sql = "INSERT INTO customers(customerName,customerPhn) VALUES('{$c_name}',{$c_number})" ;

// $result = mysqli_query(mysql: $conn, $sql) or die("SQL Query Failed");

if(mysqli_query($conn,$sql)){

    echo 1;
}else{
    echo 0;
}


?>