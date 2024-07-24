<!-- sales_data_handling.php -->

<?php
session_start();
require 'db.php';

if(isset($_POST['save_sales']))
{
    $date_time = mysqli_real_escape_string($con, $_POST['date_time']);
    $total_amount = mysqli_real_escape_string($con, $_POST['amount']);

    $query = "INSERT INTO sales(date_time, amount) VALUES ('$date_time', '$total_amount')";
    $result = mysqli_query($con, $query);

    if($result)
    {
        $_SESSION['message'] = "Sales Created Successfully";
        header("Location: sales_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Sales Not Created";
        header("Location: sales_form.php");
        exit(0);
    }
}
?>