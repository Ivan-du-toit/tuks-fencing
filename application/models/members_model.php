<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('application/libraries/member.php');

class members_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function loadMember($id) {
		$result = $this->db->get_where('member', array('id' => $id), 1);
		return memberFactory::getMember($this, $result->row_object());
    }

    public function loadMemberByEmail($email) {
        $result = $this->db->get_where('member', array('email' => $email), 1);
		return memberFactory::getMember($this, $result->row_object());
    }
	
	public function update($id, $data) {
		$this->db->where('id', $id);
        $this->db->update('member', $data);
    }
	
	public function newMember($email, $password, $name, $surname, $club, $DoB, $weapons) {
		$data = array('email' => $email, 
					'password' => member::hashPassword($password),
					'name' => $name,
					'surname' => $surname,
					'club' => $club,
					'birth_date' => date('Y-m-d', $DoB),
					'weapons' => implode(',' , $weapons)
				);
        $this->db->insert('member', $data);
		return $this->db->insert_id();
    }

    public function delete($id) {
		$this->db->delete('member', array('id' => $id));
    }
}
?>