<?php
require 'index.php'; ?>
<?php require 'conn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Bootstrap 4 CSS link -->
  <style>
    .col-md-7 {
      width: 1000px;
      background-color: 0;
      height: 100%;
      /* Replace #ff0000 with your desired color code */
    }

    .col-md-5 {
      background-color: 0;
    }

    .medicine-item {
      height: 50%;
      width: 25%;
      /* You can adjust this value to change the width of each box */
      margin-bottom: 20px;
      /* Add some space between the boxes */
    }

    /* Center the medicine item boxes horizontally */
    .search_div {
     
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    /* Adjust the width of the images inside the boxes */
    .medicine-item .card-img-top {
      max-width: 100%;
      height: auto;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="right_col" role="main">
        <div class="row" style="display: inline-block;">
          <!-- body start here -->

          <section class="content">
            <div class="container">
              <div class="row">
                <!-- left side starts here -->
                <!-- left column -->
                <div class="col-md-7 ">

                  <!-- general form elements -->
                  <div class="card">
                    <!-- form start -->
                    <form class="form-horizontal" id="pos-form">
                      <div class="card-header">
                        <div class="row">
                          <div class="col-md-8">
                            <h3 class="card-title text-primary"><i class="fa fa-shopping-cart text-aqua"></i> Sales Invoice</h3>
                          </div>
                        </div>
                      </div>

                      <!-- sales invoice label ends here -->
                    </form>
                  </div>
                  <!-- sales invoice label ends here  -->
                  <!-- this is the payment model -->
                  <!-- include"modals_pos_payment/modal_payments_multi.php"; -->
                  <!-- this is the payment model ends here  -->

                  <!-- customer select part start here -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">

                       



                        <div class="input-group-append" data-toggle="modal" data-target="#customer-modal" title="New Customer?">
                          
                        
                        </div>
                      </div>
                      <span class="customer_points text-success" style="display: none;"></span>
                    </div>
                    
                  </div>
                  <!-- customer select part ends here -->

                  <!-- table starts here -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="table-responsive">
                          <table class="table table-condensed table-bordered table-striped items_table">
                            <thead class="bg-primary">
                              <tr>
                                <th width="30%">Item name</th>
                                <th width="10%">Stock</th>
                                <th width="25%">Quantity</th>
                                <th width="15%">Price</th>
                                <th width="10%">Discount </th>
                                <th width="10% ">Tax </th>
                                <th width="15%">Subtotal </th>
                                <th width="5%"><i class="fa fa-close"></i></th>
                              </tr>
                            </thead>
                            <tbody id="pos-form-tbody" style="font-size: 16px; font-weight: bold;">
                              <!-- body code -->
                            </tbody>
                            <tfoot>
                              <!-- footer code -->
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- table ends here -->

                  <!-- this is the bottom of table  -->
                  <div class="box-footer bg-gray">
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label>Quantity:</label><br>
                        <span id="pos-form-tfoot" class="text-bold total-quantity">0</span>
                      </div>
                      <div class="col-md-3 text-right">
                        <label>Total Amount:</label><br>
                        <span style="font-size: 19px;" class="tot_amt text-bold"></span>
                      </div>
                      
                      <div class="col-md-3 text-right">
                        <label>Grand Total:</label><br>
                        <span style="font-size: 19px;" class="tot_grand text-bold" id="total">0.00</span>
                      </div>
                    </div>
                  </div>

                  <!-- this is the bottom of table ENDS  -->

                  <!-- this is the bottom buttons -->
                  <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">

                    </div>
                   
                    <div class="col-md-3">
                      <button type="button" id="show_cash_modal" name="" class="btn btn-success btn-block btn-flat btn-lg shift_c" title="By Cash & Save [Shift+C]" onclick="openPaymentsModal()">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        Cash
                      </button>
                    </div>


                    <!-- Modal content goes here -->


                    <!-- testing payment -->
                    
                    <!-- testing payment ends -->






















































                  </div>
                  <!-- this is the bottom buttons ends -->
                  <!-- left side ends here -->

                </div>
                <!-- right side starts here -->

                <!-- right upper start  -->

                <!-- Right column -->
                <div class="col-md-5">
                  <!-- Horizontal Form -->
                  <div class="box box-info">
                    <!-- Form start -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group input-group-md">
                            <!-- Dropdown menu for categories -->
                            <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">


                              <!-- getting drop down categories -->


                              <!-- // Fetch categories from the "medicine_categories" table -->
                              <?php $sql = "SELECT id,category_name FROM medi_category";
                              $result = $conn->query($sql);

                              // Generate options for the dropdown
                              if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                  echo '<option value="' . $row["id"] . '">' . $row["category_name"] . '</option>';
                                }
                              }
                              ?>






                              <!-- getting drop down categories -->







                              <!-- Options for categories -->
                            </select>
                            <!-- Reset button for categories -->

                          </div>
                        </div>
                        <div class="col-md-6 text-right"> <!-- Added this column -->
                          <button type="button" class="btn text-blue btn-flat reset_categories" title="Reset Category" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-undo"></i>
                          </button>
                        </div>
                      </div><!-- Row end -->
                    </div>
                  </div><!-- /.box -->


                  <!-- Search Input -->
                  <div class="box box-info">
                    <!-- Form start -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group input-group-md">
                            <input type="text" class="form-control" id="medicine_search" placeholder="Search Medicine">
                            <div class="input-group-append">
                              <button type="button" class="btn text-blue btn-flat" id="search_button" title="Search" data-toggle="tooltip" data-placement="top">
                                <i class="fa fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- Row end -->
                    </div>
                  </div><!-- /.box -->



                  <!-- Medicine Items -->
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <section class="content">
                          <div class="row search_div" id="medicine_items">
                            <?php include('get_medicine.php'); ?>
                            <!-- Medicine Item Boxes -->

                            <!-- Repeat the above code for each medicine item -->
                          </div>
                        </section>
                        <div class="ajax-load text-center" style="display:none;">
                          <button type="button" class="btn btn-default btn-lg ajax" title="Ajax Request">
                            <i class="fa fa-spin fa-refresh"></i>&nbsp; Loading More Data
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!--/.col (right) -->


                <!-- right upper ends  -->

                <!-- right side ends here -->
              </div>
            </div>
        </div>
        </section>






        <!-- discount model start -->
        <div class="modal fade" id="discount-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Discount</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="discount_input">Discount</label>
                        <input type="text" class="form-control" id="discount_input" name="discount_input" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="discount_type">Discount Type</label>
                        <select class="form-control" id="discount_type" name="discount_type">
                          <option value="in_percentage">Per%</option>
                          <option value="in_fixed">Fixed</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary discount_update">Update</button>
              </div>
            </div>
          </div>
        </div>
        <!-- discount model ends -->



