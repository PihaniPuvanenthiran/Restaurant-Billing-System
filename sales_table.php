<!-- sales_table.php -->

<?php
session_start(); 
require 'db.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sales Details</title>
  </head>
  <body>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales List
                            <a href="sales_form.php" class="btn btn-primary float-end">Add New Sales</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sales Id</th>
                                    <th>Date-Time</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM sales";
                                    $result = mysqli_query($con, $query);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $sales)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $sales['sales_id']; ?></td>
                                                <td><?= $sales['date_time']; ?></td>
                                                <td><?= $sales['amount']; ?></td>
                                                <td>
                                                    <a href="salesItem_table.php?sales_id=<?= $sales['sales_id']; ?>" class="btn btn-info btn-sm">View Items</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>