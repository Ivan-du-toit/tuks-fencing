<?php
class news_model extends CI_Model {
    var $title   = '';
    var $content = '';
    var $date    = '';
	var $author  = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('news', 10);
        return $query->result();
    }

    function insert_entry($title, $content, $author)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->date    = time();
		$this->author  = $author;

        $this->db->insert('entries', $this);
    }

    function update_entry($id, $title, $content)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $id));
    }

}
?>