<?php 
  include 'db/db.php';
  $site_sql = "SELECT * FROM site WHERE id = '1'";
  $run_site = mysqli_query($db,$site_sql);
  $row_site = mysqli_fetch_array($run_site);
  include 'inc/header.php';
?>
    <div class="hero-wrap hero-bread" style="background-image: url('images/<?php echo $row_site['bg_home']; ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="w-100"></div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> <?php echo $row_site['address']; ?></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://<?php echo $row_site['phone']; ?>"><?php echo $row_site['phone']; ?></a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:<?php echo $row_site['email']; ?>"><?php echo $row_site['email']; ?></a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="" method="post" enctype="multipart/form-data" class="bg-white p-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="sendMsg" class="btn btn-primary py-3 px-5">
              </div>
            </form>
<?php
if (isset($_POST['sendMsg'])) {
  $name = mysqli_real_escape_string($db,$_POST['name']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $subject = mysqli_real_escape_string($db,$_POST['subject']);
  $message = mysqli_real_escape_string($db,$_POST['message']);
  $insert_c = "INSERT INTO `contact_us`(`name`, `email`, `subject`, `msg`, `date`) VALUES ('$name','$email','$subject','$message',NOW())";
  $run_c = mysqli_query($db,$insert_c);
}


?>          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

<?php
  include 'inc/footer.php';
?>