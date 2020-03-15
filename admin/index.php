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
$site_sql = "SELECT * FROM site WHERE id = '1'";
$run_site = mysqli_query($db,$site_sql);
$row_site = mysqli_fetch_array($run_site);
?>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Name : </b> <?php echo $row_site['name']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Email : </b> <?php echo $row_site['email']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Phone : </b> <?php echo $row_site['phone']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Home Page Backgrond : </b> <img style="width: 100%; border-radius: 10px;" src="../images/<?php echo $row_site['bg_home']; ?>">
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Site Description : </b> <?php echo $row_site['site_desc']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Address : </b> <?php echo $row_site['address']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Twitter Link : </b><?php echo $row_site['tw']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>FaceBook Link :  </b><?php echo $row_site['fb']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Instagram Link : </b><?php echo $row_site['instagram']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Footer : </b><?php echo $row_site['footer_text']; ?>
	          	</div>
	          	<div class="col-sm-6 ftco-animate">
	          		<b>Last Updation : </b><?php echo $row_site['date']; ?>
	          	</div>
	          	<div class="col-sm-12 ftco-animate">
	          		<center>
	          			<a href="edit-site.php?edit=<?php echo(1) ?>" class="btn btn-primary py-3 px-5">
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