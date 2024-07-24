
<?php
session_start();
require 'db.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title> Food Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Food Item Edit 
                            <a href="food_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['food_id']))
                        {
                            $food_id = mysqli_real_escape_string($con, $_GET['food_id']);
                            $query = "SELECT food.food_id,
                                            sub_category.subcategory_name,
                                            food.food_name,
                                            food.img,
                                            food.price
                                            FROM food
                                            JOIN sub_category ON food.subcategory_id=sub_category.subcategory_id";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0)
                            {
                                $subcategory = mysqli_fetch_array($result);
                                ?>
                                <form action="food_data_handling.php" method="POST">
                                    <input type="hidden" name="food_id" value="<?= $food['food_id']; ?>">

                                    <div class="mb-3">
                                        <label>Sub-Category Name</label>
                                        <select name="subcategory_name" class="form-control" required>
                                            <?php
                                            // Fetch the list of patients from your database
                                            $query = "SELECT subcategory_name FROM sub_category";
                                            $result = mysqli_query($con, $query);

                                            // Loop through the patient names and create options
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
                                        <button type="submit" name="update_food" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
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
