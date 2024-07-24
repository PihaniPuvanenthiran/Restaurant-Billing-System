<!-- salesItem_table.php -->

<?php
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sales Items</title>
</head>
<body>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales Items</h4>
                        <a href="sales_table.php" class="btn btn-primary float-end">Back to Sales List</a>
                    </div>
                    <div class="card-body">
                        <?php
                            if (isset($_GET['sales_id'])) {
                                $sales_id = mysqli_real_escape_string($con, $_GET['sales_id']);
                                $query = "SELECT * FROM sales_item WHERE sales_id = '$sales_id'";
                                $result = mysqli_query($con, $query);

                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        ?>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sales Item Id</th>
                                                    <th>Food Id</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($result as $salesItem) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $salesItem['sales_item_id']; ?></td>
                                                            <td><?= $salesItem['food_id']; ?></td>
                                                            <td><?= $salesItem['qty']; ?></td>
                                                            <td><?= $salesItem['amount']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } else {
                                        echo "<h5>No Record Found</h5>";
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($con);
                                }
                            } else {
                                echo "<h5>Invalid Sales Id</h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
