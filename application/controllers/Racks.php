<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Racks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('racks_model', 'racks');
		$this->load->model('devices_model', 'devices');
		$this->load->model('events_model', 'events');
		$this->load->model('position_model', 'position');
		$this->load->library(array('form_validation'));
	}
	
	public function index()
	{
		$data['rack_list'] = $this->racks->with_devices()->get_all();
		$this->smg_page('racks/index', $data);
	}
	
	public function add()
	{
		$this->smg_page('racks/add');
	}
		
	public function remove($id)
	{
		# some devices might now be "rackless"..
		$this->racks->delete((int)$id);
		
		# its gone, lets go back
		redirect('/racks', 'refresh');
	}
		
	public function edit($id)
	{
		$data['rack_info'] = $this->racks->get((int)$id);
		$data['edit'] = true;
		$this->smg_page('racks/add', $data);
	}
	
	public function store()
	{
		$form_config = array(
			array('field' => 'name', 'label' => 'name', 'rules' => 'required'),
			array('field' => 'size', 'label' => 'size', 'rules' => 'required')
		);
		$this->form_validation->set_rules($form_config);
		
		if ($this->form_validation->run() == FALSE)
		{
			# throw back the edit page
			var_dump($this->form_validation->error());
			$this->smg_page('racks/add', array('store' => false));
		}
		else
		{
			if ($this->input->post('edit'))
			{
			  
				$this->racks->update(
					array(
						'name' 			  => $this->input->post('name'),
						'size' 			  => (int) $this->input->post('size'),
						'location' 		=> $this->input->post('location'),
						'notes' 		  => $this->input->post('notes')
					),
						# where
						array ('id' => (int) $this->input->post('id'))
					);
					
					# new size : remove all then recreate
					# this could be cleaner, but shiiiit thats difficult
					$this->position->delete(array('rack' => $this->input->post('id')));
					
					# now add them
					for ($i = 1; $i <= (int) $this->input->post('size'); $i++)
  				{
  					$this->position->insert(
  						array(
  							'rack'      => (int) $rack_id,
  							'position'  => $i
  					));
  				}
			}
			else
			{
				$rack_id = $this->racks->insert(
						array(
							'name' 			  => $this->input->post('name'),
							'size' 			  => (int) $this->input->post('size'),
							'location' 		=> $this->input->post('location'),
							'notes' 		  => $this->input->post('notes')
					));
				
				# add event
				$this->events->insert(array('title' => "added rack : ". $rack_id, 'auto' => 1));
  					
  			# add positions
				for ($i = 1; $i <= (int) $this->input->post('size'); $i++)
				{
					$this->position->insert(
						array(
							'rack'      => (int) $rack_id,
							'position'  => $i
					));
				}
			}
			# good its added
			redirect('/racks', 'refresh');
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
