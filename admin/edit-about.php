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
$site_sql = "SELECT * FROM about WHERE id = '1'";
$run_site = mysqli_query($db,$site_sql);
$row_site = mysqli_fetch_array($run_site);
?>
	          	
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Edit About Us</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
		                    <label for="name">Name *</label>
		                    <input type="text" class="form-control" name="name" id="name" value="<?php echo($row_site['name']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="email">Video *</label> 
		                    <input type="link" class="form-control" name="video" id="email" value="<?php echo($row_site['video']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="website">Image *</label>
		                    <input type="text" class="form-control" name="img" id="phone" value="<?php echo($row_site['img']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="message">Site Desc</label>
		                    <textarea name="a_desc" id="site_desc" cols="30" rows="10" class="form-control">
		                    	<?php echo($row_site['a_desc']) ?>
		                    </textarea>
		                  </div>
		                  <div class="form-group" style="margin-top: 20px;">
		                    <input type="submit" name="EditAboutUs" value="Update Now" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
	            	</div>
            	</div>
<?php
if (isset($_POST['EditAboutUs'])) {
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $img = mysqli_real_escape_string($db,$_POST['img']);
  $video = mysqli_real_escape_string($db,$_POST['video']);
  $a_desc = mysqli_real_escape_string($db,$_POST['a_desc']);
  $up_about = "UPDATE `about` SET `name`='$name',`img`='$img',`video`='$video',`a_desc`='$a_desc',`date`= NOW() WHERE id = '1'";
  $run_up = mysqli_query($db,$up_about);
  if ($run_up) {
    echo "<script>alert('About Us Updated')</script>";
    echo "<script>window.open('about.php','_self')</script>";
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