<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer_Model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_supplier($data) {
    	$this->db->insert('transfer_suppliers',$data);
    	return $this->db->insert_id();
    }
    public function details_select() {
		$this->db->select('*');
		$this->db->from('transfer_suppliers');
  	    $query=$this->db->get();
		return $query;
	}
	public function supplier_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('transfer_suppliers');
      $final= $query->result();
      return $final;
    }
   	public function supplier_details($id) {
		$this->db->select('*');
		$this->db->from('transfer_suppliers');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function update_supplier($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("transfer_suppliers",$data);
		return $id;
	}
	public function delete_supplier($id) {
		$this->db->where('id',$id);
		$this->db->delete('transfer_suppliers');
		return true;
	}
	public function vehicle_details($id) {
		$this->db->select('*');
		$this->db->from('transfer_vehicle');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}	
	public function vehicle_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('transfer_vehicle');
      $final= $query->result();
      return $final;
    }
    public function suppliers_select() {
		$this->db->select('*');
		$this->db->from('transfer_suppliers');
  	    $query=$this->db->get()->result();
		return $query;
	}
	public function addvehicle($request) {
		if ($request['edit_id']=="") {
		   $vehicle_max_id = $this->Transfer_Model->vehicle_max_id();
           $vehicle_id = $vehicle_max_id[0]->id+1;
           if (count($vehicle_max_id)==0) {
                $vehicleCode = "TRV001";
           } else {
                $vehicleCode = "TRV00".$vehicle_id;
           } 
			$data = array(
					'vehicleCode' => $vehicleCode,
					'SupplierId' => $request['SupplierId'],
					'VehicleName' => $request['VehicleName'],
					'vehicleType' => $request['vehicleType'],
					'VehicleNumber' => $request['VehicleNumber'],
					'OwnerName' => $request['OwnerName'],
					'ContactNumber' => $request['ContactNumber'],
					'OwnerAddress' => $request['OwnerAddress'],
					'Country' => $request['ConSelect'],
					'City' => $request['citySelect'],
					'WaitingTime' => $request['WaitingTime'],
					'WaitingTimeType' => $request['WaitingTimeType'],
					'Passengers' => $request['Passengers'],
					'Bags' => $request['Bags'],
					'CreatedDate' => date('Y-m-d'),
					'CreatedBy' => $this->session->userdata('name'),
			);
			$this->db->insert('transfer_vehicle',$data);
			$id = $this->db->insert_id();
			$this->db->where('vehicleID',$id);
			$this->db->delete('transfer_airport_vehicles');
			if ($request['airports']!="") {
				foreach ($request['airports'] as $key => $value) {
						$data1 = array('airportID'=>$value,
							'vehicleID' => $id,
							);
					$this->db->insert('transfer_airport_vehicles',$data1);
				}
			}
		} else {
			$data = array(
					'SupplierId' => $request['SupplierId'],
					'VehicleName' => $request['VehicleName'],
					'vehicleType' => $request['vehicleType'],
					'VehicleNumber' => $request['VehicleNumber'],
					'OwnerName' => $request['OwnerName'],
					'ContactNumber' => $request['ContactNumber'],
					'OwnerAddress' => $request['OwnerAddress'],
					'Country' => $request['ConSelect'],
					'City' => $request['citySelect'],
					'WaitingTime' => $request['WaitingTime'],
					'WaitingTimeType' => $request['WaitingTimeType'],
					'Passengers' => $request['Passengers'],
					'Bags' => $request['Bags'],
					'UpdatedDate' => date('Y-m-d'),
					'UpdatedBy' => $this->session->userdata('name'),
			);
			$this->db->where('id',$request['edit_id']);
			$this->db->update('transfer_vehicle',$data);
			$id = $request['edit_id'];
			$this->db->where('vehicleID',$request['edit_id']);
			$this->db->delete('transfer_airport_vehicles');
			if ($request['airports']!="") {
				foreach ($request['airports'] as $key => $value) {
					$data1 = array('airportID'=>$value,
							'vehicleID' => $request['edit_id'],
							);
					$this->db->insert('transfer_airport_vehicles',$data1);
				}
			}
		}
		return $id;
	}
	public function vehicle_list() { 
		$this->db->select('a.*,b.supplier_code,c.name as CountryName,d.CityName');
		$this->db->from('transfer_vehicle a');
		$this->db->join('transfer_suppliers b','b.id=a.SupplierId','inner');
		$this->db->join('countries c','c.id=a.Country','inner');
		$this->db->join('xml_city_tbl d','d.id= a.City','inner');
		$query=$this->db->get();
		return $query;
	}
	public function contract_details_select() {
		$this->db->select('*');
		$this->db->from('transfer_contracts');
  	    $query=$this->db->get();
		return $query;
	}
	public function add_contract($request) {
		if($request['edit_id']=="") {
			$contract_max_id = $this->Transfer_Model->contract_max_id();
	        $contract_id = $contract_max_id[0]->id+1;
	        if (count($contract_max_id)==0) {
                $contract_code = "TRC0001";
    	    } else {
                $contract_code = "TR00".$contract_id;
	        } 
	        $count = count($request['multipleLocation']);
			$data=array(
				'contract_code' =>$contract_code,
				'ContractName' => $request['contractName'],
				'description' => $request['description'],
				'transfer_type' => $request['transfer_type'],
				'Vehicles' => implode(",", $request['vehicles']),
				'valid_from' => $request['valid_from'],
				'valid_to' => $request['valid_to'],
				'Passenger_cost' => $request['Passenger_cost'],
				'Passenger_selling' => $request['Passenger_selling'],
				'CreatedDate' => date('Y-m-d'),
				'CreatedBy' => $this->session->userdata('name'),
			 );
			$this->db->insert('transfer_contracts',$data);
			$id = $this->db->insert_id();
			$this->db->where('contractId',$id);
			$this->db->delete('transfer_contract_vehicles');
			if ($request['vehicles']!="") {
				foreach ($request['vehicles'] as $key => $value) {
						$data1 = array('vehicleId'=>$value,
							'contractId' => $id,
							);
					$this->db->insert('transfer_contract_vehicles',$data1);
				}
			}
			if ($request['multipleLat']!="" && $request['multipleLong']!="" && $request['multipleLocation']!="") {			
				for($i=0;$i<$count;$i++) {
					$data2 = array('contractID' => $id,
								'latitude' => $request['multipleLat'][$i],
								'longitude' => $request['multipleLong'][$i],
								'location' => $request['multipleLocation'][$i]);
					$this->db->insert('transfer_multiple_locations',$data2);
				}				
			}
			AdminlogActivity('New transfer contract added [ContractID: TR00'.$id.']');

		} else {
			$count = count($request['multipleLocation']);
			$data=array(
				'ContractName' => $request['contractName'],
				'description' => $request['description'],
				'transfer_type' => $request['transfer_type'],
				'Vehicles' => implode(",", $request['vehicles']),
				'valid_from' => $request['valid_from'],
				'valid_to' => $request['valid_to'],
				'Passenger_cost' => $request['Passenger_cost'],
				'Passenger_selling' => $request['Passenger_selling'],
				'CreatedDate' => date('Y-m-d'),
				'CreatedBy' => $this->session->userdata('name'),
			);
			$this->db->where('id',$request['edit_id']);
			$this->db->update('transfer_contracts',$data);

			$this->db->where('contractId',$request['edit_id']);
			$this->db->delete('transfer_contract_vehicles');
			if ($request['vehicles']!="") {
				foreach ($request['vehicles'] as $key => $value) {
					$data1 = array('vehicleId'=>$value,
							'contractId' => $request['edit_id'],
							);
					$this->db->insert('transfer_contract_vehicles',$data1);
				}
			}
			$this->db->where('contractID',$request['edit_id']);
			$this->db->delete('transfer_multiple_locations');
			if ($request['multipleLat']!="" && $request['multipleLong']!="" && $request['multipleLocation']!="") {			
				for($i=0;$i<$count;$i++) {
					$data2 = array('contractID' => $request['edit_id'],
								'latitude' => $request['multipleLat'][$i],
								'longitude' => $request['multipleLong'][$i],
								'location' => $request['multipleLocation'][$i]
							);
					$this->db->insert('transfer_multiple_locations',$data2);
				}				
			}
			AdminlogActivity('Transfer contract updated [ContractID: TR00'.$request['edit_id'].']');
		}
		
    	return true;
    }
    public function update_contract($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("transfer_contracts",$data);
		return $id;
	}
	public function contractStatus($id,$status) {
		$data= array( 
			 'status' 	  => $status,
			);
		$this->db->where('id',$id);
		$this->db->update('transfer_contracts',$data);
		return true;
	}
	public function contract_details($id) {
		$this->db->select('*');
		$this->db->from('transfer_contracts');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_contract($id) {
		$this->db->where('id',$id);
		$this->db->delete('transfer_contracts');
		$this->db->where('contract_id',$id);
		$this->db->delete('transfer_contract_policies');
		$this->db->where('contract_id',$id);
		$this->db->delete('transfer_contract_conditions');
		return true;
	}	
	public function policy_details_select($id) {
		$this->db->select('*');
		$this->db->from('transfer_contract_policies');
		$this->db->where('contract_id',$id);
		$query=$this->db->get();
		return $query;
	}
	public function add_policy($data) {
    	$this->db->insert('transfer_contract_policies',$data);
    	return $this->db->insert_id();
    }
    public function update_policy($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("transfer_contract_policies",$data);
		return $id;
	}
	public function policy_details($id) {
		$this->db->select('*');
		$this->db->from('transfer_contract_policies');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_policy($id) {
		$this->db->where('id',$id);
		$this->db->delete('transfer_contract_policies');
		return true;
	}	
	public function condition_details_select($id) {
		$this->db->select('*');
		$this->db->from('transfer_contract_conditions');
		$this->db->where('contract_id',$id);
		$query=$this->db->get();
		return $query;
	}
	public function add_condition($data) {
    	$this->db->insert('transfer_contract_conditions',$data);
    	return $this->db->insert_id();
    }
    public function update_condition($data,$id) {
		$this->db->where('id',$id);
		$this->db->update("transfer_contract_conditions",$data);
		return $id;
	}
	public function condition_details($id) {
		$this->db->select('*');
		$this->db->from('transfer_contract_conditions');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}
	public function delete_condition($id) {
		$this->db->where('id',$id);
		$this->db->delete('transfer_contract_conditions');
		return true;
	}
	public function contract_max_id() {
      $this->db->select_max('id');
      $query = $this->db->get('transfer_contracts');
      $final= $query->result();
      return $final;
    }
    public function contractVehiclesID($contractId) {
    	$this->db->select('*');
  		$query = $this->db->from('transfer_contract_vehicles');
    	$this->db->where('contractId',$contractId); 
  		return $final= $query->get()->result();
    }
    public function vehiclesSelected($vehicles) {
    	$output = '';
    	$vehicleMenu = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Vehicle');
    	$vehicleTag = array();
        if ($vehicles!="") {
			$this->db->select('*');
	  		$query = $this->db->from('transfer_contract_vehicles a');
	  		$query = $this->db->join('transfer_vehicle b','a.vehicleId = b.id','inner');
	    	$this->db->where('a.contractId',$vehicles); 
	  		$final= $query->get()->result();
	  		foreach ($final as $key => $value) {
	  			if (count($vehicleMenu)!=0 && $vehicleMenu[0]->edit==1) { 
	              $vehicleTag[$key] = '<a  style="color:#2196f3;font-weight:bold" href="'.base_url().'backend/transfer/newvehicle?edit_id='.$value->id.'" title="'.$value->VehicleName.', '.$value->VehicleNumber.'">'.$value->vehicleCode.'</a>'; 
	            } else {
	            	$vehicleTag[$key] = $value->vehicleCode;
	            }	 
	  		}
        	$output = implode(", ", $vehicleTag);
      	}	
        return $output;
    }
    public function AirportSelect($concode) {
    	$this->db->select('*');
        $this->db->from('airports');
        $this->db->where('countryCode',$concode);
        $this->db->order_by('id','asce');
        $query=$this->db->get();
        return $query->result();
    }
    public function vehicleAirportsID($contractId) {
    	$this->db->select('*');
  		$query = $this->db->from('transfer_airport_vehicles');
    	$this->db->where('vehicleID',$contractId); 
  		return $final= $query->get()->result();
    }
    public function transferlocations($contractId) {
    	$this->db->select('*');
  		$query = $this->db->from('transfer_multiple_locations');
    	$this->db->where('contractID',$contractId); 
  		return $final= $query->get()->result();
    }
    public function delete_vehicle($id) {
		$this->db->where('id',$id);
		$this->db->delete('transfer_vehicle');
		$this->db->where('vehicleID',$id);
		$this->db->delete('transfer_airport_vehicles');
		return true;
	}	
}