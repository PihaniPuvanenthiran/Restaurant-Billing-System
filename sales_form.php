<!-- sales_form.php -->

<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sales Form</title>
</head>
<body>
    <div class="container mt-6">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales List</h4>
                    </div>
                    <div class="card-body">
                        <a href="sales_table.php" class="btn btn-danger float-end">BACK</a>
                        <form action="sales_data_handling.php" method="POST">
                            <input type="datetime-local" name="date_time" required>
                            <button type="submit" name="save_sales" id="save_sales" class="btn btn-success btn-sm">Pay</button>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Food</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="sales-table-body"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end" name="text-end"><strong>Total:</strong></td>
                                    <td id="total-amount-input"><input type="hidden" name="amount" id="total-amount-input"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="container mt-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Categories</h4>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <?php
                                        $foodItems = array(
                                            array('name' => 'Chicken Noodle Soup', 'price' => 450.00),
                                            array('name' => 'Greek Salad', 'price' => 250.00),
                                            array('name' => 'Lobster Tail', 'price' => 480.00),
                                            array('name' => 'Vegitable Stir-Fry', 'price' => 350.00),
                                            array('name' => 'Coke', 'price' => 150.00),
                                            array('name' => 'Pepsi', 'price' => 150.00),
                                            array('name' => 'Coke', 'price' => 150.00),
                                            array('name' => 'Orange Juice', 'price' => 250.00),
                                            
                                            
                                        );

                                        foreach ($foodItems as $food) {
                                            echo '<li>' . $food['name'] .'&nbsp;&nbsp; <button class="btn btn-success btn-sm" onclick="addItem(\'' . $food['name'] . '\', ' . $food['price'] . ')">Add</button></li><br>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // select first element(qty)
        function addItem(foodName, price) {
            var quantityInput = document.querySelector('input[name="qty"][data-food="' + foodName + '"]');
            if (quantityInput) {
                var currentQuantity = parseInt(quantityInput.value);
                quantityInput.value = currentQuantity + 1;
                updateAmount(quantityInput);
            } else {
                var newRow = document.createElement('tr');
                newRow.innerHTML = '<td><input type="number" name="qty" data-food="' + foodName + '" value="1" min="1" class="form-control" onchange="updateAmount(this)"></td>' +
                    '<td>' + foodName + '</td>' +
                    '<td data-price="' + price + '">' + price + '</td>';
                document.getElementById('sales-table-body').appendChild(newRow);
            }
        }

        function updateAmount(input) {
            var quantity = parseInt(input.value);
            var price = parseFloat(input.closest('tr').querySelector('[data-price]').getAttribute('data-price'));
            var amountElement = input.parentElement.nextElementSibling.nextElementSibling;

            if (!isNaN(quantity) && !isNaN(price)) {
                var totalAmount = quantity * price;
                amountElement.textContent = totalAmount.toFixed(2);

                var rows = document.querySelectorAll('#sales-table-body tr');
                var total = 0;
                rows.forEach(function(row) {
                    var rowPrice = parseFloat(row.querySelector('[data-price]').getAttribute('data-price'));
                    var rowQuantity = parseInt(row.querySelector('input[name="qty"]').value);
                    if (!isNaN(rowPrice) && !isNaN(rowQuantity)) {
                        total += rowPrice * rowQuantity;
                    }
                });
                
                document.getElementById('total-amount-input').textContent = total.toFixed(2);
            }
        }
    </script>
</body>
</html>