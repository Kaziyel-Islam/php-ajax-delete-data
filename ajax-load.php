


<?php


$conn = mysqli_connect("localhost","root","","first") or die("Connection Failed");

$sql = "SELECT * FROM customers";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

$output = "";

if(mysqli_num_rows($result) > 0){

     $output =' <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th width="100px">Delete</th>
            </tr>
            </thead>';

            while($row = mysqli_fetch_assoc($result)){

                $output .= "<tbody>
            <tr>
                <td>{$row['customerId']}</td>
                <td>{$row['customerName']}</td>
                <td><button class='delete-btn' data-id='{$row['customerId']}'>Delete</button></td>
            </tr>
        
            </tbody>";

            }

            $output .= "</table>";
           
            mysqli_close($conn);

            echo $output;

}else{

    echo "<h2>NO Record Found</h2>";

};












?>