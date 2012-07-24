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
    function get_latest_entry()
	{
		$this->db->order_by("date", "desc");
		$query = $this->db->get('news', 1);
        return $query->result();
	}
	
    function get_all_entries($limit, $start)
    {
		$this->db->limit($limit, $start);
		$this->db->order_by('date', 'desc');
        $query = $this->db->get('news');
		
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	function record_count()
	{
		return $this->db->count_all('news');
	}

    function insert_entry($title, $content, $author)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->date    = date("Y/m/d H:i:s");
		$this->author  = $author;

        $this->db->insert('news', $this);
    }

    function update_entry($id, $title, $content)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->date    = date("Y/m/d H:i:s");

        $this->db->update('news', $this, array('id' => $id));
    }
	
	function retrieve_entry($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('news');
		return $query->result();
	}
	
	function delete_entry($id)
	{
		$this->db->delete('news', array('id' => $id));
	}
	
}
?>