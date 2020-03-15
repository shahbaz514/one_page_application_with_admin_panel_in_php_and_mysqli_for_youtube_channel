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
<?php
$site_sql = "SELECT * FROM about WHERE id = '1'";
$run_site = mysqli_query($db,$site_sql);
$row_site = mysqli_fetch_array($run_site);
?>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Name : </b> <?php echo $row_site['name']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Description : </b> <?php echo $row_site['a_desc']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Video : </b> <?php echo $row_site['video']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Image : </b> <img style="width: 100%; border-radius: 10px;" src="../images/<?php echo $row_site['img']; ?>">
	          	</div>
	          	<div class="col-sm-12 ftco-animate">
	          		<center>
	          			<a href="edit-about.php?edit=<?php echo(1) ?>" class="btn btn-primary py-3 px-5">
	          				Update Now
	          			</a>
	          		</center>
	          	</div>
	        </div>
      	</div>
  	</section>
<?php  
  include 'inc/footer.php';
?>