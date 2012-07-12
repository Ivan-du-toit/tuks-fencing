<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	var $data = array();
	
	public function __construct() {
		parent::__construct();
		$member_id = $this->session->userdata('member_id');
		if ($member_id == false)
			$this->data['member'] = $this->currentMember = new user();
		else
			$this->data['member'] = $this->currentMember = $this->members_model->loadMember($member_id);
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
		$this->load->helper(array('form', 'url'));
		$this->load->view('home_view', array('entries' => $this->news_model->get_last_ten_entries(), 'user' => $this->_getCurrentUser()));
	}
	
	public function create()
	{
		$user = $this->_getCurrentUser();
		$this->load->model('news_model');
		
		if ($user->isAdmin())
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			if ($title = $this->input->post('title', TRUE)) {
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');
				
				if ($this->form_validation->run()) {
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$userid = $user->getID();
					
					$this->news_model->insert_entry($title, $content, $userid);
					redirect(base_url(), 'refresh', 200);
				}
				else
					$this->load->view('create_view');
			}
			else
				$this->load->view('create_view');
		}
		else
			$this->load->view("no_access");
	}
	
	public function edit($postid = 0)
	{
		$user = $this->_getCurrentUser();
		$this->load->model('news_model');
		
		if ($user->isAdmin())
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			if ($title = $this->input->post('title', TRUE)) {
				$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('content', 'Content', 'required');
				
				if ($this->form_validation->run()) {
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					
					$this->news_model->update_entry($postid, $title, $content);
					//redirect(base_url(), 'refresh', 200);
					redirect('/', 'refresh', 200);
				}
				else
					$this->load->view('edit_view');
			}
			else
				$this->load->view('edit_view', array('post' => $this->news_model->retrieve_entry($postid)));
		}
		else
			$this->load->view("no_access");
	}
		
	private function _getCurrentUser() {
		return $this->currentMember;
	}
	
}