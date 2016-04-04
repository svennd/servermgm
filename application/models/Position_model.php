<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Position_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'position';
        $this->primary_key = 'id';
		
        $this->has_many['rack'] = array(
                                  'foreign_model'	    => 'Racks_models',
                                  'foreign_table'	    => 'racks',
                                  'foreign_key'	      => 'id',
                                  'local_key'		      => 'rack'
                                  );
                                  
        $this->has_many['devices'] = array(
                                  'foreign_model'	    => 'Devices_model',
                                  'foreign_table'	    => 'devices',
                                  'foreign_key'	      => 'id',
                                  'local_key'		      => 'device'
                                  );
		  parent::__construct();
	}
}