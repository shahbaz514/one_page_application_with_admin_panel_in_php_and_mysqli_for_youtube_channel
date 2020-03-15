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
            <center>
              <h3>Posts</h3>
            </center>
            <hr><br>
            <center>
              <a class="btn btn-primary py-3 px-5" href="add-post.php">Add New Post</a>
            </center>
        		<table class="table table-hover table-dark">
        			<thead>
        				<th>Sr No : </th>
                <th>Post Name : </th>
                <th>Post Description : </th>
                <th>Post Image : </th>
                <th>Post Username : </th>
                <th>Post Category : </th>
                <th>Post Comments : </th>
                <th>Post Views : </th>
        				<th>Post Date : </th>
                <th>Edit : </th>
        				<th>Delete : </th>
        			</thead>
        			<tbody>
<?php
$i=0;
$get_co = "SELECT * FROM blog ORDER BY id DESC";
$run_co = mysqli_query($db,$get_co);
while ($row_co = mysqli_fetch_array($run_co)) {
$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
              <td style="text-align: justify !important;"><?php echo $row_co['name']; ?></td>
              <td style="text-align: justify !important;"><?php echo $row_co['b_desc']; ?></td>
              <td>
                <img src="../images/<?php echo $row_co['img']; ?>" style="width: 80px; border-radius: 5px;">
              </td>
              <td style="text-align: justify;">
<?php 
$sql_username = "SELECT * FROM users WHERE id = '".$row_co['username']."'";
$run_username = mysqli_query($db,$sql_username);
$row_username = mysqli_fetch_array($run_username);

echo $row_username['username'];
?>
              </td>
              <td style="text-align: justify;">
<?php
$sql_cat = "SELECT * FROM categories WHERE id = '".$row_co['category']."'";
$run_cat = mysqli_query($db,$sql_cat);
$row_cat = mysqli_fetch_array($run_cat);

echo $row_cat['name'];
?>                
              </td>
              <td style="text-align: justify;">
                <a class="btn btn-primary py-3 px-5" href="comment.php?post=<?php echo $row_co['id']; ?>">
                  <?php echo $row_co['comments']; ?>
                </a>
              </td>
              <td style="text-align: justify;"><?php echo $row_co['views']; ?></td>
							<td style="text-align: justify;"><?php echo $row_co['date']; ?></td>
              <td>
                <a class="btn btn-primary py-3 px-5" href="edit-post.php?edit=<?php echo $row_co['id']; ?>">
                  <i class="icon-edit"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-primary py-3 px-5" href="post.php?del=<?php echo $row_co['id']; ?>">
                  <i class="icon-cut"></i>
                </a>
              </td>
						</tr>
<?php	
}
if (isset($_GET['del'])) {
	$get_id = $_GET['del'];
	$sql = "DELETE FROM blog WHERE id = '$get_id'";
	$run_g = mysqli_query($db,$sql);
	if ($run_g) {
    $sql_blog = "DELETE FROM comments WHERE post_blog_id = '$get_id'";
    $run_sql_blog = mysqli_query($db,$sql_blog);
    if ($run_sql_blog) {
	    echo "<script>alert('Post Successfully Deleted')</script>";
	    echo "<script>window.open('post.php','_self')</script>";
    }
	}
}
?>        				
        			</tbody>
        		</table>
        	</div>
      	</div>
  	</section>
<?php  
  include 'inc/footer.php';
?>