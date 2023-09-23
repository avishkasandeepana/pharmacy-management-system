<?php

$conn= mysqli_connect("localhost","root","","ayurvedic1");

if(!$conn){
    die("there is an database connection error".mysqli_connect_error());
}else{
     //echo "db connection successfull";
}

?>
