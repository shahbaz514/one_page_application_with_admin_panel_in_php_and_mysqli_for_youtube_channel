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
              <h3>Categories</h3>
            </center>
            <hr><br>
            <center>
              <a class="btn btn-primary py-3 px-5" href="add-cat.php">Add New Category</a>
            </center>
        		<table class="table table-hover table-dark">
        			<thead>
        				<th>Sr No : </th>
        				<th>Category Name : </th>
                <th>Edit : </th>
        				<th>Delete : </th>
        			</thead>
        			<tbody>
<?php
$i=0;
$get_co = "SELECT * FROM categories ORDER BY id DESC";
$run_co = mysqli_query($db,$get_co);
while ($row_co = mysqli_fetch_array($run_co)) {
$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row_co['name']; ?></td>
              <td>
                <a class="btn btn-primary py-3 px-5" href="edit-cat.php?edit=<?php echo $row_co['id']; ?>">
                  <i class="icon-edit"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-primary py-3 px-5" href="cat.php?del=<?php echo $row_co['id']; ?>">
                  <i class="icon-cut"></i>
                </a>
              </td>
						</tr>
<?php	
}
if (isset($_GET['del'])) {
	$get_id = $_GET['del'];
	$sql = "DELETE FROM categories WHERE id = '$get_id'";
	$run_g = mysqli_query($db,$sql);
	if ($run_g) {
    $sql_blog = "DELETE FROM blog WHERE category = '$get_id'";
    $run_sql_blog = mysqli_query($db,$sql_blog);
    if ($run_sql_blog) {
	    echo "<script>alert('Category Successfully Deleted')</script>";
	    echo "<script>window.open('cat.php','_self')</script>";
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