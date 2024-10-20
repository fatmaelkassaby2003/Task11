<?php require_once 'inc/header.php'; ?>
    <div class="container">
    <div class="row">
        <div class="col-6 mx-auto">

            <h1 class="text-center p-3">Add Task!</h1>
            <form action="actions/tasks/store.php" method="POST" class="border p-3 my-3">
                <div class="mb-3">
                <?php
                    if(isset($_SESSION["success"])): ?>
                    <h2 class="text-success text-center"><?php echo $_SESSION["success"] ; ?></h2>
                <?php endif;?>
                </div>
                <div class="mb-3">
                    <label for="task-name" class="form-label">Task Title</label>
                    <input type="text" name="task-title" id="task-title" class="form-control" placeholder="enter the title">
                </div>
                <div class="mb-3">
                    <label for="task-description" class="form-label">Task Description</label>
                    <textarea type="text" name="task-description" id="task-description"  rows="3" class="form-control" placeholder="enter the description"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="save" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php unset($_SESSION["success"]); ?>
<?php require_once 'inc/footer.php'; ?>