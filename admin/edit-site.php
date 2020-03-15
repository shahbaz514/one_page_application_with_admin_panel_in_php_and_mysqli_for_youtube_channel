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
$site_sql = "SELECT * FROM site WHERE id = '1'";
$run_site = mysqli_query($db,$site_sql);
$row_site = mysqli_fetch_array($run_site);
?>
	          	
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Edit Site Info</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
		                    <label for="name">Name *</label>
		                    <input type="text" class="form-control" name="name" id="name" value="<?php echo($row_site['name']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="email">Email *</label> 
		                    <input type="email" class="form-control" name="email" id="email" value="<?php echo($row_site['email']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="website">Phone *</label>
		                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo($row_site['phone']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="website">Bg Image *</label>
		                    <input type="text" class="form-control" name="bg_home" id="bg_home" value="<?php echo($row_site['bg_home']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Address *</label>
		                    <input type="text" class="form-control" name="address" id="address" value="<?php echo($row_site['address']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Twitter Link *</label>
		                    <input type="text" class="form-control" name="tw" id="tw" value="<?php echo($row_site['tw']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">FaceBook Link *</label>
		                    <input type="text" class="form-control" name="fb" id="fb" value="<?php echo($row_site['fb']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Instagram Link *</label>
		                    <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo($row_site['instagram']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="name">Footer Text *</label>
		                    <input type="text" class="form-control" name="footer_text" id="footer_text" value="<?php echo($row_site['footer_text']) ?>">
		                  </div>
		                  <div class="form-group">
		                    <label for="message">Site Desc</label>
		                    <textarea name="site_desc" id="site_desc" cols="30" rows="10" class="form-control">
		                    	<?php echo($row_site['site_desc']) ?>
		                    </textarea>
		                  </div>
		                  <div class="form-group">
		                    <input type="submit" name="EditSiteInfo" value="Update Now" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
	            	</div>
            	</div>
<?php
if (isset($_POST['EditSiteInfo'])) {
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $phone = mysqli_real_escape_string($db,$_POST['phone']);
  $bg_home = mysqli_real_escape_string($db,$_POST['bg_home']);
  $site_desc = mysqli_real_escape_string($db,$_POST['site_desc']);
  $address = mysqli_real_escape_string($db,$_POST['address']);
  $tw = mysqli_real_escape_string($db,$_POST['tw']);
  $fb = mysqli_real_escape_string($db,$_POST['fb']);
  $instagram = mysqli_real_escape_string($db,$_POST['instagram']);
  $footer_text = mysqli_real_escape_string($db,$_POST['footer_text']);
  $up_site = "UPDATE `site` SET `name`='$name',`email`='$email',`phone`='$phone',`bg_home`='$bg_home',`site_desc`='$site_desc',`address`='$address',`tw`='$tw',`fb`='$fb',`instagram`='$instagram',`footer_text`='$footer_text',`date`= NOW() WHERE id = '1'";
  $run_up = mysqli_query($db,$up_site);
  if ($run_up) {
    echo "<script>alert('Site Updated')</script>";
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