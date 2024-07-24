<?php
session_start();
require 'db.php';

if(isset($_POST['delete_subcategory']))
{
    $subcategory_id = mysqli_real_escape_string($con, $_POST['delete_subcategory']);
    $query = "DELETE FROM sub_category WHERE subcategory_id='$subcategory_id' ";
    $result = mysqli_query($con, $query);

    if($result)
    {
        $_SESSION['message'] = "Sub-Category Deleted Successfully";
        header("Location: subcategory_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Sub-Category Not Deleted";
        header("Location: subcategory_table.php");
        exit(0);
    }
}

if(isset($_POST['update_subcategory']))
{
    $subcategory_id = mysqli_real_escape_string($con, $_POST['subcategory_id']);
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $subcategory_name = mysqli_real_escape_string($con, $_POST['subcategory_name']);
    
    // Get the category_id based on the selected category_name
    $c_query = "SELECT category_id FROM category WHERE category_name = '$category_name'";
    $c_result = mysqli_query($con, $c_query);
    
    if (mysqli_num_rows($c_result) > 0) {
        $c_row = mysqli_fetch_assoc($c_result);
        $category_id = $c_row['category_id'];

        // Update the sub_category with the new values
        $query = "UPDATE sub_category SET category_id='$category_id', subcategory_name='$subcategory_name' WHERE subcategory_id='$subcategory_id'";
        $result = mysqli_query($con, $query);

        if($result)
        {
            $_SESSION['message'] = "Sub-Category Updated Successfully";
            header("Location: subcategory_table.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Sub-Category Not Updated";
            header("Location: subcategory_table.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Category Not Found";
        header("Location: subcategory_table.php");
        exit(0);
    }
}

if(isset($_POST['save_subcategory']))
{
    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $subcategory_name = mysqli_real_escape_string($con, $_POST['subcategory_name']);

    // Get the category_id based on the selected category_name
    $c_query = "SELECT category_id FROM category WHERE category_name = '$category_name'";
    $c_result = mysqli_query($con, $c_query);
    
    if (mysqli_num_rows($c_result) > 0) {
        $c_row = mysqli_fetch_assoc($c_result);
        $category_id = $c_row['category_id'];

        // Insert the new sub_category
        $query = "INSERT INTO sub_category(category_id, subcategory_name) VALUES ('$category_id', '$subcategory_name')";
        $result = mysqli_query($con, $query);

        if($result)
        {
            $_SESSION['message'] = "Sub-Category Created Successfully";
            header("Location: subcategory_form.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Sub-Category Not Created";
            header("Location: subcategory_form.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Category Not Found";
        header("Location: subcategory_form.php");
        exit(0);
    }
}
?>
