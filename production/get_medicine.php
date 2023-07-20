<?php
require "conn.php";

// Retrieve the selected category_id from the AJAX request
if (isset($_POST['category_id'])) {
  $category_id = $_POST['category_id'];
  $search_query = $_POST['search_query'];

  // Query the database to get the medicine items for the selected category
  
  $query = "SELECT med_id, product_name, trade_price, quantity FROM medicine WHERE form = '$category_id' AND product_name LIKE '%$search_query%'";

  $result = mysqli_query($conn, $query);

  // Check if any rows are returned
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="col-md-4 medicine-item" onclick="addItemToTable(' . $row['med_id'] . ', \'' . $row['product_name'] . '\', ' . $row['trade_price'] . ', ' . $row['quantity'] . ')">';
      echo '<div class="card">';
      echo '<img class="card-img-top" src="' . $row['med_id'] . '" alt="' . $row['product_name'] . '">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $row['quantity'] . '</h5>';
      echo '<p class="card-text">Price: $' . $row['trade_price'] . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo "No medicine items found for the selected category";
  }
} else {
  echo "Category ID is not set";
}
?>
