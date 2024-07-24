<?php
session_start();
require 'db.php';

if (isset($_POST['delete_food'])) {
    $food_id = mysqli_real_escape_string($con, $_POST['delete_food']);

    $query = "DELETE FROM food WHERE food_id='$food_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['message'] = "Food Item Deleted Successfully";
        header("Location: food_table.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Food Item Not Deleted";
        header("Location: food_table.php");
        exit(0);
    }
}

if (isset($_POST['update_food'])) {
    $food_id = mysqli_real_escape_string($con, $_POST['food_id']);
    $subcategory_name = mysqli_real_escape_string($con, $_POST['subcategory_name']);
    $food_name = mysqli_real_escape_string($con, $_POST['food_name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Handle image upload
    $imgPath = ''; // Initialize image path

    if ($_FILES['img']['error'] == 0) {
        $uploadDir = 'C:/xampp/htdocs/Sidebar/Sidebar/img_uploads'; // Replace with the actual upload directory path on your server
        $imgFile = $uploadDir . basename($_FILES['img']['name']);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $imgFile)) {
            $imgPath = $imgFile;
        }
    }

    $s_query = "SELECT subcategory_id FROM sub_category WHERE subcategory_name = '$subcategory_name'";
    $s_result = mysqli_query($con, $s_query);

    if (mysqli_num_rows($s_result) > 0) {
        $s_row = mysqli_fetch_assoc($s_result);
        $subcategory_id = $s_row['subcategory_id'];

        $query = "UPDATE food SET subcategory_id='$subcategory_id', food_name='$food_name', img='$imgPath', price='$price' WHERE food_id='$food_id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['message'] = "Food item Updated Successfully";
            header("Location: food_table.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Food Item Not Updated";
            header("Location: food_table.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Subcategory Not Found";
        header("Location: food_table.php");
        exit(0);
    }
}

if (isset($_POST['save_food'])) {
    $subcategory_name = mysqli_real_escape_string($con, $_POST['subcategory_name']);
    $food_name = mysqli_real_escape_string($con, $_POST['food_name']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    // Handle image upload
    $imgPath = ''; // Initialize image path

    if ($_FILES['img']['error'] == 0) {
        $uploadDir = 'img_uploads/'; // Replace with the actual upload directory path on your server
        $imgFile = $uploadDir . basename($_FILES['img']['name']);

        if (move_uploaded_file($_FILES['img']['tmp_name'], $imgFile)) {
            $imgPath = $imgFile;
        }
    }

    $s_query = "SELECT subcategory_id FROM sub_category WHERE subcategory_name = '$subcategory_name'";
    $s_result = mysqli_query($con, $s_query);

    if (mysqli_num_rows($s_result) > 0) {
        $s_row = mysqli_fetch_assoc($s_result);
        $subcategory_id = $s_row['subcategory_id'];

        $query = "INSERT INTO food(subcategory_id, food_name, img, price) VALUES ('$subcategory_id', '$food_name', '$imgPath', '$price')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['message'] = "Food Item Created Successfully";
            header("Location: food_form.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Food Item Not Created";
            header("Location: food_form.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Subcategory Not Found";
        header("Location: food_form.php");
        exit(0);
    }
}
?>
