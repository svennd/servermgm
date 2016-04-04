<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hdd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('devices_model', 'devices');
		$this->load->model('hdd_model', 'hdd');
		$this->load->model('events_model', 'events');
		$this->load->library(array('form_validation'));
	}
	
	public function index($show_filter = false)
	{
		$data['filter'] 		= true;
		$data['filter_text'] 	= $show_filter;
		
		switch (strtolower($show_filter))
		{
			# in use by server
			case "hot" :
				$data['hdd_list'] = $this->hdd->where("status", "hot")->with_devices()->get_all();
			break;
			
			# hot spare for raid
			case "hot_spare" :
				$data['hdd_list'] = $this->hdd->where("status", "hot_spare")->with_devices()->get_all();
			break;
			
			# cold not in use
			case "cold" :
				$data['hdd_list'] = $this->hdd->where("status", "cold")->with_devices()->get_all();
			break;
			
			# for backup purpose
			case "backup" :
				$data['hdd_list'] = $this->hdd->where("status", "backup")->with_devices()->get_all();
			break;
			
			# in RMA process / replaced / lost / dead
			case "lost" :
				$data['hdd_list'] = $this->hdd->where("status", array("replaced", "RMA", "dead"))->with_devices()->get_all();
			break;
			
			default :
				$data['filter'] = false;
				$data['hdd_list'] = $this->hdd->with_devices()->where("status NOT", array("replaced", "RMA", "dead"))->get_all();
		}
		$this->smg_page('hdd/index', $data);
	}
	
	public function add($ok = false)
	{
		$data['added'] = (bool) $ok;
		$data['devices'] = $this->devices->get_all();
		$this->smg_page('hdd/add', $data);
	}
		
	public function remove($id)
	{
		# soft delete
		$this->hdd->delete($id);
		
		# its gone, lets go back
		redirect('hdd', 'refresh');
	}
		
	public function edit($id)
	{
		$data['added'] = false;
		$data['hdd'] = $this->hdd->with_devices()->get((int)$id);
		$data['devices'] = $this->devices->get_all();
		$data['edit'] = true;
		$this->smg_page('hdd/add', $data);
	}
	
	public function store()
	{
		if ($this->input->post('edit'))
		{
			$this->hdd->update(
				array(
					'server' 		=> (int)$this->input->post('device'),
					'serial' 		=> $this->input->post('serial'),
					'brand' 		=> $this->input->post('brand'),
					'capacity' 		=> $this->input->post('capacity'),
					'vendor' 		=> $this->input->post('vendor'),
					'warranty' 		=> $this->input->post('warranty'),
					'bought' 		=> $this->input->post('bought'),
					'notes' 		=> $this->input->post('notes'),
					'status' 		=> $this->input->post('status')
				),
					# where
					array ('id' => (int) $this->input->post('id'))
				);
				$this->events->insert(array('title' => "updated hdd : ". $hdd_id, 'device' => (int)$this->input->post('device'), 'auto' => 1));
		}
		else
		{
			$hdd_id = $this->hdd->insert(
					array(
						'server' 		=> (int)$this->input->post('device'),
						'serial' 		=> $this->input->post('serial'),
						'brand' 		=> $this->input->post('brand'),
						'capacity' 		=> $this->input->post('capacity'),
						'vendor' 		=> $this->input->post('vendor'),
						'warranty' 		=> $this->input->post('warranty'),
						'bought' 		=> $this->input->post('bought'),
						'notes' 		=> $this->input->post('notes'),
						'status' 		=> $this->input->post('status')
				));
				$this->events->insert(array('title' => "added hdd : ". $hdd_id, 'device' => (int)$this->input->post('device'), 'auto' => 1));
		}
		# good its added
		if ($this->input->post('submit_next'))
		{
			redirect('hdd/add/ok', 'refresh');
		}
		else
		{
		  redirect('hdd', 'refresh');
		}
	}
	
	# just create a full page at once
	private function smg_page($page, $data = array())
	{
		$this->load->view('default/header');
		$this->load->view($page, $data);
		$this->load->view('default/footer');
	}
}