<!-- payment model start -->
<div class="modal fade" id="multiple-payments-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header header-custom">
        
          
    
        <h4 class="modal-title text-center">Payments</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- LEFT HAND -->
          <div class="col-md-8">
            <div class="col-md-12 payments_div">
              <div class="card bg-light">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="amount_">Amount</label>
                        <input type="text" class="form-control text-right payment only_currency" value="" id="amount" name="amount" placeholder="Enter Amount" oninput="calculate()">
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="payment_note_">Payment Note</label>
                        <textarea class="form-control" id="payment_note_" name="payment_note_" placeholder=""></textarea>
                        <span id="payment_note_msg" style="display:none" class="text-danger"></span>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div><!-- col-md-12 -->

            <input type="hidden" name="payment_row_count" id="payment_row_count" value="1">

            <div class="col-md-12 payments_div">
              <div class="card bg-light">
                <!-- Additional card content goes here -->
              </div>
            </div><!-- col-md-12 -->
          </div>

          <!-- RIGHT HAND -->
          <!-- RIGHT HAND -->
<div class="col-md-4">
  <div class="col-md-12">
    <div class="card bg-">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Total Items:</span>
            <span class="col-md-6 text-right font-weight-bold custom-font-size sales_div_tot_qty total-quantity">0</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Total:</span>
            <span class="col-md-6 text-right font-weight-bold custom-font-size sales_div_tot_amt tot_amt">0.00</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Discount(-):</span>
            <span class="col-md-6 text-right font-weight-bold custom-font-size sales_div_tot_discount">0.00</span>
          </div>
        </div>
        <div class="row bg-danger">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Total Payable:</span>
            <span class="tot_amt text-bold">0.00</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Total Paying:</span>
            <span class="total_paying" id="total_paying">0.00</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 border-bottom">
            <span class="col-md-6 text-right font-weight-bold">Balance:</span>
            <span class="col-md-6 text-right font-weight-bold custom-font-size sales_div_tot_balance balance">0.00</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 bg-warning">
            <span class="col-md-6 text-right font-weight-bold">Change Return:</span>
            <span class="col-md-6 text-right font-weight-bold custom-font-size sales_div_change_return change_return">0.00</span>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-maroon btn-lg make_sale btn-lg" onclick=""><i class="fa fa-save"></i></button>
        <a href="pdf.php"><button type="button" class="btn btn-success btn-lg make_sale btn-lg" onclick="saveAndPrint()"><i class="fa fa-print"></i> Save & Print</button></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- ends -->







        <!-- adding click item data to the invoice -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          var totalGrandAmount = 0; // Define a global variable



          // customer search starting
          $(document).ready(function() {
            $("#search").keyup(function() {
              var searchText = $(this).val();
              if (searchText != "") {
                $.ajax({
                  url: "search.php",
                  method: 'post',
                  data: {
                    query: searchText
                  },
                  success: function(response) {
                    $("#show-list").html(response);
                  }

                });
              } else {
                $("show-list").html('');
              }
            });
            $(document).on('click', 'a', function() {
              $('#search').val($(this).text());
              $("#show-list").html('');
            });


          });


          // customer search end













