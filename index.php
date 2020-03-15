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
            <h1 class="mb-0 bread"><?php echo $row_site['name']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<div class="row">
<?php
if (isset($_POST['search'])) {
  $search = mysqli_real_escape_string($db,$_POST['search']);
  $sql_blog = "SELECT * FROM blog WHERE (name LIKE '%$search%') OR (b_desc LIKE '%$search%') OR (keyworks LIKE '%$search%')";
  $run_blog = mysqli_query($db,$sql_blog);
  while ($row_blog = mysqli_fetch_array($run_blog)) {
?>
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="block-20" style="background-image: url('images/<?php echo $row_blog['img'] ?>');">
                  </a>
                  <div class="text d-block pl-md-4">
                    <div class="meta mb-3">
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['date'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Views"><span class="icon-eye"></span> <?php echo $row_blog['views'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Comments"><span class="icon-chat"></span> <?php echo $row_blog['comments'] ?></a></div>
                    </div>
                    <h3 class="heading"><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['name'] ?></a></h3>
                    <p><?php echo substr($row_blog['b_desc'], 0,250) ?></p>
                    <p><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="btn btn-primary py-2 px-3">Read more</a></p>
                  </div>
                </div>
              </div>
<?php    
  }
}
else if (isset($_GET['cat'])) {
  $cat_id = $_GET['cat'];
  $sql_blog = "SELECT * FROM blog WHERE category = '$cat_id' ORDER BY id DESC";
  $run_blog = mysqli_query($db,$sql_blog);
  while ($row_blog = mysqli_fetch_array($run_blog)) {
?>  
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="block-20" style="background-image: url('images/<?php echo $row_blog['img'] ?>');">
                  </a>
                  <div class="text d-block pl-md-4">
                    <div class="meta mb-3">
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['date'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Views"><span class="icon-eye"></span> <?php echo $row_blog['views'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Comments"><span class="icon-chat"></span> <?php echo $row_blog['comments'] ?></a></div>
                    </div>
                    <h3 class="heading"><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['name'] ?></a></h3>
                    <p><?php echo substr($row_blog['b_desc'], 0,250) ?></p>
                    <p><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="btn btn-primary py-2 px-3">Read more</a></p>
                  </div>
                </div>
              </div>

<?php
  }
}
else{
  $sql_blog = "SELECT * FROM blog ORDER BY id DESC";
  $run_blog = mysqli_query($db,$sql_blog);
  while ($row_blog = mysqli_fetch_array($run_blog)) {
?>              
							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="block-20" style="background-image: url('images/<?php echo $row_blog['img'] ?>');">
		              </a>
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['date'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Views"><span class="icon-eye"></span> <?php echo $row_blog['views'] ?></a></div>
                      <div><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="meta-chat" title="Comments"><span class="icon-chat"></span> <?php echo $row_blog['comments'] ?></a></div>
		                </div>
		                <h3 class="heading"><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>"><?php echo $row_blog['name'] ?></a></h3>
		                <p><?php echo substr($row_blog['b_desc'], 0,250) ?></p>
		                <p><a href="blog-single.php?post=<?php echo $row_blog['id'] ?>" class="btn btn-primary py-2 px-3">Read more</a></p>
		              </div>
		            </div>
		          </div>
<?php
  }
}
?>
						</div>
          </div> <!-- .col-md-8 -->

          <?php include 'inc/sidebar.php'; ?>

        </div>
      </div>
    </section> <!-- .section -->
<?php
  include 'inc/footer.php';
?>