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
	$site_sql = "SELECT * FROM blog WHERE id = '$edit'";
	$run_site = mysqli_query($db,$site_sql);
	$row_site = mysqli_fetch_array($run_site);
?>
	          	
	              	<div class="comment-form-wrap pt-5">
		                <h3 class="mb-5" style="text-align: center; margin-top: -100px;">Edit Post</h3>
		                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
		                  	<div class="form-group">
		                        <label for="name">Name *</label>
		                        <input type="text" class="form-control" name="name" value="<?php echo($row_site['name']) ?>" id="name">
		                      </div>
		                      <div class="form-group">
		                        <label for="name">Image *</label>
		                        <input type="text" class="form-control" value="<?php echo($row_site['img']) ?>" name="img" id="name">
		                      </div>
		                      <div class="form-group">
		                        <label for="name">Category *</label>
		                        <select class="form-control" name="cat" value="<?php echo($row_site['category']) ?>" >
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
		                        <input type="text" class="form-control" name="keywords"  id="name" value="<?php echo($row_site['keyworks']) ?>" >
		                      </div>
		                      <div class="form-group">
		                        <label for="name">Description *</label>
		                        <textarea type="text" class="form-control" name="b_desc" id="name" rows="10">
		                        	<?php echo $row_site['b_desc']; ?>
		                        </textarea>
		                      </div>
			                  <div class="form-group" style="margin-top: 20px;">
			                    <input type="submit" name="EditPost" value="Edit Post" class="btn py-3 px-4 btn-primary">
			                  </div>

		                </form>
	            	</div>
            	</div>
<?php
	if (isset($_POST['EditPost'])) {
	  $name = mysqli_real_escape_string($db,$_POST['name']);
	  $img = mysqli_real_escape_string($db,$_POST['img']);
	  $cat = mysqli_real_escape_string($db,$_POST['cat']);
	  $keywords = mysqli_real_escape_string($db,$_POST['keywords']);
	  $b_desc = mysqli_real_escape_string($db,$_POST['b_desc']);
	  $up_about = "UPDATE `blog` SET `name`='$name',img = '$img', category = '$cat', keyworks = '$keywords', b_desc = '$b_desc' WHERE id = '$edit'";
	  $run_up = mysqli_query($db,$up_about);
	  if ($run_up) {
	    echo "<script>alert('Post Updated')</script>";
	    echo "<script>window.open('post.php','_self')</script>";
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