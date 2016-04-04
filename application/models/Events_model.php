<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'events';
        $this->primary_key = 'id';
		
        $this->has_one['device'] = array(
                                  'foreign_model'	    => 'Devices_model',
                                  'foreign_table'	    => 'devices',
                                  'foreign_key'	      => 'id',
                                  'local_key'		      => 'device'
                                  );
		  parent::__construct();
	}
}