// iquantity = item quantity
         // Function to calculate the subtotal for a given row
function calculateSubtotal(row) {
  var iquantity = parseInt(row.find('.quantity-input').val());
  var itemPrice = parseFloat(row.find('td:eq(3)').text());
  var discount = parseFloat(row.find('td:eq(4)').text());
  var subtotal = (iquantity * itemPrice) - discount;
  row.find('.subtotal').text(subtotal.toFixed(2));
}

// Function to update the footer totals
function updateFooterTotals() {
  var totalQuantity = 0;
  var totalAmount = 0;
  var totalDiscount = 0;
  var totalGrandAmount = 0;

  $('#pos-form-tbody tr').each(function() {
    var iquantity = parseInt($(this).find('.quantity-input').val());
    var amount = parseFloat($(this).find('.subtotal').text());
    var discount = parseFloat($(this).find('td:eq(4)').text());

    totalQuantity += iquantity;
    totalAmount += amount;
    totalDiscount += discount;
    totalGrandAmount += amount - discount;
  });

  $('.total-quantity').text(totalQuantity);
  $('.tot_amt').text(totalAmount.toFixed(2));
  $('.tot_disc').text(totalDiscount.toFixed(2));
  $('.tot_grand').text(totalGrandAmount.toFixed(2));

  // Update the payment model
  $('#amount_').val(totalGrandAmount.toFixed(2));
  $('#total_items').val(totalQuantity);
  $('#discount_input').val(totalDiscount.toFixed(2));
}

// Function to update the totals for all rows in the table
function updateTotals() {
  var total = 0;

  $('#pos-form-tbody tr').each(function() {
    var subtotal = parseFloat($(this).find('.subtotal').text());
    total += subtotal;
  });

  $('#total').text(total.toFixed(2));

  // Update the footer totals
  updateFooterTotals();
}

// Function to handle the discount update
function updateDiscount() {
  var discount = parseFloat($('#discount_input').val());

  // Update the discount value in the table
  $('.tot_disc').text(discount.toFixed(2));

  // Recalculate the subtotals and totals
  $('#pos-form-tbody tr').each(function() {
    calculateSubtotal($(this));
  });

  updateTotals();

  // Close the discount modal
  $('#discount-modal').modal('hide');
}

