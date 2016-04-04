<?php  
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ipmi_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'ipmi';
        $this->primary_key = 'id';
		
		# connections
		$this->has_one['devices'] = array(
											'foreign_model'	=> 'Devices_model',
											'foreign_table'	=> 'devices',
											'foreign_key'	=> 'id',
											'local_key'		=> 'device'
										);
		
		parent::__construct();
	}
}