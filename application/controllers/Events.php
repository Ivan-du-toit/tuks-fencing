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
		$this->listEvents();
	}
	
	public function create() {
		if (!$this->currentMember->isAdmin()) {
			$this->load->view('no_access');
			return;
		}
		if (!($name = $this->input->post('name', TRUE))) {
			$this->load->view('create_event_view');
			return;
		}
		//TODO: Process info
	}
	
	public function edit() {
		if (!$this->currentMember->isAdmin()) {
			$this->load->view('no_access');
			return;
		}
		if (!($name = $this->input->post('name', TRUE))) {
			$this->load->view('create_event_view');
			return;
		}
		//TODO: Process info
	}
	
	public function listEvents() {
		$events = $this->event_model->listEvents(date('Y', now()));
		$this->load->view('event_list_view', $events);
	}
	
	public function view() {
		$id = $this->uri->segment(3, 0);
		$event = $this->event_model->getEvent($id);
		$this->load->view('event_view', $event);
	}
	
	public function attend() {
		if (!$this->currentMember->isMember()) {
			$this->load->view('no_access');
			return;
		}
		//TODO: Process info
	}
	
	private function _getCurrentUser() {
		return $this->currentMember;
	}
}