// Bind the discount update button
$('.discount_update').on('click', function() {
  updateDiscount();
});
var rowInfo = [];
function addItemToTable(itemId, itemName, itemPrice, quantity) {
  var stock = quantity;
  var iquantity = 1; // Initial quantity is 1

  // Check if the item already exists in the table
  var existingItem = $('#pos-form-tbody').find('tr[data-id="' + itemId + '"]');
  if (existingItem.length > 0) {
    // Item already exists, increase the quantity
    var existingQuantity = parseInt(existingItem.find('.quantity-input').val());
    iquantity = existingQuantity + 1;

    // Update the quantity input field
    existingItem.find('.quantity-input').val(iquantity);

    // Calculate and update the subtotal
    calculateSubtotal(existingItem);
  } else {
    // Item doesn't exist, add a new row to the table
    var newRow = $('<tr data-id="' + itemId + '"></tr>');
    newRow.append('<td>' + itemName + '</td>');
    newRow.append('<td>' + stock + '</td>');
    newRow.append('<td><input type="number" class="form-control quantity-input" value="' + iquantity + '"></td>');
    newRow.append('<td>' + itemPrice.toFixed(2) + '</td>');
    newRow.append('<td>0</td>'); // Placeholder for discount
    newRow.append('<td>0</td>'); // Placeholder for tax
    newRow.append('<td class="subtotal">' + itemPrice.toFixed(2) + '</td>');
    newRow.append('<td><button type="button" class="btn btn-danger btn-sm remove-item"><i class="fa fa-close"></i></button></td>');

    $('#pos-form-tbody').append(newRow);
  }

  // Update the total in the table footer
  updateTotals();

  // Check and show alert immediately when the user enters the quantity
  var quantityInput = $('#pos-form-tbody').find('tr[data-id="' + itemId + '"]').find('.quantity-input');
  quantityInput.on('input', function() {
    var enteredQuantity = parseInt($(this).val());
    if (enteredQuantity > stock) {
      alert("Please enter a lower quantity. Stock available: " + stock);
      // Set the quantity value to the stock value
      $(this).val(stock);
      // You can perform additional actions here if needed
      return; // Stop further execution
    } else if (enteredQuantity < 0) {
      alert("Please enter a positive quantity.");
      // Set the quantity value to 0
      $(this).val(0);
      // You can perform additional actions here if needed
      return; // Stop further execution
    }
  });

  // Update the row quantity in the rowInfo array
  var found = false;
  for (var i = 0; i < rowInfo.length; i++) {
    if (rowInfo[i].id === itemId) {
      rowInfo[i].quantity = iquantity;
      found = true;
      break;
    }
  }

  if (!found) {
    rowInfo.push({
      id: itemId,
      quantity: iquantity
    });
  }

  console.log("Row Info:", rowInfo);
}









//  thi is the row quantity update manuaaly handle array start 


  // Declare rowInfo globally
  var rowInfo = [];

  // Rest of your code...

  // Function to handle quantity change manually
  $('#pos-form-tbody').on('input', '.quantity-input', function() {
    var row = $(this).closest('tr');
    calculateSubtotal(row);
    // Update the total in the table footer
    updateTotals();

    // Update the row quantity in the rowInfo array
    var itemId = row.data('id');
    var rowQuantity = parseInt($(this).val());

    for (var i = 0; i < rowInfo.length; i++) {
      if (rowInfo[i].id === itemId) {
        rowInfo[i].quantity = rowQuantity;
        break;
      }
    }

    console.log("Row Info:", rowInfo);
  });

  // Rest of your code...



//  thi is the row quantity update manuaaly handle array start 

























// Remove item from table
$('#pos-form-tbody').on('click', '.remove-item', function() {
  $(this).closest('tr').remove();
  // Update the total in the table footer
  updateTotals();
});

// Handle quantity change manually
$('#pos-form-tbody').on('input', '.quantity-input', function() {
  var row = $(this).closest('tr');
  calculateSubtotal(row);
  // Update the total in the table footer
  updateTotals();
});

// Example usage:
// addItemToTable(1, 'Item 1', 10.99);
// addItemToTable(2, 'Item 2', 5.99);


// <!-- adding click item data to the invoice ends -->
var totalGrandAmount = 0;

