
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

    <title>Category Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category Edit 
                            <a href="category_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['category_id']))
                        {
                            $category_id = mysqli_real_escape_string($con, $_GET['category_id']);
                            $query = "SELECT* FROM category WHERE category_id='$category_id' ";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0)
                            {
                                $category = mysqli_fetch_array($result);
                                ?>
                                <form action="category_data_handling.php" method="POST">
                                    <input type="hidden" name="category_id" value="<?= $category['category_id']; ?>">

                                    <div class="mb-3">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" value="<?=$category['category_name'];?>" class="form-control">
                                    </div>
                                    
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_category" class="btn btn-primary">
                                            12
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
