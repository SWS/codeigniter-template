<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('users_model');
	}

	public function index()
	{
		$data->title	= 'Home';
		$data->content	= 'users/index';

		$this->load->vars($data);
		$this->load->view('template');
	}

	public function register()
	{
		$this->load->library('form_validation');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data->title = 'Register';
			$data->content = 'users/register';
			
			$this->load->vars($data);
			$this->load->view('template');
		}
		else
		{
			// Process registration
			if ($this->users_model->register())
			{
				// Registration was successful.
				$this->session->set_flashdata('success', 'Registration was successful, welcome!');
			}
			else
			{
				// Registration was unsuccessful.
				$this->session->set_flashdata('error', 'An error occurred during registration, please try again later.');
			}
			
			redirect();
		}
	}

	public function login()
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			// Display login form.
			$data->title = 'Login';
			$data->content = 'users/login';

			$this->load->vars($data);
			$this->load->view('template');
		}
		else
		{
			// Process login form.
			if ($this->users_model->login())
			{
				// Login was successful.
			}
			else
			{
				// Login was unsuccessful.
				$this->session->set_flashdata('error', 'There was an error logging in. Please try again later.');
			}

			redirect();
		}
	}

	public function logout()
	{
		$this->users_model->logout();
		redirect();
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */