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
			$this->data['member'] = $this->currentMember = new user();
		else
			$this->data['member'] = $this->currentMember = $this->members_model->loadMember($member_id);
	}

	public function index() {
		$this->listEvents();
	}
	
	public function create() {
		$this->load->library('form_validation');
		if (!$this->currentMember->isAdmin()) {
			$this->load->view('header', $this->data);
			$this->load->view('no_access');
			$this->load->view('footer', $this->data);
			return;
		}
		if (!($name = $this->input->post('event_name', TRUE))) {
			$this->load->view('header', $this->data);
			$this->load->view('create_event_view');
			$this->load->view('footer', $this->data);
			return;
		}
		$this->form_validation->set_rules('event_name', 'Event Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('location', 'Event Location', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		if ($this->form_validation->run()) {
			$event_name = $this->input->post('event_name', TRUE);
			$description = $this->input->post('description', TRUE);
			$location = $this->input->post('location', TRUE);
			$start_date = $this->input->post('start_date', TRUE);
			$end_date = $this->input->post('end_date', TRUE);
			
			$weapons = $this->input->post('weapons', TRUE);
			$genders = $this->input->post('genders', TRUE);
			$ages = $this->input->post('ages', TRUE);
			$times = $this->input->post('start_times', TRUE);
			$categories = array();
			foreach($weapons as $key => $weapon) {
				$categories[] = array('weapon' => $weapon, 'gender' => $genders[$key], 'age' => $ages[$key], 'start_time' => $times[$key]);
			}
			
			$this->event_model->addEvent($event_name, $description, $location, $start_date, $end_date, $categories);
			redirect(base_url().'events/', 'refresh', 200);
		}
		$this->load->view('header', $this->data);
		$this->load->view('create_event_view');
		$this->load->view('footer', $this->data);
	}
	
	public function edit() {
		$this->load->library('form_validation');
		if (!$this->currentMember->isAdmin()) {
			$this->load->view('no_access');
			return;
		}
		if (!($event_id = $this->input->post('event_id', TRUE))) {
			$this->data['event_id'] = $this->uri->segment(3, -1);
			$this->data['event'] = $this->event_model->getEvent($this->data['event_id']);
			$this->data['categories'] = $this->event_model->getCategories($this->data['event_id']);
			$this->load->view('header', $this->data);
			$this->load->view('create_event_view', $this->data);
			$this->load->view('footer', $this->data);
			return;
		}
		
		$this->form_validation->set_rules('event_name', 'Event Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('location', 'Event Location', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
		if ($this->form_validation->run()) {
			$event_data['name'] = $this->input->post('event_name', TRUE);
			$event_data['description'] = $this->input->post('description', TRUE);
			$event_data['location'] = $this->input->post('location', TRUE);
			$event_data['start_date'] = $this->input->post('start_date', TRUE);
			$event_data['end_date'] = $this->input->post('end_date', TRUE);
			
			$weapons = $this->input->post('weapons', TRUE);
			$genders = $this->input->post('genders', TRUE);
			$ages = $this->input->post('ages', TRUE);
			$times = $this->input->post('start_times', TRUE);
			$categories = array();
			foreach($weapons as $key => $weapon) {
				$categories[] = array('weapon' => $weapon, 'gender' => $genders[$key], 'age' => $ages[$key], 'start_time' => $times[$key], 'event_id' => $event_id);
			}
			$this->event_model->update($event_id, $event_data, $categories);
			redirect(base_url().'events/', 'refresh', 200);
		}
		
		$this->data['event_id'] = $this->uri->segment(3, -1);
		$this->data['event'] = $this->event_model->getEvent($this->data['event_id']);
		$this->data['categories'] = $this->event_model->getCategories($this->data['event_id']);
		$this->load->view('header', $this->data);
		$this->load->view('create_event_view', $this->data);
		$this->load->view('footer', $this->data);
	}
	
	public function listEvents() {
		$this->data['events'] = $this->event_model->listEvents(date('Y', time()));
		$this->load->view('header', $this->data);
		$this->load->view('event_list_view', $this->data);
		$this->load->view('footer', $this->data);
	}
	
	public function view() {
		$id = $this->uri->segment(3, 0);
		$this->data['event'] = $this->event_model->getEvent($id);
		$this->data['categories'] = $this->event_model->getCategories($id, $this->currentMember->getID());
		$this->load->view('header', $this->data);
		$this->load->view('event_view', $this->data);
		$this->load->view('footer', $this->data);
	}
	
	public function attend() {
		if (!$this->currentMember->isMember()) {
			$this->load->view('no_access');
			return;
		}
		$this->load->library('form_validation');	
		$this->form_validation->set_rules('event_id', 'event_id', 'required');
		if ($this->form_validation->run()) {
			$event_id = $this->input->post('event_id', TRUE);
			$categories = $this->input->post('categories', TRUE);
			
			$oldCategories = $this->event_model->getCategories($event_id, $this->currentMember->getID());
			foreach ($oldCategories as $cat) {
				if ($cat->attend)
					$this->event_model->deleteAttendance($cat->id, $this->currentMember->getID());
			}
			
			if (sizeof($categories) == 0)
				$categories = array();
			foreach($categories as $category) {
				$this->event_model->registerForCategory($category, $this->currentMember->getID());
			}
			
			redirect(base_url().'events/view/'.$event_id, 'refresh', 200);
		}
	}
	
	public function delete() {
		if (!$this->currentMember->isAdmin()) {
			$this->load->view('no_access');
			return;
		}
		$id = $this->uri->segment(3, -1);
		$this->event_model->deleteEvent($id);
		redirect(base_url().'events', 'refresh', 200);
	}
	
	private function _getCurrentMember() {
		return $this->currentMember;
	}
}