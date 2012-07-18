<?php
class event_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function listEvents($year) {
		$this->db->where(array('start_date >' => $year));
		$result = $this->db->get('event');
		return $result->result_object();
    }
	
	public function getEvent($id) {
		$result = $this->db->get_where('event', array('id' => $id));
		$event = $result->result_object();
		if (sizeof($event)==0)
			return NULL;
		return $event[0];
    }
	
	public function getCategories($eventId, $member_id = -1) {
		if ($member_id > -1) {
			$query = $this->db->query("select *, (member_id = {$this->db->escape($member_id)}) as attend from event_category
					left join attendance on event_category.id = category_id WHERE event_id = {$this->db->escape($eventId)}");
			return $query->result_object();
		}
		else
			$result = $this->db->get_where('event_category', array('event_id' => $eventId));
		return $result->result_object();
    }
	
	public function listFutureEvents() {
		$result = $this->db->get_where('event', array('start_date >=' =>date('Y-m-d', now())));
		return $result->result_object();
    }

    public function addEvent($name, $description, $location, $start_date, $end_date, $categories){
        $this->db->insert('event', array('name' => $name, 'description' => $description, 'start_date' => $start_date, 'end_date' => $end_date));
		$id = $this->db->insert_id();
		foreach ($categories as $category) {
			$this->db->insert('event_category', array('event_id' => $id, 'weapon' => $category['weapon'], 'age' => $category['age'], 'gender' => $category['gender'], 'start_time' => $category['start_time']));
		}
		return $id;
    }
	
	public function editEvent($id, $data) {
        $this->db->update('event', $data);
    }
	
	public function deleteEvent($id) {
        $this->db->delete('event', array('id' => $id));
    }

    public function getAllEligibleMembers($eventID) {
        //TODO implement
    }

	public function registerForCategory($categoryID, $memberID) {
		$this->db->insert('attendance', array('category_id' => $categoryID, 'member_id' => $memberID));
		return $this->db->insert_id();
	}
	
	public function deleteAttendance($category_id, $member_id) {
		$this->db->delete('attendance', array('category_id' => $category_id, 'member_id' => $member_id));
	}
}
?>