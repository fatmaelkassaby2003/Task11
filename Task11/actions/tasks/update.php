<?php
session_start();
require_once '../../inc/connection.php';

if (isset($_POST['id']) && isset($_POST['task-title']) && isset($_POST['task-description'])) {
    $id = $_POST['id'];
    $title = $_POST['task-title'];
    $description = $_POST['task-description'];


    $sql = "UPDATE `tasks` SET `title` = '$title', `description` = '$description' WHERE id = $id";

    if (mysqli_query($conn, $sql))
    {
        $_SESSION['update'] = "Task updated successfully!";
        header("Location: ../../index.php");
    } 
    else 
    {
        echo "Error updating task: " . mysqli_error($conn);
    }
} 
else 
{
    echo "Invalid input!";
}
