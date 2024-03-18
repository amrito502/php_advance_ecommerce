<?php
session_start();
include("../config/dbconn.php");
include("../functions/myfunctions.php");

if (isset($_POST['category_add_btn'])) {
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];

   $status = isset($_POST['status']) ? '1' : '0';
   $popular = isset($_POST['popular']) ? '1' : '0';

   $image = $_FILES['image']['name'];
   $path = "../uploads";
   $image_ext = pathinfo($image, PATHINFO_EXTENSION);
   $filename = time() . "." . $image_ext;
   $category_query = "INSERT INTO categories(name, slug, description, status, popular, meta_title, meta_description, meta_keywords, image)
     VALUES('$name','$slug','$description','$status','$popular','$meta_title','$meta_description','$meta_keywords','$filename')";
   $category_query_run = mysqli_query($conn, $category_query);

   if ($category_query_run) {
      move_uploaded_file($_FILES["image"]["tmp_name"], $path . '/' . $filename);
      redirect("add_category.php", "Category Added Successfully!");
   } else {
      redirect("add_category.php", "Something Went Wrong!");
   }
} else if (isset($_POST["category_edit_btn"])) {
   $category_id = $_POST['category_id'];
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_keywords = $_POST['meta_keywords'];

   $status = isset($_POST['status']) ? '1' : '0';
   $popular = isset($_POST['popular']) ? '1' : '0';

   $new_image = $_FILES['image']['name'];
   $old_image = $_POST['old_image'];
   if ($new_image != "") {
      $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
      $update_filename = time() . "." . $image_ext;
   } else {
      $update_filename = $old_image;
   }
   $path = "../uploads";
   $update_query = "UPDATE categories SET name = '$name', slug= '$slug',
    description = '$description', status = '$status',
     popular = '$popular', meta_title = '$meta_title', meta_description = '$meta_description', meta_keywords = '$meta_keywords',
      image = '$update_filename' WHERE id = '$category_id'";

   $result = mysqli_query($conn, $update_query);
   if ($result) {
      if ($_FILES['image']['name'] != "") {
         move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
         if (file_exists("../uploads/" . $old_image)) {
            unlink("../uploads/" . $old_image);
         }
      }
      redirect("edit_category.php?id=$category_id", "Category Update Successfully!");
   } else {
      redirect("edit_category.php?id=$category_id", "Something went wrong!");
   }
} else if (isset($_POST['delete_category_btn'])) {
   $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
   $category_query = "SELECT * FROM categories WHERE id = '$category_id'";
   $category_query_run = mysqli_query($conn, $category_query);
   $category_data = mysqli_fetch_array($category_query_run);
   $image = $category_data["image"];

   $delete_query = "DELETE FROM categories WHERE id = '$category_id'";
   $result = mysqli_query($conn, $delete_query);
   if ($result) {
      if (file_exists("../uploads/" . $image)) {
         unlink("../uploads/" . $image);
      }
      redirect("category.php", "Category Deleted Successfully!");
   } else {
      redirect("category.php", "Something went wrong!");
   }
}
