<?php 
session_start();

require_once '../../inc/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $title = $_POST['task-title'];
    $description = $_POST['task-description'];
}
//var_dump($title, $description);

/* Connection */

// $conn = mysqli_connect
// (
//     "localhost",
//     "root", 
//     "",
//     "taskacty"
// );

if(!$conn)
{
    die("Connection failed: " .mysqli_connect_error()); // die = stop the code and show error in database
}

// Insert data into table tasks

$sql = "INSERT INTO `tasks` (`title`, `description`) VALUES ('$title', '$description')";

$result = mysqli_query($conn,$sql);

if($result)
{
    $_SESSION["success"]= "Task saved successfully!";
    header("Location:../../add-task.php");
}