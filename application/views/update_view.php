<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>	
	<title>Red Belt - Update Appointment</title>
</head>
<body>
	<div class="container">	
		<form class="form-group col-sm-6" action=<?php echo '/appointments/update_appointment_2/'.$this->session->userdata('id')?> method="post">
					<div class="row jumbotron">
						<?php 
							echo '<p>Hi, '. $this->session->userdata['user_name'].'!</p>';
							echo $this->session->userdata['user_email'];
							// var_dump($this->session->userdata)	;
							echo '<br><a href="/appointments/logout">You can logout here!</a>'				
						 ?>
					</div>	
					<h2>Update the appointment info!</h2>	
					<?php if($this->session->flashdata('errors'))
					{
					echo $this->session->flashdata('errors');
					};
					// if($this->session->userdata('id')){
					// 	// echo $this->session->userdata('id');
					// }
					 ?>
					<input type="hidden" name="action" value="update-appointment">
					<div class='form-group'>
						<input type="text" class="form-control" name="appointment_task_update" placeholder="appointment task">
					</div>					
					<div class='form-group'>
						<input type="date" class="form-control" name="appointment_date_update" placeholder="appointment date">
					</div>
					<div class='form-group'>
						<input type="text" class="form-control" name="appointment_time_update" placeholder="appointment time">
					</div>
					<div class='form-group'>
						<input class="btn" type="submit" value="Update">
					</div>

		</form>	
	</div>	

</body>
</html>