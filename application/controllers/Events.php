<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('events_model', 'events');
		$this->load->model('devices_model', 'devices');
	}
	
	public function index()
	{
		$data['events'] = $this->events->get_all();
		$this->smg_page('events/index', $data);
	}
	
	public function add()
	{
		$this->smg_page('events/add');
	}
	
	# can't allow removing events
	# (not even soft)
	public function remove($id)
	{
    redirect('/events', 'refresh');
	}
	
	public function edit($id)
	{
	}
	
	public function store()
	{
		if ($this->input->post('edit'))
		{
		  
			$this->events->update(
				array(
					'title' 			=> $this->input->post('title'),
					'description' => $this->input->post('description'),
					'device'      => $this->input->post('device'),
					'timespan' 		=> $this->input->post('timespan'),
					'auto' 		    => 0
				),
					# where
					array ('id' => (int) $this->input->post('id'))
				);
				
		}
		else
		{
			$this->events->insert(
					array(
  					'title' 			=> $this->input->post('title'),
  					'description' => $this->input->post('description'),
  					'device'      => $this->input->post('device'),
  					'timespan' 		=> $this->input->post('timespan'),
  					'auto' 		    => 0
				));
		}
		
		# good its added
		redirect('/events', 'refresh');
	}
	
	# just create a full page at once
	private function smg_page($page, $data = array())
	{
		$this->load->view('default/header');
		$this->load->view($page, $data);
		$this->load->view('default/footer');
	}
}
