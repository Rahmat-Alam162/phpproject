<?php 
    require 'config/config.php';
    require 'config/db.php';

   if (isset($_POST['delete'])) {
        $delete_id = mysqli_real_escape_string($conn, ($_POST['delete_id']));
        

        $query = "DELETE FROM `posts` WHERE id = {$delete_id}
        ";

     

        if(mysqli_query($conn, $query)) {
            header('location:'.ROOT_URL.'');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }

   }


    $id = mysqli_real_escape_string($conn,$_GET["id"]);
    
        $query = 'SELECT * FROM `posts` WHERE `id` ='.$id;
    
        $result = mysqli_query($conn, $query);
    
        $post = mysqli_fetch_assoc($result);
        //var_dump($post);
         mysqli_free_result($result);
         mysqli_close($conn);

?>

<?php include 'inc/header.php'; ?>
        <div class="container">
        <a class="btn btn-default mt-5" href="<?php echo ROOT_URL ;?>">Back</a>
            <h1><?php echo $post['title'];?></h1>
                <small>Created on <?php echo $post['created_at'];?> by <?php echo $post['author'];?></small>
                <p><?php echo $post['body'];?></p>
            <hr>
            <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id'];?>" class="btn btn-default">Edit</a>    
                
            
        </div>
        <?php include 'inc/fotter.php'; ?>

    
    
    
    