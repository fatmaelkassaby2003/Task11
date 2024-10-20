    <?php
    require_once 'inc/header.php';
    ?>

    <?php 
    require_once 'inc/connection.php';

    $sql = "SELECT * FROM `tasks`";
    
    $result = mysqli_query($conn, $sql);

    ?>

    <h1 class="text-center p-3"> All Tasks!</h1>

    <div class="container">
        <div class="row">   
            <div class="col-6 mx-auto">
                <div class="mb-3">
                    <?php
                        if(isset($_SESSION["delete"])): ?>
                        <h2 class="text-success text-center"><?php echo $_SESSION["delete"] ; ?></h2>
                    <?php endif;?>
                </div>
                <div class="mb-3">
                    <?php
                        if(isset($_SESSION["update"])): ?>
                        <h2 class="text-success text-center"><?php echo $_SESSION["update"] ; ?></h2>
                    <?php endif;?>
                </div>
                <table class="table table-bordered">
                    <thead> 
                        <tr>    
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Delete</th>
                            <th>Update</th>    
                        </tr>
                    </thead>        
                    <tbody>
                        <?php   
                        $i = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <tr>    
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['title']; ?></td>   
                            <td><?php echo $row['description']; ?></td>
                            <td><a class="btn btn-danger" href="actions/tasks/delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a></td>
                            <td><a class="btn btn-primary" href= "update.php?id=<?php echo $row['id']; ?>" role="button">Update</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>       
        </div>                                                                                        
    </div>

    <?php
    unset($_SESSION["update"]);
    unset($_SESSION["delete"]);
    require_once 'inc/footer.php';
    ?>