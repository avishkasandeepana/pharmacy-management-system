<?php
require "conn.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['query'])){
    $inpText=$_POST['query'];
    $query="SELECT customer_name FROM customer WHERE customer_name LIKE '%inputText%'";
    $result = $conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action'>".$row['customer_name']."</a>";
        }
    }else{
        echo "<p class='list-group-item border-1'>NO records</p>";
    }

}
?>
