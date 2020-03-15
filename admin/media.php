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
        		<!--
I will take code in advance for upload images and other file on the server just copy and paste the code i will provide the code of this video in the description of this video



we need to create a new table in the database
            -->
            <form action="" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
          <div class="row">
            <div class="col-sm-6">
              <input type="file" name="media[]" required="" class="form-control">
            </div>
            <div class="col-sm-6">
              <input type="submit" name="submit" value="Add Media" class="btn btn-dark form-control">
            </div>
          </div>
        </form>
<?php
if (isset($_POST['submit'])) {
  if (count($_FILES['media']['name']) > 0) {
    for ($i=0; $i < count($_FILES['media']['name']); $i++) { 
      $image = $_FILES['media']['name'][$i];
      $tmp_name = $_FILES['media']['tmp_name'][$i];
      $query = "INSERT INTO media (image) VALUES ('$image')";
      if (mysqli_query($db, $query)) {
        $path = "images/$image";
        if(move_uploaded_file($tmp_name, $path)){
          copy($path, "../$path");
        }
      }
    }
  }
}
?>  
        <div class="row" style="margin-top: 20px;">
<?php
$sql_m = "SELECT * FROM `media` ORDER BY id DESC";
$run_m = mysqli_query($db,$sql_m);
while ($row_m = mysqli_fetch_array($run_m)) {
?>          
          <div class="col-sm-3">
            <a target="_blank" href="../images/<?php echo $row_m['image'] ?>">
              <img src="../images/<?php echo $row_m['image'] ?>" style="width: 100%; height: 200px; border-radius: 20px;">
            </a>
          </div>
<?php
}
?>
        </div>
        	</div>
      	</div>
  	</section>
<?php  
  include 'inc/footer.php';
?>