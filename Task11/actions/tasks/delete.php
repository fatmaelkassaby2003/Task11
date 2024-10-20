<?php 
    session_start();

    require_once '../../inc/connection.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $id = $_GET['id'];
        $query = "DELETE FROM tasks WHERE id = $id";
        
        $sql =mysqli_query($conn , $query);

        if($sql)
        {
            $_SESSION["delete"] = "Task deleted successfully";
            header('location: ../../index.php');
        }
    }