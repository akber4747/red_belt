<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="/assets/css/styles.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>	
	<title>Red Belt! First try...</title>

</head>
<body>
	<div class="container">		
		<div id="row" class="jumbotron">
			<h3>Red Belt! First try...</h3>
		</div>
		<div id="row">
			<?php 
				if($this->session->flashdata('errors'))
				{
					echo $this->session->flashdata('errors');
				};
				if($this->session->flashdata('success')){
					echo $this->session->flashdata('success');
				}
				if($this->session->flashdata('login_error')){
					echo $this->session->flashdata('login_error');
				}
			 ?>

		</div>
		<div id="row" class=" col-sm-6">
			<form class="form-vertical" action="/appointments/register" method="post">
				<h2>Register</h2>
				<div class='form-group'>
				<input type="hidden" name="action" value="register">
				</div>
				<div class='form-group'>
				<input type="text" name="name" placeholder="name">
				</div>
				<div class='form-group'>
				<input type="text" name="email" placeholder="e-mail">
				</div>
				<div class='form-group'>				
				<input type="password" name="password" placeholder="password">
				</div>
				<div class='form-group'>				
				<input type="password" name="password_confirmation" placeholder="confirm password">
				</div>
				<div class='form-group'>				
				<input type="date" name="dob" placeholder="MM/DD/YYYY">
				</div>
				<div class='form-group'>
				<input class="btn" type="submit" value="Register">
				</div>
			</form>
		</div>
		<div id="row" class="form-group col-sm-6">
			<form class="form-group" action="/appointments/login" method="post">
				<h2>Login</h2>
				<input type="hidden" name="action" value="login">
				<div class='form-group'>
				<input type="text" name="email" placeholder="e-mail">
				</div>
				<div class='form-group'>
				<input type="password" name="password" placeholder="password">
				</div>
				<div class='form-group'>
				<input class="btn" type="submit" value="Login">
				</div>
			</form>
		</div>
	</div>
</body>
</html>