<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid pt-4">
		<div class="row justify-content-center align-items-center">
			<div class="col col-sm-12 col-md-6 col-lg-6 col-xl-5">
				<div class="card text-white bg-info mb-3">
					<!-- <div class="card-header">Header</div> -->
						<div class="card-body">
							<h5 class="card-title">New Registration</h5>
							<p class="card-text">Click here to fill out the form.</p>
							<a href="<?php echo base_url(); ?>Welcome/" class="stretched-link"></a>
						</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center">
			<div class="col col-sm-12 col-md-6 col-lg-6 col-xl-5">
				<div class="card text-white bg-secondary mb-3">
					<!-- <div class="card-header">Header</div> -->
						<div class="card-body">
							<h5 class="card-title">Already Registered?</h5>
								<p class="card-text">Click here.</p>
							<a href="<?php echo base_url(); ?>IndexLogin/" class="stretched-link"></a>						
						</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
