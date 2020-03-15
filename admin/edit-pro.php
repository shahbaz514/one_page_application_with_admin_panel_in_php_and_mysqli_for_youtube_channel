<?php
  ob_start();
  session_start();
  include '../db/db.php';
  if (!isset($_SESSION['username'])) {
  	echo "<script>window.open('login.php','_self')</script>";
  }
  include 'inc/header.php';
?>

    <section class="ftco-section ftco-degree-bg">
      	<div class="container">
        	<div class="row">
        		<div class="col-sm-3"></div>
        		<div class="col-sm-6">
<?php
	$site_sql = "SELECT * FROM users WHERE id = '1'";
	$run_site = mysqli_query($db,$site_sql);
	$row_site = mysqli_fetch_array($run_site);
?>
	          	
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Edit Profile</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
		                    <label for="name">UserName *</label>
		                    <input type="text" class="form-control" name="username" id="name" value="<?php echo($row_site['username']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Password *</label>
		                    <input type="text" class="form-control" name="password" id="name" value="<?php echo($row_site['password']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Image *</label>
		                    <input type="text" class="form-control" name="img" id="name" value="<?php echo($row_site['img']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">About User *</label>
		                    <textarea type="text" class="form-control" name="u_desc" id="name" rows="10">
		                    <?php echo($row_site['u_desc']) ?>
		                    </textarea>
		                  </div>
		                  <div class="form-group" style="margin-top: 20px;">
		                    <input type="submit" name="EditPro" value="Update Now" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
	            	</div>
            	</div>
<?php
	if (isset($_POST['EditPro'])) {
	  $username = mysqli_real_escape_string($db,$_POST['username']);
	  $password = mysqli_real_escape_string($db,$_POST['password']);
	  $img = mysqli_real_escape_string($db,$_POST['img']);
	  $u_desc = mysqli_real_escape_string($db,$_POST['u_desc']);
	  $up_about = "UPDATE `users` SET `username`='$username', password = '$password', img = '$img', u_desc = '$u_desc' WHERE id = '1'";
	  $run_up = mysqli_query($db,$up_about);
	  if ($run_up) {
	    echo "<script>alert('User Updated')</script>";
	    echo "<script>window.open('index.php','_self')</script>";
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