<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipmi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('devices_model', 'devices');
		$this->load->model('ipmi_model', 'ipmi');
		$this->load->model('events_model', 'events');
		$this->load->library(array('form_validation'));
	}
	
	public function index()
	{
		$data['ipmi_list'] = $this->ipmi->with_devices()->get_all();
		$this->smg_page('ipmi/index', $data);
	}
	
	public function add()
	{
		$data['devices'] = $this->devices->get_all();
		$this->smg_page('ipmi/add', $data);
	}

	public function remove($id)
	{
		$this->ipmi->delete((int)$id);
		
		# its gone, lets go back
		redirect('/ipmi', 'refresh');
	}
		
	public function edit($id)
	{
		$data['devices'] = $this->devices->get_all();
		$data['ipmi'] = $this->ipmi->with_devices()->get($id);
		$data['edit'] = true;
		$this->smg_page('ipmi/add', $data);
	}
	
	public function store()
	{
		if ($this->input->post('edit'))
		{
			$this->ipmi->update(
				array(
					'device' 		=> (int) $this->input->post('device'),
					'mac' 			=> $this->input->post('mac'),
					'ip' 			=> $this->input->post('ip'),
					'notes' 		=> $this->input->post('notes')
				),
					# where
					array ('id' => (int) $this->input->post('id'))
				);
		}
		else
		{
			$ipmi_id = $this->ipmi->insert(
					array(
						'device' 		=> (int) $this->input->post('device'),
						'mac' 			=> $this->input->post('mac'),
						'ip' 			=> $this->input->post('ip'),
						'notes' 		=> $this->input->post('notes')
				));
				$this->events->insert(array('title' => "added ipmi : ". $ipmi_id, 'auto' => 1));
		}
		# good its added
		redirect('ipmi', 'refresh');
	
	}
	
	# just create a full page at once
	private function smg_page($page, $data = array())
	{
		$this->load->view('default/header');
		$this->load->view($page, $data);
		$this->load->view('default/footer');
	}
}
