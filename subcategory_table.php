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

    <title>sub-category details</title>
</head>
<body>
  
    <div class="container mt-4">
        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sub-Category List
                            <a href="subcategory_form.php" class="btn btn-primary float-end">Add New Sub Category</a>
                        
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sub-Category Id</th>
                                    <th>Category </th>
                                    <th>Sub-Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT sub_category.subcategory_id,
                                                    category.category_name,
                                                    sub_category.subcategory_name
                                                    FROM sub_category
                                                    JOIN category ON sub_category.category_id=category.category_id";
                                    $result = mysqli_query($con, $query);

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $subcategory)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $subcategory['subcategory_id']; ?></td>
                                                <td><?= $subcategory['category_name']; ?></td>
                                                <td><?= $subcategory['subcategory_name']; ?></td>
                                                <td>
                                                    <a href="subcategory_edit.php?subcategory_id=<?= $subcategory['subcategory_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="subcategory_data_handling.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_subcategory" value="<?=$subcategory['subcategory_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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