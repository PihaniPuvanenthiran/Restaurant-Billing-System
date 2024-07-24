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

    <title>category details</title>
</head>
<body>
  
    <div class="container mt-4">
        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Category List
                        <a href="category_form.php" class="btn btn-primary float-end">Add New Category</a>
                        
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category Id</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM category";
                                    $result = mysqli_query($con, $query);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $category)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $category['category_id']; ?></td>
                                                <td><?= $category['category_name']; ?></td>
                                                <td>
                                                    <a href="category_edit.php?category_id=<?= $category['category_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="category_data_handling.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_category" value="<?=$category['category_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
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