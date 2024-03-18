<?php
session_start();
include("../config/dbconn.php");
include("../functions/myfunctions.php");

if (isset($_POST['category_add_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];

    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() .".". $image_ext;
    $category_query = "INSERT INTO categories(name, slug, description, status, popular, meta_title, meta_description, meta_keywords, image)
     VALUES('$name','$slug','$description','$status','$popular','$meta_title','$meta_description','$meta_keywords','$filename')";
     $category_query_run = mysqli_query($conn, $category_query);

     if($category_query_run){
        move_uploaded_file($_FILES["image"]["tmp_name"], $path.'/'. $filename);
        redirect("add_category.php","Category Added Successfully!");
     }
     else
     {
        redirect("add_category.php","Something Went Wrong!");
     }
}
