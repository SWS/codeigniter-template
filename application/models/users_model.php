<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	// CREATE
	public function register()
	{
		// Load the bcrypt library.
		$this->load->library('bcrypt');

		// Define INSERT parameters.
		$data = array(
			'first_name'	=> $this->input->post('first_name'),
			'last_name'		=> $this->input->post('last_name'),
			'email'			=> $this->input->post('email'),
			'password'		=> $this->bcrypt->hash($this->input->post('password'))
		);

		// INSERT user into database.
		if ($this->db->insert('users', $data, 1))
		{
			// Insertion was successful.
			return $this->db->insert_id();
		}
		
		// Insertion was unsuccessful.
		return FALSE;
	}

	// READ
	public function login()
	{
		// Load the bcrypt library.
		$this->load->library('bcrypt');

		// Define WHERE parameters.
		$where = array(
			'email'	=> $this->input->post('email')
		);

		// Attempt to retrieve user.
		$user = $this->db->select('id', 'first_name', 'last_name', 'email', 'password')->get_where('users', $where, 1)->row();

		// Check to see if the user exists.
		if (!$user)
		{
			// User does not exist.
			return FALSE;
		}
		else
		{
			// User does exist.
			
			// Attempt to validate password.
			if ($this->bcrypt->check($this->input->post('password'), $user->password))
			{
				// Password matches the one stored in the database.
				
				// Create an object of user information to insert into the session.
				$data = array(
					'id'			=> $user->id,
					'first_name'	=> $user->first_name,
					'last_name'		=> $user->last_name,
					'email'			=> $user->email
				);

				// Set the session using the data.
				$this->session->set_userdata($user);

				return TRUE;
			}

			// Password does not match the one stored in the database.
			return FALSE;
		}
	}

	// UPDATE
	public function update()
	{
		// Load the bcrypt library.
		$this->load->library('bcrypt');

		// Define UPDATE parameters.
		$data = array(
			'first_name'	=> $this->input->post('first_name'),
			'last_name'		=> $this->input->post('last_name'),
			'email'			=> $this->input->post('email'),
			'password'		=> $this->bcrypt->hash($this->input->post('password'))
		);

		// Define WHERE parameters.
		$where = array(
			'id'	=> $this->session->userdata('id')
		);

		// Attempt the update.
		$this->db->update('users', $data, $where, 1);
		
		return ($this->db->affected_rows() == 1 ? TRUE : FALSE);
	}

	// DESTROY
	public function logout()
	{
		// Destroy the existing session.
		$this->session->sess_destroy();

		return TRUE;
	}
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */