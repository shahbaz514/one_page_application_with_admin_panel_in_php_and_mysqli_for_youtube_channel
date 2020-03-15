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
        		<table class="table table-hover table-dark">
        			<thead>
        				<th>Sr No : </th>
        				<th>Email : </th>
        				<th>Delete : </th>
        			</thead>
        			<tbody>
<?php
$i=0;
$get_co = "SELECT * FROM subsucribe ORDER BY id DESC";
$run_co = mysqli_query($db,$get_co);
while ($row_co = mysqli_fetch_array($run_co)) {
$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row_co['email']; ?></td>
							<td>
								<a class="btn btn-primary py-3 px-5" href="sub.php?del=<?php echo $row_co['id']; ?>">
									<i class="icon-cut"></i>
								</a>
							</td>
						</tr>
<?php	
}
if (isset($_GET['del'])) {
	$get_id = $_GET['del'];
	$sql = "DELETE FROM subsucribe WHERE id = '$get_id'";
	$run_g = mysqli_query($db,$sql);
	if ($run_g) {
	    echo "<script>alert('Subsucribed User Successfully Deleted')</script>";
	    echo "<script>window.open('sub.php','_self')</script>";
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