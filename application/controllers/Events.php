<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/libraries/member.php');

class Events extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$member_id = $this->session->userdata('member_id');
		if ($member_id == false)
			$this->data['member'] = $this->current_user = new user();
		else
			$this->data['member'] = $this->current_user = $this->member_model->loadMember($member_id);
	}

	public function index() {
		$this->load->model('event_model');
	}
	
	public function create() {
		//TODO: Finish
	}
	
	public function edit() {
		//TODO: Finish
	}
	
	public function listEvents() {
		//TODO: Finish
	}
	
	public function view() {
		//TODO: Finish
	}
	
	public function subscribe() {
		//TODO: Finish
	}
	
	private function _getCurrentUser() {
		return $this->currentMember;
	}
}