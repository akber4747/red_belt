<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function register (){

	$this->load->library('form_validation');
	$this->form_validation->set_rules("name", "Name", 'required|min_length[1]|max_length[25]');
	$this->form_validation->set_rules("email", "Email", 'required|valid_email');
	$this->form_validation->set_rules("password", "Password", 'required|min_length[8]|matches[password_confirmation');
	$this->form_validation->set_rules("password_confirmation", "Password Confirmation", 'required');
	$this->load->model('Appointment');

	if($this->form_validation->run() === FALSE){
		$this->session->set_flashdata('errors', validation_errors());
		redirect(base_url());
	}
	$user_details = array(
		"name"=> $this->input->post('name'),
		"email"=> $this->input->post('email'),
		"password"=> $this->input->post('password'),
		"dob"=> $this->input->post('dob')
		);
	$add_user = $this->Appointment->register_user($user_details);
	$this->session->set_flashdata('success', 'You successfully registered!');
	redirect(base_url());
	}

	public function login(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', "Email", 'required|valid_email');
		// checking email and password against what is in the database
		//first setting THIS POST('PASSWORD') TO A VARIABLE
		$password = $this->input->post('password');
		$email = $this->input->post('email');		
		$this->load->model('Appointment');
		// echo $email;
		$user = $this->Appointment->get_by_email($email);

		// var_dump($user);
		// die();
		if($user && $user['password'] == $password){


			$this_user = array(
					'user_id'=> $user['id'],
					'user_name'=> $user['name'],
					'user_email'=> $user['email'],
					'user_password'=> $user['password'],
					'user_dob'=> $user['dob'],
					'user_created_at'=> $user['created_at'],
					'user_updated_at'=> $user['updated_at'],					
				);
			$this->session->set_userdata($this_user);

			redirect('/appointments/second_view');

		}
		else{
			$this->session->set_flashdata('login_error', "This was invalid son!");
			redirect(base_url());
		}
	}
	public function second_view(){
	$this->output->enable_profiler(TRUE);
	$this->load->model('Appointment');
	$all_appointments = $this->Appointment->get_all_appointments();
	$this->view_all['all_appointments'] = $all_appointments;
	$this->load->view('second_view', $this->view_all);
	}
	public function add_appointment_cont(){
		// $this->output->enable_profiler(TRUE);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('appointment_task', 'task of the appointment', 'required|min_length[3]');
		$this->load->model('Appointment');

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/appointments/second_view');
		}

		$appointment_details = array(
			"task"=> $this->input->post('appointment_task'),
			"appointment_date"=> $this->input->post('appointment_date'),
			"appointment_time"=> $this->input->post('appointment_time'),
			"appointment_status"=>'pending',
			"users_id"=> $this->session->userdata('user_id'),
			"appointment_id"=> $this->session->userdata('appointment_id')
			);
		$appointment_query = $this->Appointment->add_appointment_mod($appointment_details);
		$this->session->set_flashdata('success', 'You successfully added the appointment!');
		redirect('/appointments/second_view');
	}	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */