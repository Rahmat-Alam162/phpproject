<?php 
    require 'config/config.php';
    require 'config/db.php';
   if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn, ($_POST['title']));
        $author = mysqli_real_escape_string($conn, ($_POST['author']));
        $body = mysqli_real_escape_string($conn, ($_POST['body']));

        $query = "INSERT INTO `posts`(title, author, body) Values('$title','$author','$body')";

        if(mysqli_query($conn, $query)) {
            header('location:'.ROOT_URL.'');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }

   }
    







?>

<?php include 'inc/header.php'; ?>
        <div class="container">
            <h1> Add Posts</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Authar</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control"></textarea>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-5">
            </form>
         
        </div>
  
<?php include 'inc/fotter.php'; ?>
    
    
    
    