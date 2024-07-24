<!-- salesItem_data_handling.php -->

<?php
session_start();
require 'db.php';

if(isset($_POST['save_sales_item']))
{
    $sales_id = mysqli_real_escape_string($con, $_POST['sales_id']);
    $food_id = mysqli_real_escape_string($con, $_POST['food_id']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $total_amount = mysqli_real_escape_string($con, $_POST['amount']);

    $query = "INSERT INTO sales_item(sales_id, food_id, quantity, amount) VALUES ('$sales_id', '$food_id', '$qty', '$total_amount')";
    $result = mysqli_query($con, $query);

    if($result)
    {
        $_SESSION['message'] = "Sales Item Created Successfully";
        header("Location: sales_form.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Sales Item Not Created";
        header("Location: sales_form.php");
        exit(0);
    }
}
?>
