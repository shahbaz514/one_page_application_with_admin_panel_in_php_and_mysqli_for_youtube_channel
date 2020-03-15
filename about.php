<?php 
  include 'db/db.php';
  $site_sql = "SELECT * FROM site WHERE id = '1'";
  $run_site = mysqli_query($db,$site_sql);
  $row_site = mysqli_fetch_array($run_site);
  include 'inc/header.php';
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/<?php echo $row_site['bg_home'] ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About us</span></p>
            <h1 class="mb-0 bread">About us</h1>
          </div>
        </div>
      </div>
    </div>
<?php
$about  = mysqli_query($db,"SELECT * FROM `about` WHERE id = '1'");
$row_about = mysqli_fetch_array($about);
?>
    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/<?php echo $row_about['img']; ?>);">
						<a href="<?php echo $row_about['video']; ?>" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4"><?php echo $row_about['name']; ?></h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
	          	<p style="text-align: justify;"><?php echo $row_about['a_desc']; ?></p>

						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest news and offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="" class="subscribe-form" method="post" enctype="multipart/form-data">
              <div class="form-group d-flex">
                <input type="email" class="form-control" placeholder="Enter email address" name="email">
                <input type="submit" value="Subscribe" class="submit px-3" name="subscribe">
              </div>
            </form>
<?php
if (isset($_POST['subscribe'])) {
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $inset_s = mysqli_query($db,"INSERT INTO `subsucribe`(`email`) VALUES ('$email')");
  if ($inset_s) {
    echo "
      <script>
        alert('Successfully Subsucribed');
      </script>
    ";
  }
  else{
    echo "
      <script>
        alert('Already Subsucribed');
      </script>
    ";
  }
}

?>            
          </div>
        </div>
      </div>
    </section>
		

<?php
  include 'inc/footer.php';
?>