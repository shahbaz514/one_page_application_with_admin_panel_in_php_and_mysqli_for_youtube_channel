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
if (isset($_GET['edit'])) {
	$edit = $_GET['edit'];
	$site_sql = "SELECT * FROM categories WHERE id = '$edit'";
	$run_site = mysqli_query($db,$site_sql);
	$row_site = mysqli_fetch_array($run_site);
?>
	          	
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Edit Category</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
		                    <label for="name">Name *</label>
		                    <input type="text" class="form-control" name="name" id="name" value="<?php echo($row_site['name']) ?>">
		                  </div>
		                  <div class="form-group" style="margin-top: 20px;">
		                    <input type="submit" name="EditCat" value="Update Now" class="btn py-3 px-4 btn-primary">
		                  </div>

		                </form>
	            	</div>
            	</div>
<?php
	if (isset($_POST['EditCat'])) {
	  $name = mysqli_real_escape_string($db,$_POST['name']);
	  $up_about = "UPDATE `categories` SET `name`='$name' WHERE id = '$edit'";
	  $run_up = mysqli_query($db,$up_about);
	  if ($run_up) {
	    echo "<script>alert('Category Updated')</script>";
	    echo "<script>window.open('cat.php','_self')</script>";
	  }
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