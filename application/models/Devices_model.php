<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Devices_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'devices';
        $this->primary_key = 'id';
		
        $this->has_one['rack'] = array(
                                  'foreign_model'	    => 'Racks_model',
                                  'foreign_table'	    => 'racks',
                                  'foreign_key'	      => 'id',
                                  'local_key'		      => 'rack'
                                  );
                                  
        $this->has_many['hdd'] = array(
                                  'foreign_model'	    => 'Hdd_model',
                                  'foreign_table'	    => 'hdd',
                                  'foreign_key'	      => 'device',
                                  'local_key'		      => 'id'
                                  );
                                  
        $this->has_many['events'] = array(
                                  'foreign_model'	    => 'Events_model',
                                  'foreign_table'	    => 'events',
                                  'foreign_key'	      => 'device',
                                  'local_key'		      => 'id'
                                  );
		  parent::__construct();
	}
}