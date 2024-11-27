<?php 
    require 'config/config.php';
    require 'config/db.php';


   if (isset($_POST['submit'])) {
        $update_id = mysqli_real_escape_string($conn, ($_POST['update_id']));

        $title = mysqli_real_escape_string($conn, ($_POST['title']));
        $author = mysqli_real_escape_string($conn, ($_POST['author']));
        $body = mysqli_real_escape_string($conn, ($_POST['body']));

        $query = "UPDATE posts SET
                    title = '$title',
                    author = '$author'
                    body = '$body'
                        WHERE id = {$update_id} ";

        // $query = "INSERT INTO `posts`(title, author, body) Values('$title','$author','$body')";

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
            <h1> Add Posts</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
                </div>
                <div class="form-group">
                    <label for="">Authar</label>
                    <input type="text" name="author" class="form-control" value="<?php echo $post['author'];?>">
                    
                    
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control"><?php echo $post['body'];?></textarea>
                </div>
                <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-5">
            </form>
         
        </div>
  
<?php include 'inc/fotter.php'; ?>
    
    
    
    