// Function to handle the cash button click
$('#cash-button').on('click', function() {
   totalGrandAmount = parseFloat($('.tot_grand').text());
  var totalQuantity = parseInt($('.total-quantity').text());
  var totalDiscount = parseFloat($('.tot_disc').text());

  // Open the payment modal
  $('#multiple-payments-modal').modal('show');
});


// Total Paying, total amount calculate
function calculate() {
  var amount = parseFloat(document.getElementById("amount").value);
  var totalPayingElement = document.getElementById("total_paying");
  totalPayingElement.textContent = amount.toFixed(2);

  var totalGrandAmount = parseFloat($('.tot_grand').text());
  var balance = totalGrandAmount - amount;

  if (balance >= 0) {
    $('.change_return').text('0.00');
    $('.balance').text(balance.toFixed(2));
  } else {
    $('.change_return').text((-balance).toFixed(2));
    $('.balance').text('0.00');
  }
}


// print rowid and quantity start
function saveAndPrint() {
  var rows = $('#pos-form-tbody').find('tr');
  var rowInfo = [];

  rows.each(function() {
    var row = $(this);
    var rowId = row.data('id');
    var rowQuantity = parseInt(row.find('.quantity-input').val());

    rowInfo.push({
      id: rowId,
      quantity: rowQuantity
    });
  });

  console.log("Row Info:", rowInfo);

  // Update the database with the quantity values
  $.ajax({
    url: 'update_quantity.php', // Replace with the URL to your PHP script that updates the database
    method: 'POST',
    data: { rowInfo: rowInfo },
    success: function(response) {
      // Handle the success response if needed
      console.log('Quantity updated successfully.');
      // Perform any other actions such as generating the PDF or redirecting to pdf.php
    },
    error: function(xhr, status, error) {
      // Handle any errors that occur during the AJAX request
      console.error('Error updating quantity:', error);
    }
  });
}


// print rowid and quantity ends
  


// end Total Paying , total amount calculate



















          // <!-- searching items category vice  start -->


          $(document).ready(function() {
            // Triggered when the category dropdown value changes
            $('#category_id').change(function() {
              var category_id = $(this).val();
              var search_query = $('#medicine_search').val();

              // Make an AJAX request to get the medicine items for the selected category
              $.ajax({
                url: 'get_medicine.php',
                method: 'POST',
                data: {
                  category_id: category_id,
                  search_query: search_query
                },
                beforeSend: function() {
                  // Display a loading indicator or perform any necessary UI changes
                },
                success: function(response) {
                  // Update the medicine items section with the retrieved data
                  $('#medicine_items').html(response);
                },
                error: function() {
                  // Handle any errors that occur during the AJAX request
                },
                complete: function() {
                  // Perform any cleanup or final UI changes
                }
              });
            });


            // Reset button for all items
            $('.reset_all_items').click(function() {
              $('#category_id').val('').trigger('change');
              $('#medicine_search').val('');
            });

            // Reset button for categories
            $('.reset_categories').click(function() {
              $('#category_id').val('').trigger('change');
            });

            // Search button
            $('#search_button').click(function() {
              var category_id = $('#category_id').val();
              var search_query = $('#medicine_search').val();

              // Make an AJAX request to get the medicine items for the search query
              $.ajax({
                url: 'get_medicine.php',
                method: 'POST',
                data: {
                  category_id: category_id,
                  search_query: search_query
                },
                beforeSend: function() {
                  // Display a loading indicator or perform any necessary UI changes
                },
                success: function(response) {
                  // Update the medicine items section with the retrieved data
                  $('#medicine_items').html(response);
                },
                error: function() {
                  // Handle any errors that occur during the AJAX request
                },
                complete: function() {
                  // Perform any cleanup or final UI changes
                }
              });
            });
          });


          // <!-- searching items category vice ends  -->







          // payment model open 


          function openPaymentsModal() {
            $('#multiple-payments-modal').modal('show');
          }

          // close
        </script>









        <!-- Bootstrap 4 JS links -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <!-- bosy ends here -->
      </div>
    </div>
    <!-- footer start here always add footer in up to 2 div -->
    <?php require 'footer.php'; ?>
    <!-- footer end here -->
  </div>
  </div>
</body>

</html>






