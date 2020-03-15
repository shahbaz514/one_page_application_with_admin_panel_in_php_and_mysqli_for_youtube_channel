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
        				<th>Name : </th>
        				<th>Email : </th>
        				<th>Subject : </th>
        				<th>Message : </th>
        				<th>Date : </th>
        				<th>Delete : </th>
        			</thead>
        			<tbody>
<?php
$i=0;
$get_co = "SELECT * FROM contact_us ORDER BY id DESC";
$run_co = mysqli_query($db,$get_co);
while ($row_co = mysqli_fetch_array($run_co)) {
$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row_co['name']; ?></td>
							<td><?php echo $row_co['email']; ?></td>
							<td><?php echo $row_co['subject']; ?></td>
							<td style="text-align: justify!important;"><?php echo $row_co['msg']; ?></td>
							<td><?php echo $row_co['date']; ?></td>
							<td>
								<a class="btn btn-primary py-3 px-5" href="contact.php?del=<?php echo $row_co['id']; ?>">
									<i class="icon-cut"></i>
								</a>
							</td>
						</tr>
<?php	
}
if (isset($_GET['del'])) {
	$get_id = $_GET['del'];
	$sql = "DELETE FROM contact_us WHERE id = '$get_id'";
	$run_g = mysqli_query($db,$sql);
	if ($run_g) {
	    echo "<script>alert('Message Successfully Deleted')</script>";
	    echo "<script>window.open('contact.php','_self')</script>";
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