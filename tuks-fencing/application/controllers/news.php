<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	var $data = array();
	
	public function __construct() {
		parent::__construct();
		$member_id = $this->session->userdata('member_id');
		if ($member_id == false)
			$this->data['member'] = $this->current_user = new user();
		else
			$this->data['member'] = $this->current_user = $this->members_model->loadMember($member_id);
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/news
	 *	- or -  
	 * 		http://example.com/index.php/news/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('news_model');
		$this->load->view('welcome_message', array('entries' => $this->news_model->get_last_ten_entries()));
	}
	
	private function _getCurrentUser() {
		return $this->data['member'];
	}
}