
<?php
    session_start();
    

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <title>Category</title>
</head>
<body>
  
    <div class="container mt-5">
        <?php include('message.php'); ?>

        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ADD NEW CATEGORY 
                            <a href="category_table.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="category_data_handling.php" method="POST">

                            
                            <div class="mb-3">
                                <label>Category Name</label>
                                <input type="text" name="category_name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_category" class="btn btn-primary">Save</button>
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