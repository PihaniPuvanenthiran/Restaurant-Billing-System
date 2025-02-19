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

    <title>food details</title>
</head>
<body>
  
    <div class="container mt-4">
        <?php include('message.php'); ?>



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Food List
                        <a href="food_form.php" class="btn btn-primary float-end">Add New Food Item</a>
                        
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>food_Id</th>
                                    <th>Sub-Category</th>
                                    <th>Food Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
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
                                        foreach($result as $food)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $food['food_id']; ?></td>
                                                <td><?= $food['subcategory_name']; ?></td>
                                                <td><?= $food['food_name']; ?></td>
                                                <td><img src= "<?php echo $food['img']; ?>" alt="<?php echo $food['food_name']; ?>" width="100px" hieght="100px"></td>
                                                <td><?= $food['price']; ?></td>
                                                
                                                <td>
                                                    <a href="food_edit.php?food_id=<?= $food['food_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="food_data_handling.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_food" value="<?=$food['food_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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