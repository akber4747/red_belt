<?php

class Appointment extends CI_Model
{
	function register_user($user){
		$register_user_query = "INSERT INTO users (name, email, password, dob, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		$register_values = array($user['name'], $user['email'], $user['password'], $user['dob'], date("Y-m-d, h:i:s"), date("Y-m-d, h:i:s"));
		return $this->db->query($register_user_query, $register_values);

	}
	function get_by_email($user_email){
		return $this->db->query("SELECT * FROM users WHERE email = ?", array($user_email))->row_array();
	}
	function get_all_appointments(){
	return $this->db->query("SELECT * FROM appointments ORDER BY created_at DESC")->result_array();
	}

}
