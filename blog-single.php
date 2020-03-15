<?php 
  include 'db/db.php';
  $site_sql = "SELECT * FROM site WHERE id = '1'";
  $run_site = mysqli_query($db,$site_sql);
  $row_site = mysqli_fetch_array($run_site);
  include 'inc/header.php';
?>
<?php
if (isset($_GET['post'])) {
  $get_id = $_GET['post'];
  $sql_blog = "SELECT * FROM blog WHERE id = '$get_id'";
  $run_blog = mysqli_query($db,$sql_blog);
  $row_blog = mysqli_fetch_array($run_blog);
  $view = $row_blog['views'];
  $view = $view + 1;
  $up_sql = "UPDATE blog SET views = '$view' WHERE id = '$get_id'";
  $run_up = mysqli_query($db,$up_sql);
?> 
    <div class="hero-wrap hero-bread" style="background-image: url('images/<?php echo($row_blog['img']) ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span><?php echo $row_blog['name'] ?></span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<h2 class="mb-3"><?php echo $row_blog['name'] ?></h2>
            <p><?php echo $row_blog['b_desc'] ?></p>
            
<?php
$get_u = "SELECT * FROM users WHERE id = '".$row_blog['username']."'";
$run_u = mysqli_query($db,$get_u);
$row_u = mysqli_fetch_array($run_u);

?>            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio align-self-md-center mr-4">
                <img src="images/<?php echo($row_u['img']) ?>" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc align-self-md-center">
                <h3><?php echo $row_u['username']; ?></h3>
                <p style="text-align: justify;"><?php echo $row_u['u_desc']; ?></p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo $row_blog['comments'] ?> Comments</h3>
              <ul class="comment-list">
<?php
  $get_sql = "SELECT * FROM comments WHERE post_blog_id = '$get_id'";
  $run_get = mysqli_query($db,$get_sql);
  while ($row_get = mysqli_fetch_array($run_get)) {
?>                
                <li class="comment">
                  <div class="vcard bio">

                  </div>
                  <div class="comment-body">
                    <h3><?php echo $row_get['name'] ?></h3>
                    <div class="meta"><?php echo $row_get['date'] ?></div>
                    <p><?php echo $row_get['msg'] ?></p>
                  </div>
                </li>
<?php
  }
?>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="" class="p-5 bg-light" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label> 
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" name="website" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addComment" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
<?php
  if (isset($_POST['addComment'])) {
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $website = mysqli_real_escape_string($db,$_POST['website']);
    $message = mysqli_real_escape_string($db,$_POST['message']);
    $comment = "INSERT INTO `comments`(`name`, `email`, `website`, `msg`, `post_blog_id`, `date`) VALUES ('$name','$email','$website','$message','".$row_blog['id']."',NOW())";
    $run_comment = mysqli_query($db,$comment);
    if ($run_comment) {
      $com = $row_blog['comments'];
      $com = $com + 1;
      $up_comm = "UPDATE blog SET comments = '$com' WHERE id = '$get_id'";
      $run_comm = mysqli_query($db,$up_comm);
      if ($run_comm) {
        echo "<script>alert('Your Comment is Added Successfully')</script>";
      }
    }
  }
}
?>
              </div>
            </div>
          </div> <!-- .col-md-8 -->
          
          <?php include 'inc/sidebar.php'; ?>

        </div>
      </div>
    </section> <!-- .section -->

<?php
  include 'inc/footer.php';
?>