          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="index.php" class="search-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" class="form-control" placeholder="Search..." name="search">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 class="heading">Categories</h3>
              <ul class="categories">
<?php 
  $get_cat = "SELECT * FROM categories ORDER BY id DESC";
  $run_cat = mysqli_query($db,$get_cat);
  while ($row_cat = mysqli_fetch_array($run_cat)) {
    $sql_b = "SELECT * FROM blog WHERE category = '".$row_cat['id']."'";
    $run_b = mysqli_query($db,$sql_b);
    $count = mysqli_num_rows($run_b);
?>
                <li>
                  <a href="index.php?cat=<?php echo $row_cat['id'] ?>">
                  <?php echo $row_cat['name'] ?>
                  <span style="color: #2e2e2e;">(<?php echo $count; ?>)</span>
                  </a>
                </li>
<?php 
  }
?>  
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Recent Posts</h3>
<?php
$sql_b = "SELECT * FROM blog ORDER BY id DESC LIMIT 0,5";
$run_b = mysqli_query($db,$sql_b);
while ($row_b = mysqli_fetch_array($run_b)) {
?>              
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/<?php echo $row_b['img'] ?>);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><?php echo $row_b['name'] ?></a></h3>
                  <div class="meta">
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-calendar"></span> <?php echo $row_b['date'] ?></a></div>
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-eye"></span> <?php echo $row_b['views'] ?></a></div>
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-chat"></span> <?php echo $row_b['comments'] ?></a></div>
                  </div>
                </div>
              </div>

<?php    
}
?>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Papular Posts</h3>
<?php
$sql_b = "SELECT * FROM blog ORDER BY views DESC LIMIT 0,5";
$run_b = mysqli_query($db,$sql_b);
while ($row_b = mysqli_fetch_array($run_b)) {
?>              
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/<?php echo $row_b['img'] ?>);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><?php echo $row_b['name'] ?></a></h3>
                  <div class="meta">
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-calendar"></span> <?php echo $row_b['date'] ?></a></div>
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-eye"></span> <?php echo $row_b['views'] ?></a></div>
                    <div><a href="blog-single.php?post=<?php echo $row_b['id'] ?>"><span class="icon-chat"></span> <?php echo $row_b['comments'] ?></a></div>
                  </div>
                </div>
              </div>

<?php    
}
?>
            </div>
            <div class="sidebar-box ftco-animate">
              <h3 class="heading">About Us</h3>
              <p><?php echo $row_site['site_desc']; ?></p>
            </div>
          </div>