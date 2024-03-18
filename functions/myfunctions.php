<?php
session_start();
include("../config/dbconn.php");

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
}

function getById($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id = '$id'";
    return $query_run = mysqli_query($conn, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location: ' . $url);
    exit();
}
