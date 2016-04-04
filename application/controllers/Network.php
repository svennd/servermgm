<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# this is not ready yet
class Network extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('devices_model', 'devices');
		$this->load->model('network_model', 'network');
		$this->load->library(array('form_validation'));
	}
	
	public function index()
	{
		$data['network_list'] = $this->network->with_devices()->get_all();
		$this->smg_page('network/index', $data);
	}
	
	public function add()
	{
		$data['devices'] = $this->devices->get_all();
		$this->smg_page('network/add', $data);
	}

	public function remove($id)
	{
		$this->network->delete((int)$id);
		
		# its gone, lets go back
		redirect('/network', 'refresh');
	}
		
	public function edit($id)
	{
		$data['devices'] = $this->devices->get_all();
		$data['network'] = $this->network->with_devices()->get($id);
		$data['edit'] = true;
		$this->smg_page('network/add', $data);
	}
	
	public function store()
	{
		$form_config = array(
			array('field' => 'mac', 'label' => 'mac', 'rules' => 'required')
		);
		$this->form_validation->set_rules($form_config);
		
		if ($this->form_validation->run() == FALSE)
		{
			# throw back the edit page
			var_dump($this->form_validation->error());
			$this->smg_page('network/add', array('store' => false));
		}
		else
		{
			if ($this->input->post('edit'))
			{
				$this->network->update(
					array(
						'device' 		=> (int) $this->input->post('device'),
						'mac' 			=> $this->input->post('mac'),
						'name' 			=> $this->input->post('name'),
						'ip' 			=> $this->input->post('ip'),
						'notes' 		=> $this->input->post('notes')
					),
						# where
						array ('id' => (int) $this->input->post('id'))
					);
			}
			else
			{
				$this->network->insert(
						array(
							'device' 		=> (int) $this->input->post('device'),
							'mac' 			=> $this->input->post('mac'),
							'name' 			=> $this->input->post('name'),
							'ip' 			=> $this->input->post('ip'),
							'notes' 		=> $this->input->post('notes')
					));
			}
			# good its added
			redirect('network', 'refresh');
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
