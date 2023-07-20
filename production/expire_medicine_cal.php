<!-- expire soon medicine calculation -->
<?php  
function calculate_expiresoon(){
    require 'conn.php';
    // set the data range
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('+2 month'));

    // perform the database query
    $query = "SELECT * FROM medicine WHERE expire_date BETWEEN '$startDate' AND '$endDate' ";
    $result = mysqli_query($conn, $query);

    // set array to save result
    $soonExpiringMedicine = array();

    // process query result
    while ($row = mysqli_fetch_assoc($result)){
        $medicine_name = $row['product_name'];
        $form  = $row['form'];
        $company_name= $row['company_name'];
        $strength = $row['strength'];
        $quantity = $row['quantity'];
        $expiring_date = $row['expire_date'];

        // add the medicine details to the result array
        $soonExpiringMedicine[]=array(
            'product_name' => $medicine_name,
            'form' => $form ,
            'company_name' =>$company_name,
            'strength' => $strength,
            'quantity'=> $quantity ,
            'expire_date'  => $expiring_date
        );
    }

    // return the results
    return $soonExpiringMedicine;
}

$soonExpiringMedicine = calculate_expiresoon();
/*  this is how print the expire soon medicine 
// check if there are soon expiring medicines
if (!empty($soonExpiringMedicine)) {
    foreach ($soonExpiringMedicine as $medicine) {
        echo "Medicine Name: " . $medicine['product_name'] . "<br>";
        echo "Expiration Date: " . $medicine['expire_date'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No soon expiring medicines found.";
}

*/

?>
<!-- end of calculation -->