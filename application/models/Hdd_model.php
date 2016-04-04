<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Hdd_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'hdd';
        $this->primary_key = 'id';
		
		# connections
		$this->has_one['devices'] = array(
											'foreign_model'	=> 'Devices_model',
											'foreign_table'	=> 'devices',
											'foreign_key'	=> 'id',
											'local_key'		=> 'server'
										);
		
		parent::__construct();
	}
}