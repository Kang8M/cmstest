<?php

class Setup_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbforge();
	}

	public function setCMSField($_field_value = null)
	{
		if(is_null($_field_value)) {
			return false;
		} else {
			$this->dbforge->add_field($_field_value);
		}
	}

	public function setupCMSTable($_table_value = null)
	{
		if(is_null($_table_value)){
			return false;
		} else {
			$this->dbforge->create_table($_table_value, TRUE);
		}
	}

	public function setCMSFieldKey($field = null)
	{
		if(is_null($field)) {
			return false;
		} else {
			$this->dbforge->add_key($field,TRUE);
		}
	}

	public function getDefaultCMSTable()
	{
		return [
			'tbl_blog',
			'tbl_product',
			'tbl_category'
		];
	}

	public function getCMSField()
	{
		return [
			'tbl_blog' => [
				'id' => [
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE,
				],
				'blog_title' => [
					'type' => 'VARCHAR',
					'constraint' => '100',
				],
				'blog_author' => [
					'type' =>'VARCHAR',
					'constraint' => '100',
					'default' => 'King of Town',
				],
				'blog_description' => [
					'type' => 'TEXT',
					'null' => TRUE,
				],
			],
			'tbl_product' => [
				'id' => [
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				],
				'title' => [
					'type' => 'VARCHAR',
					'constraint' => '100',
				],
			],
			'tbl_category' => [
				'cate_id' => [
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				],
				'name' => [
					'type' => 'VARCHAR',
					'constraint' => '100',
				],
			]
		];
	}

	public function getCMSFieldKey()
	{
		return [
			'tbl_blog' => 'id',
			'tbl_product' => 'title',
			'tbl_category' => 'cate_id',
		];
	}
}