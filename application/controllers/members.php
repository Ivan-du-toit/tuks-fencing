<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/libraries/member.php');

class Members extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$member_id = $this->session->userdata('member_id');
		if ($member_id == false)
			$this->data['member'] = $this->current_user = new user();
		else
			$this->data['member'] = $this->current_user = $this->members_model->loadMember($member_id);
	}

	public function index()
	{
		$this->profile();
	}
	
	public function login() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		if ($email = $this->input->post('email', TRUE)) {
		
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$user = $this->members_model->loadMemberByEmail($email);
				if ($user->isMember()) {
					if ($user->matchPassword($password)) {
						$this->session->set_userdata('member_id', $user->getId());
						//redirect(base_url(), 'location', 200);
						redirect('/', 'refresh', 200);
					}
				}
				$this->load->view('login_view', array('error' => 'Invalid email + password combination'));
			} else 
				$this->load->view('login_view');
		} else
			$this->load->view('login_view');
	}
	
	public function register() {
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		
		if ($email = $this->input->post('email', true)) {
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[member.email]');
			$this->form_validation->set_rules('conf-email', 'E-Mail Confirmation', 'trim|required|matches[email]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('conf-password', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('DOB', 'Date Of Birth', 'trim|required|xss_clean');
			
			if ($this->form_validation->run()) {
			
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$name = $this->input->post('name', TRUE);
				$surname = $this->input->post('surname', TRUE);
				$weapons = array();
				foreach ($this->input->post('weapons', TRUE) as $weapon) 
					$weapons[] = $weapon;
				$DoB = strtotime($this->input->post('dob', TRUE));
				
				$this->members_model->newMember($email, $password, $name, $surname, $DoB, $weapons);
				
				redirect(base_url(), 'location', 200);
			} else
				$this->load->view('register_view');
		} else
			$this->load->view('register_view');
	}
	
	public function profile() {
		
	}
}