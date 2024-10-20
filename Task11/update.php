<?php require_once 'inc/header.php';
require_once 'inc/connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];  
    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";                                                
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(!$row) {
        echo "Task not found!";
        exit;
    }
}
else 
{
    echo "No ID provided!";
    exit;
}
?>
    <div class="container">
    <div class="row">
        <div class="col-6 mx-auto">

            <h1 class="text-center p-3">Update Task!</h1>
            <form action="actions/tasks/update.php" method="POST" class="border p-3 my-3">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="task-name" class="form-label">Task Title</label>
                    <input type="text" name="task-title" id="task-title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="enter the title">
                </div>
                <div class="mb-3">
                    <label for="task-description" class="form-label">Task Description</label>
                    <textarea name="task-description" id="task-description" rows="3" class="form-control" placeholder="enter the description"><?php echo $row['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="update" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>