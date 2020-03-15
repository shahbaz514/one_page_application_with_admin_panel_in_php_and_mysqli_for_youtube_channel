<?php
  ob_start();
  session_start();
  include '../db/db.php';
  if (!isset($_SESSION['username'])) {
  	echo "<script>window.open('login.php','_self')</script>";
  }
  include 'inc/header.php';
  $select_username = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
  $run_user = mysqli_query($db,$select_username);
  $row_username = mysqli_fetch_array($run_user);
?>

    <section class="ftco-section ftco-degree-bg">
      	<div class="container">
        	<div class="row">
        		<div class="col-sm-3"></div>
        		<div class="col-sm-6">
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Add Post</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>
                      <div class="form-group">
                        <label for="name">Image *</label>
                        <input type="text" class="form-control" name="img" id="name">
                      </div>
                      <div class="form-group">
                        <label for="name">Category *</label>
                        <select class="form-control" name="cat">
<?php
$sql = mysqli_query($db,"SELECT * FROM  categories ORDER BY id DESC");
while ($row = mysqli_fetch_array($sql)) {
  echo "<option value='".$row['id']."'>".$row['name']."</option>";
}
?>                          
                        </select>                        
                      </div>
                      <div class="form-group">
                        <label for="name">Keywords *</label>
                        <input type="text" class="form-control" name="keywords" id="name">
                      </div>
                      <div class="form-group">
                        <label for="name">Description *</label>
                        <textarea type="text" class="form-control" name="b_desc" id="name" rows="10"></textarea>
                      </div>
		                  <div class="form-group" style="margin-top: 20px;">
		                    <input type="submit" name="AddPost" value="Add Post" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
	            	</div>
            	</div>
<?php
if (isset($_POST['AddPost'])) {
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $img = mysqli_real_escape_string($db,$_POST['img']);
  $cat = mysqli_real_escape_string($db,$_POST['cat']);
  $keywords = mysqli_real_escape_string($db,$_POST['keywords']);
  $b_desc = mysqli_real_escape_string($db,$_POST['b_desc']);
  $up_about = "INSERT INTO `blog`(`name`, `b_desc`, `img`, `username`, `category`, `comments`, `views`, `keyworks`, `date`) VALUES ('$name', '$b_desc', '$img', '".$row_username['id']."', '$cat', '0', '0', '$keywords', NOW())";
  $run_up = mysqli_query($db,$up_about);
  if ($run_up) {
    echo "<script>alert('Post Added')</script>";
    echo "<script>window.open('post.php','_self')</script>";
  }
}

?>            	
        		<div class="col-sm-3"></div>
	        </div>
      	</div>
  	</section>
<?php  
  include 'inc/footer.php';
?>