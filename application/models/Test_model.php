<?php
class Test_model extends CI_Model
{
	const TABLE = "tbl_test";
	private $id;
	private $name;
	private $sex;

	public function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    }

	public function getTest()
	{
		$query = $this->db->get($this::TABLE);
        return $query->result();
	}
}
