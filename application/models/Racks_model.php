<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Racks_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'racks';
        $this->primary_key = 'id';
		
      $this->has_many['devices'] = array(
                                        'foreign_model'	  => 'Devices_model',
                                        'foreign_table'   => 'devices',
                                        'foreign_key'	    => 'rack',
                                        'local_key'		    => 'id'
                                        );
										
		  parent::__construct();
	}
}