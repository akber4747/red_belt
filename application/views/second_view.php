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
		<div class="row">
			<form class="form-group col-sm-6" action="/appointments/add_appointment_cont" method="post">
					<h2>Add Your Appointment!</h2>	
					<?php if($this->session->flashdata('errors'))
					{
					echo $this->session->flashdata('errors');
					}; ?>
					<input type="hidden" name="action" value="add-appointment">
					<div class='form-group'>
						<input type="text" class="form-control" name="appointment_name" placeholder="appointment name">
					</div>
					<div class='form-group'>
						<textarea type="text" class="form-control" name="app_description" placeholder="appointment description">
						</textarea>
					</div>
					<div class='form-group'>
						<input class="btn" type="submit" value="Add the Appointment!">
					</div>

			</form>	
			<div class="col-sm-6">
				<table class="table table-striped table-hovered table-hover table-bordered">
					<tr>
						<th>Task</th>
						<th>Time</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				
			
					<?php 
					// if ($this->session->flashdata('success'))
					// {
					// 	echo $this->session->flashdata('success');
					// };
					// foreach($all_courses as $all){
					// 	echo '<tr><td>'.$all['name'].'</td>';
					// 	echo '<td id="description_field">'.$all['description'].'</td>';
					// 	echo '<td>'.$all['created_at'].'</td>';			
					// 	echo '<td><a href="/appointments/destroy/'.$all['id'].'">remove</a></td>';
					// 	echo '<td><a id="edit_link" href="/appointments/update_course_1/'.$all['id'].'">edit</td></tr>';
					// }
					
					// if($this->session->userdata('edit')){
					// 	echo '<textarea type="text" name="course_description_update" class="form-control" placeholder="course description"></textarea>';
					// }

					 ?>
					</table>		
				</div>
			</div>
		</div>
	</div>	

</body>
</html>