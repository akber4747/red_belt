<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>	
	<title>Red Belt</title>
</head>
<body>
	<div class="container">	
		<div class="row jumbotron">
			<?php 
				echo '<p>Welcome, '. $this->session->userdata['user_name'].'!</p>';
				echo $this->session->userdata['user_email'];
				// var_dump($this->session->userdata)	;
				echo '<br><a href="/appointments/logout">You can logout here!</a>'
				
			 ?>
		</div>	
		<div class="row jumbotron">
			<form class="form-group col-sm-6" action="/appointments/add_appointment_cont" method="post">
					<h2>Add Your Appointment!</h2>
					
						<?php if($this->session->flashdata('errors'))
						{
						echo '<div style="color: red; background: black;border: 2px solid red; border-radius: 8px; margin-bottom: 5px; padding: 5px; text-align: center;">';
						echo $this->session->flashdata('errors');
						echo '</div>';
						}; ?>
					<input type="hidden" name="action" value="add-appointment">
					<div class='form-group'>
						<input type="text" class="form-control" name="appointment_task" placeholder="appointment task">
					</div>
					<div class='form-group'>
						<input type="date" class="form-control" name="appointment_date">
					</div>					
					<div class='form-group'>
						<input type="text" class="form-control" name="appointment_time" placeholder="HH:MM">
						
					</div>
					<div class='form-group'>
						<input class="btn" type="submit" value="Add the Appointment!">
					</div>

			</form>	
			<div class="col-sm-6">
				<h3>Today's Appointments</h3>
				<h6>(scroll down for future appointments)</h6>
				<table class="table table-striped table-hovered table-hover table-bordered">
					<tr>
						<th>Task</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				
			
					<?php 
					if ($this->session->flashdata('success'))
					{
						echo $this->session->flashdata('success');
					};

					
						
					foreach($all_appointments as $all){
						if($all['date'] === date('Y-m-d')){	

						echo '<tr><td>'.$all['task'].'</td>';
						echo '<td>'.$all['date'].'</td>';
						echo '<td>'.$all['time'].'</td>';
						echo '<td>'.$all['status'].'</td>';			
						echo '<td><a href="/appointments/destroy/'.$all['id'].'">remove</a><br><a id="edit_link" href="/appointments/update_course_1/'.$all['id'].'">edit</td></tr>';
						}


					}?>
				</table>
				<?php
					if($this->session->userdata('edit')){
						echo '<textarea type="text" name="course_description_update" class="form-control" placeholder="course description"></textarea>';
					}

					 ?>
				</div>
			</div>
				<div class="row">
					<h3>Your future appointments</h3>
					<table class="table table-striped table-hovered table-hover table-bordered">
						<tr>
							<th>Task</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
					<?php 
					foreach($all_appointments as $all){
						if($all['date'] !== date('Y-m-d')) {

							echo '<tr><td>'.$all['task'].'</td>';
							echo '<td>'.$all['date'].'</td>';
							echo '<td>'.$all['time'].'</td>';
							echo '</tr>';
						}
					}
					?>	
					</table>
				</div>
			</div>
		</div>
	</div>	

</body>
</html>