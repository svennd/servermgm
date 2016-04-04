<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		# load ALL the models
		$this->load->model('devices_model', 'devices');
		$this->load->model('position_model', 'position');
		$this->load->model('hdd_model', 'hdd');
		$this->load->model('events_model', 'events');
		$this->load->model('racks_model', 'racks');
		
		# call validation
		# although I barely check anything.
		$this->load->library(array('form_validation'));
	}
	
	# landing page
	# overview
	public function index($rack_id = false)
	{
		if ($rack_id)
		{
			$data['device_list'] = $this->devices->where("rack", $rack_id)->with_rack()->get_all();
		}
		else
		{
			$data['device_list'] = $this->devices->with_rack()->get_all();
		}
		$this->smg_page('devices/index', $data);
	}

  # remove stuff
	public function remove($id)
	{
		# soft delete, no panic
		$this->devices->delete($id);
		
		# remove hdd from server
		$this->hdd->update(array("server" => ""), array("server" => $id));
		
		# updated the rack
		$this->position->update(array("device" => ""), array("device" => $id));
		
		# its gone, lets go back
	  redirect('/devices', 'refresh');
	}
	
	public function detail($id)
	{
		$data['device'] = $this->devices->with_rack()->get($id);
		$this->smg_page('devices/detail', $data);
	}

	public function add($rack = false)
	{
		$data['rack_preselect']	= (int)$rack;				# paramater received preselections
		$data['rackinfo'] 		  = $this->racks->get_all(); 	# list of racks
		$data['page']			      = array(
          		                  # load the page, but only show it when js decides to
          											'server' 	=> $this->load->view('devices/type/server', array(), true),
          											'switch' 	=> $this->load->view('devices/type/switch', array(), true),
          											'ups' 		=> $this->load->view('devices/type/ups', array(), true),
									             );
		$this->smg_page('devices/add', $data);
	}
	
	public function edit($id)
	{
		$data['rackinfo'] = $this->racks->get_all(); # list of racks
    $data['device'] = $this->devices->with_rack()->get((int) $id);
		$data['edit'] = true;
		
		$data['page']			= array(	# load the page, but only show it when js decides to
											'server' 	=> $this->load->view('devices/type/server', $data, true),
											'switch' 	=> $this->load->view('devices/type/switch', $data, true),
											'ups' 		=> $this->load->view('devices/type/ups', $data, true),
									);
									
		$this->smg_page('devices/add', $data);
	}
	
	# store the device and the info
	# the user suplied about the type.
	public function store()
	{
		# edit or add
		if ($this->input->post('edit'))
		{
			# generic device
			$this->devices->update(
				array(
					# generic part
					'rack' 			=> $this->input->post('rack'), # int
					'size' 			=> $this->input->post('size'), # int
					'name' 			=> $this->input->post('name'), # varchar
					'brand' 		=> $this->input->post('brand'), # varchar
					'warranty' 	=> $this->input->post('warranty'), # varchar (data would be better)
					'serial' 		=> $this->input->post('serial'), # varchar
					'notes' 		=> $this->input->post('notes'), # text
					
					'type' 		  => $this->input->post('type'), # varchar
					# server
					'cpu_count' 	  => $this->input->post('cpu_count'), # int
					'cpu_type' 		  => $this->input->post('cpu_type'), # varchar
					'memory_banks' 	=> $this->input->post('mem_banks'), # int
					'memory_filled' => $this->input->post('mem_filled'), # int
					'memory_size' 	=> $this->input->post('mem_size'), # int
					
					# switch
					'ports' 	      => $this->input->post('mem_size'), # int
					
					# capacity
					'capacity' 	    => $this->input->post('capacity'), # int
					
				),
					# where
					array ('id' => (int) $this->input->post('id'))
				);

				# hdd count
				if ((int)$this->input->post('disk_count') > 0)
				{
					# check howmany disks are already connected to this server
					$disk_count_in_user = $this->hdd->where(
															array(
																	'server' => (int) $this->input->post('server_id'),
																	'status' => "hot"
																	))->count_rows();
					
					# the updated disk_count is larger then then disks given up
					if ((int)$this->input->post('disk_count') > $disk_count_in_user)
					{
						$disk_to_add = (int)$this->input->post('disk_count') - $disk_count_in_user;
					
						# add the hdd's to the server
						for ($i = 1; $i <= $disk_to_add; $i++)
						{
							$this->hdd->insert(
								array(
									'server' => (int) $this->input->post('server_id'),
									'status' => 'hot'
							));
						}
					}
				}
				
			# ups
			# switch specific
		}
		else
		{

			$device_id = $this->devices->insert(
				array(
					# generic part
					'rack' 			=> $this->input->post('rack'), # int
					'size' 			=> $this->input->post('size'), # int
					'name' 			=> $this->input->post('name'), # varchar
					'brand' 		=> $this->input->post('brand'), # varchar
					'warranty' 	=> $this->input->post('warranty'), # varchar (data would be better)
					'serial' 		=> $this->input->post('serial'), # varchar
					'notes' 		=> $this->input->post('notes'), # text
					
					'type' 		  => $this->input->post('type'), # varchar
					
					# server
					'cpu_count' 	  => $this->input->post('cpu_count'), # int
					'cpu_type' 		  => $this->input->post('cpu_type'), # varchar
					'memory_banks' 	=> $this->input->post('mem_banks'), # int
					'memory_filled' => $this->input->post('mem_filled'), # int
					'memory_size' 	=> $this->input->post('mem_size'), # int
					
					# switch
					'ports' 	      => $this->input->post('mem_size'), # int
					
					# capacity
					'capacity' 	    => $this->input->post('capacity'), # int
					
				));
		  
		  # add event for new device
			$this->events->insert(array('title' => "added device : ". $this->input->post('name') . "(" . $device_id . ")", 'device' => $device_id, 'auto' => 1));
			
			# add the hdd's to the server
			if ((int)$this->input->post('disk_count') > 0)
			{
				# just add the number of disks to this server
				for ($i = 1; $i <= (int)$this->input->post('disk_count'); $i++)
				{
					$this->hdd->insert(
						array(
							'server' => $device_id,
							'status' => 'hot'
					));
				}
			}

			# add the ports's to the switch
			if ((int)$this->input->post('ports_count') > 0)
			{
			}
		}
		
		# good its added
		redirect('/devices', 'refresh');
	}
	
	# just create a full page at once
	private function smg_page($page, $data = array())
	{
		$this->load->view('default/header');
		$this->load->view($page, $data);
		$this->load->view('default/footer');
	}
}
