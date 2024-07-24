<?php
    session_start();
    require 'db.php'; // Include your database connection
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Add New Food</title>
</head>
<body>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW FOOD ITEM 
                            <a href="food_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    



                        <form action="food_data_handling.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label>Sub-Category Name</label>
                                <select name="subcategory_name" class="form-control" required>
                                    <?php
                                    // Fetch the list of sub-categories from your database
                                    $query = "SELECT subcategory_name FROM sub_category";
                                    $result = mysqli_query($con, $query);

                                    // Loop through the sub-category names and create options
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['subcategory_name'] . '">' . $row['subcategory_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Food Name</label>
                                <input type="text" name="food_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Add Image</label>
                                <input type="file" name="img" class="form-control-file" required>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_food" class="btn btn-primary">Save</button>
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
