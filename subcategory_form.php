<?php
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Create Sub- Category</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW CATEGORY
                            <a href="subcategory_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="subcategory_data_handling.php" method="POST">
                            <div class="mb-3">
                            <label>Category Name</label>
                                <select name="category_name" class="form-control" required>
                                    <?php
                                    // Fetch the list of patients from your database
                                    $query = "SELECT category.category_name FROM category";
                                    $result = mysqli_query($con, $query);

                                    // Loop through the patient names and create options
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['category_name'] . '">' . $row['category_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Sub-Category Name</label>
                                <input type="text" name="subcategory_name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_subcategory" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
