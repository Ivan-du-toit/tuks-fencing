<?php
class event_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function listEvents($year) {
		$this->db->where(array('date >=' => $year, 'date <' => $year+1));
		$result = $this->db->get('event');
		return $result->result_array();
    }
	
	public function getEvent($id) {
		$result = $this->db->get_where('event', array('id' => $id));
		return $result->result_array();
    }
	
	public function listFutureEvents() {
		$result = $this->db->get_where('event', array('date >=' =>date('Y-m-d', now())));
		return $result->result_array();
    }

    public function addEvent($name, $description, $date, $categories){
        $this->db->insert('event', array('name' => $name, 'description' => $description, 'date' => $date));
		$id = $this->db->insert_id();
		foreach ($categories as $gender => $weapons) {
			foreach ($weapons as $weapon => $ages) {
				foreach ($ages as $age => $startTime) {
					$this->db->insert('event_category', array('event_id' => $id, 'weapon' => $weapon, 'age' => $age, 'gender' => $gender, 'start_time' => $startTime));
				}
			}
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
}
?>