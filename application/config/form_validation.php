<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'users/register' => array(
		array(
			'field'	=> 'first_name',
			'label'	=> 'first name',
			'rules'	=> 'required|trim'
		),
		array(
			'field' => 'last_name',
			'label' => 'last name',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'required|trim|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'required'
		)
	),
	
	'users/login' => array(
		array(
			'field' => 'email',
			'label' => 'email address',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'required'
		)
	)
);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */