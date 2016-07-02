<?php

	session_start();

	require( 'config.php' );
	require( 'includes/link.php' );

	$status = array();

	$sess_grd = 'hh';

	if (isset($_POST['submit']) ) {
		$guardian = $_POST['guardian'];
		$student = $_POST['student'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

				
			$query ="SELECT 
						* 
					FROM 
						guardians
					WHERE
						guardian = '$sess_grd'
			";
			
			$result = mysqli_query( $link, $query );


		if ( $result && mysqli_num_rows($result) > 0) {

			$query = "UPDATE
					 	guardians 
					 SET 
					 	guardian = '$guardian' , student = '$student', address = '$address', contact = '$contact'
					WHERE
						guardian = '$sess_grd'
				";
			// $query2 = "UPDATE
			// 		 	school 
			// 		 SET 
					 	
			// 		WHERE
			// 			s_name = '$sess_sch'
			// 	";
			// $query3 = "UPDATE
			// 		 	school 
			// 		 SET 
					 	
			// 		WHERE
			// 			s_name = '$sess_sch'
			// 	";
			// $query4 = "UPDATE
			// 		 	school 
			// 		 SET 
					 	
			// 		WHERE
			// 			s_name = '$sess_sch'
			// 	";
			// $query5 = "UPDATE
			// 		 	school 
			// 		 SET 
					 	
			// 		WHERE
			// 			s_name = '$sess_sch'
			// 	";
			
			$result = mysqli_query($link, $query) or exit(mysqli_error($link));
			// $result2 = mysqli_query($link, $query2) or exit(mysqli_error($link));
			// $result3 = mysqli_query($link, $query3) or exit(mysqli_error($link));
			// $result4 = mysqli_query($link, $query4) or exit(mysqli_error($link));
			// $result5 = mysqli_query($link, $query5) or exit(mysqli_error($link));
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Guardian - E-School - Online School Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="css/bootstrap_2.css" rel="stylesheet"/>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"/> -->
	<!-- <link href="js/bootstrap.js" rel="stylesheet"> -->
	<!-- <link href="js/bootstrap.min.js" rel="stylesheet"> -->
	<link href="css/w3.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
	<script src="js/script.js"></script>
</head>
<body>

	<?php require( 'includes/header.php' ); ?>
	<?php require( 'includes/menu.php' ); ?>


	<div class="center">
		<h1>Edit Guardian</h1>

		<div class="cleaner"></div>
		<div class="cleaner"></div>
		
		<?php

			
				$query ="SELECT 
							* 
						FROM 
							guardians
						WHERE
							status = '1' 
						AND
							guardian = '$sess_grd'
				";
				
				$result = mysqli_query( $link, $query );
				
				if ( $result && mysqli_num_rows($result) > 0 ) {
					while($gd = mysqli_fetch_assoc($result)) {
			?>
	</div>

		<div style="margin: 5px 0px 5px 66px">

			<div class="row">
				<div class="col-xs-6 col-md-4">
					<p style=" text-align:center;">Name</p>
					<p style=" text-align:center;">Related Student</p>
					<p style=" text-align:center;">Address</p>
					<p style=" text-align:center;">Contact</p>
				</div>
				<div class="col-xs-6 col-md-4"  style="text-align:center;">
					<p><?php echo $gd['guardian']; ?></p>
					<p><?php echo $gd['student']; ?></p>
					<p><?php echo $gd['address']; ?></p>
					<p><?php echo $gd['contact']; ?></p>
				</div>
				<div class="col-xs-6 col-md-4">
					<form class="form-inline form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
						<input class="form-control" type="text" name="guardian" placeholder="Guardian Name"><br>
						<input class="form-control" type="text" name="student" placeholder="Student Name"><br>
						<input class="form-control" type="text" name="address" placeholder="Address"><br>
						<input class="form-control" type="text" name="contact" placeholder="Contact"><br>						

        				<input class="btn btn-default" type="submit" name="submit" value="EDIT"><br>
		            </form>
				</div>
			</div>

			<div class="cleaner"></div>
			<div class="cleaner"></div>


<?php


?>

					
		<?php
					}
				}


		?>
		</div>

	<?php require( 'includes/footer.php' ); ?>

</body>
</html>
