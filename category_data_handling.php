<?php
    session_start();
    require 'db.php';


if(isset($_POST['delete_category']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['delete_category']);

    $query = "DELETE FROM category WHERE category_id='$category_id' ";
    $result = mysqli_query($con, $query);

    if($result)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: category_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Deleted";
        header("Location: category_table.php");
        exit(0);
    }
}
if(isset($_POST['update_category']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    
    $query = "UPDATE category SET category_name='$category_name' WHERE  category_id='$category_id' ";
    $result = mysqli_query($con, $query);


    if($result)
    {
        $_SESSION['message'] = "Category Updated Successfully";
        header("Location: category_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Category Not Updated";
        header("Location: category_table.php");
        exit(0);
    }

}
if(isset($_POST['save_category']))
{
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    
    $query = "INSERT INTO category (category_name) VALUES ('$category_name')";

    $result = mysqli_query($con, $query);
    if($result)
    {
        $_SESSION['message'] = "Category Created Successfully";
        header("Location: category_form.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Created";
        header("Location: category_form.php");
        exit(0);
    }
}
?>