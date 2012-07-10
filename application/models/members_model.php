<?php
class event_model extends CI_Model {
    function __construct($ID)
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function loadMember($ID)
    {
		//TODO implement
    }

    public function loadMemberByEmail($email)
    {
        //TODO implement
    }
	
	public function update($data)
    {
        //TODO implement
    }
	
	public function new()
    {
        //TODO implement
    }

    public function delete($ID)
    {
        //TODO implement
    }

	public function registerForEvent($eventID, $memberID, $weapon, $age)
	{
		//TODO implement
	}
}
?>