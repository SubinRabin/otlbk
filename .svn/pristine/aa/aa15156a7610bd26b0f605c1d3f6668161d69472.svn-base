<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class Report extends MY_Controller { 
		public function __construct() 
		{
			parent::__construct();
			$this->load->helper('url');
		    $this->load->helper('html');
			$this->load->model("Finance_Model");
			$this->load->model("List_Model");
		    $this->load->helper('upload');
		    $this->load->helper('common');
		    $this->load->library('email');
        	$this->load->helper('manuallog');
		}
		 public function report_hotel()
		{
			if ($this->session->userdata('name')=="") {
			redirect("../backend/");
			}
	    	$data['view']= $this->Finance_Model->hotel_select();
	    	$HotelReport= menuPermissionAvailability($this->session->userdata('id'),'Report','Hotel Report'); 
	    	if (count($HotelReport)!=0 && $HotelReport[0]->view==1) {
			$this->load->view('backend/report/report_hotel',$data);
     		} else {
      		redirect(base_url().'backend/dashboard');
    		}
		
		}
		public function report_agent()
		{
			if ($this->session->userdata('name')=="") {
			redirect("../backend/");
			}
	    	$data['view']= $this->Finance_Model->agent_select();
	    	$AgentReport = menuPermissionAvailability($this->session->userdata('id'),'Report','Agent Report'); 
	    	if (count($AgentReport)!=0 && $AgentReport[0]->view==1) {
				$this->load->view('backend/report/report_agent',$data);
     		} else {
      			redirect(base_url().'backend/dashboard');
    		}
		
		}
		public function report_profit()
		{
			if ($this->session->userdata('name')=="") {
			redirect("../backend/");
			}
			$data['view1']= $this->Finance_Model->agent_select();
	    	$data['view']= $this->Finance_Model->hotel_select();
	    	$ProfitReport = menuPermissionAvailability($this->session->userdata('id'),'Report','Profit Report'); 
	    	if (count($ProfitReport)!=0 && $ProfitReport[0]->view==1) {
				$this->load->view('backend/report/report_profit',$data);
			} else {
      			redirect(base_url().'backend/dashboard');
    		}
		}
		public function hotel_report_list() {
			$data = array();
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$hotel_finance = $this->Finance_Model->hotel_finance_list_select('');
		    foreach($hotel_finance->result() as $key => $r) {
		    $hotel_report = $this->Finance_Model->hotel_report_list_first_select($r->hotel_id);
		      foreach($hotel_report->result() as $key1 => $t) {
		    	    $total[$key1]=intval($t->price*$t->dayz*$t->roomz);
			  }
			$board_data   = array();
            $general_data = array();
            $ExBed        = array();
            $board_d_data   = $this->Finance_Model->board_booking_detail($r->id);
            $general_data = $this->Finance_Model->general_booking_detail($r->id);
            $ExBed        = $this->Finance_Model->getExtrabedDetails($r->id);
            $net_adult_amount = $net_child_amount = $net_general_adult = $net_general_child = $general = $board =$ExAmount= $final_total = 0;
          if(count($board_data)!=0 && count($board_data)!="") 
          {
            foreach ($board_data as $key1 => $value1) {
              $board_adult_amount = $board_child_amount = 0;
              $total_board_adult = $board_data[$key1]->adultamount * $board_data[$key1]->Breqadults;
              $total_board_child = $board_data[$key1]->childAmount * $board_data[$key1]->BreqchildCount;

              $board_adult_amount = $total_board_adult+(($total_board_adult * $board_data[$key1]->total_markup)/100);
              $board_child_amount = $total_board_child+(($total_board_child * $board_data[$key1]->total_markup)/100);
              $net_adult_amount += $board_adult_amount;
              $net_child_amount += $board_child_amount;
              $board = $net_adult_amount + $net_child_amount;
            }
          }

          if(count($general_data)!=0 && count($general_data)!="") 
          {
            foreach ($general_data as $key2 => $value2) {
              $general_adult_amount = $general_child_amount = 0;
              $total_general_adult = $general_data[$key2]->gadultamount * $general_data[$key2]->reqadults;
              $total_general_child = $general_data[$key2]->gchildamount * $general_data[$key2]->reqChild;
              $general_adult_amount = $total_general_adult+(($total_general_adult * $general_data[$key2]->total_markup)/100);
              $general_child_amount = $total_general_child+(($total_general_child * $general_data[$key2]->total_markup)/100);
              $net_general_adult += $general_adult_amount;
              $net_general_child += $general_child_amount;
              $general = $net_general_adult + $net_general_child;
            }
          }
          if(count($ExBed)!=0 && count($ExBed)!="") 
          { 
            $amount =0;
            foreach ($ExBed as $key3 => $value3) {
              $amount += $ExBed[$key3]->amount;
            }
            $ExAmount=($amount*($r->admin_markup+$r->agent_markup))/100+$amount;

          }
          
          $supplement_total=$board +$general;
          $final_total = ceil($r->total_amount + $supplement_total + $ExAmount);
				$data[] = array(
					$key+1,
					$r->hotel_code,
					$r->hotel_name,
					$r->book_count,
					$total1 = array_sum($total).' '.$r->currency_type,
					'<a href="hotel_finance_view?id='.$r->hotel_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);
		    }
			$output = array(
			   	"draw"            => $draw,
				"recordsTotal"    => $hotel_finance->num_rows(),
				"recordsFiltered" => $hotel_finance->num_rows(),
				"data"            => $data
			);
		  echo json_encode($output);
		}
		public function agent_report_list() {
			if ($this->session->userdata('name')=="") {
            	redirect("../logout");
    		}
			$data = array();
			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$from_date= "";
        	$to_date= "";
			if (isset($_REQUEST['agent_id'])) {
				$_REQUEST['agent_id'] = $_REQUEST['agent_id'];
			} else {
				$_REQUEST['agent_id'] = "";
			}
			if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
    		} else {
    			$from_date = date('Y-m-d', strtotime('-4 week'));
    		}
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	} else {
    			$to_date = date('Y-m-d', strtotime('-4 week'));
        	}

        	// $from_date = "2018-01-15";
			// $to_date = "2018-03-17";
			$agent_finance =$this->Finance_Model->agent_report_list_select($_REQUEST['agent_id'],$from_date,$to_date);
			foreach($agent_finance->result() as $key => $r) {
				$agent_total = $this->Finance_Model->get_agent_amount($r->agent_id,$from_date,$to_date);
				// print_r($agent_total);
				// echo "<br>";
				$data[] = array(
					$key+1,
					$r->Agent_Code,
					$r->First_Name,
					$r->book_count,
					$agent_total.' '.$r->currency_type,
					'<a href="agent_report_view?id='.$r->agent_id.'&from_date='.$from_date.'&to_date='.$to_date.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);
		  	}

			$output = array(
			   	"draw" 			  => $draw,
				"recordsTotal" 	  => $agent_finance->num_rows(),
				"recordsFiltered" => $agent_finance->num_rows(),
				"data"            => $data
			);
			
		  echo json_encode($output);
		}

		public function hotel_finance_view() {

			$this->load->view('backend/report/Hotel_report_view');
		}
		public function hotel_finance_view_dtails() {
			$data = array();
			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$from_date = "";
       		$to_date = "";
        	if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
    		}
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	}
        	
		$hotel_report_all = $this->Finance_Model->hotel_finance_list_all_select($_REQUEST['id'],$from_date,$to_date);
		// print_r($hotel_report_all->result());
		// exit();
		$final_total = 0;
		foreach($hotel_report_all->result() as $key => $r) {
            $board_data   = $this->Finance_Model->get_board_amount($r->booking_id);
            $general_data = $this->Finance_Model->get_general_amount($r->booking_id);
            $ExBed        = $this->Finance_Model->get_extrabed_amount($r->booking_id);
            $indiviadual_amount = $this->Finance_Model->get_individual_amount($r->booking_id);
			$final_total = $board_data + $general_data + $ExBed + $indiviadual_amount;
			if($r->invoice_id!='') {
				$invoice = $r->invoice_id;
			} else {
				$invoice = '';
			}
            // print_r($r->Created_Date);
            // echo "<br>";
			$data[] = array(
				$key+1,
				$r->booking_id,
				$invoice,
				//$r->normal_price.' '.$r->currency_type,
				$r->book_room_count,
				$r->no_of_days,
				$final_total,
				$r->Created_Date,
			);
		}
		  	
			$output = array(
			   	"draw" => $draw,
				 "recordsTotal" 	=> $hotel_report_all->num_rows(),
				 "recordsFiltered" 	=> $hotel_report_all->num_rows(),
				 "data" 			=> $data
			);
		  echo json_encode($output);
		}
		public function agent_report_view() {
			
			$this->load->view('backend/report/agent_report_view');
		}
		public function agent_report_view_dtails() {
			
			$data = array();
			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));

			if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
        		}
       		
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	}
			$agent_report_all = $this->Finance_Model->agent_fin_list_all_select($_REQUEST['id'],$from_date,$to_date);
			foreach($agent_report_all->result() as $key => $r) {
			$board_data   = array();
            $general_data = array();
            $ExBed        = array();
            $board_data   = $this->Finance_Model->board_booking_detail($r->booking_id);
            $general_data = $this->Finance_Model->general_booking_detail($r->booking_id);
            $ExBed    = $this->Finance_Model->getExtrabedDetails($r->booking_id);
            $net_adult_amount = $net_child_amount = $net_general_adult = $net_general_child = $general = $board =$ExAmount= $final_total = 0;
          if(count($board_data)!=0 && count($board_data)!="") 
          {
            foreach ($board_data as $key1 => $value1) {
              $board_adult_amount = $board_child_amount = 0;
              $total_board_adult = $board_data[$key1]->adultamount * $board_data[$key1]->Breqadults;
              $total_board_child = $board_data[$key1]->childAmount * $board_data[$key1]->BreqchildCount;
              $board_adult_amount = $total_board_adult+(($total_board_adult * $board_data[$key1]->agent_markup)/100);
              $board_child_amount = $total_board_child+(($total_board_child * $board_data[$key1]->agent_markup)/100);
              $net_adult_amount += $board_adult_amount;
              $net_child_amount += $board_child_amount;
              $board = $net_adult_amount + $net_child_amount;
            }
          }

          if(count($general_data)!=0 && count($general_data)!="") 
          {
            foreach ($general_data as $key2 => $value2) {
              $general_adult_amount = $general_child_amount = 0;
              $total_general_adult = $general_data[$key2]->gadultamount * $general_data[$key2]->reqadults;
              $total_general_child = $general_data[$key2]->gchildamount * $general_data[$key2]->reqChild;
              $general_adult_amount = $total_general_adult+(($total_general_adult * $general_data[$key2]->agent_markup)/100);
              $general_child_amount = $total_general_child+(($total_general_child * $general_data[$key2]->agent_markup)/100);
              $net_general_adult += $general_adult_amount;
              $net_general_child += $general_child_amount;
              $general = $net_general_adult + $net_general_child;
            }
          }
          if(count($ExBed)!=0 && count($ExBed)!="") 
          { 
            $amount =0;
            foreach ($ExBed as $key3 => $value3) {
              $amount += $ExBed[$key3]->amount;
            }
            $ExAmount=($amount*($r->agent_markup))/100+$amount;

          }
          
          $supplement_total=$board +$general;
          $final_total = ceil(($r->normal_price*$r->book_room_count )+ $supplement_total + $ExAmount);
          $totalAgent =(($final_total*$r->agent_markup)/100).' '.$r->currency_type;
          $AgentId=$r->agent_id;

				$data[] = array(
					$key+1,
					$r->booked,
					$r->invoice_id,
					// $r->normal_price.' '.$r->currency_type,
					$r->book_room_count,
					$r->no_of_days,
					// $r->tax.'%',
					// $r->tax_amount,
					$r->agent_markup.'%',
					$totalAgent,
					$r->date,
				);
		  	}
			$output = array(
			   	"draw" 			  => $draw,
				"recordsTotal"    => $agent_report_all->num_rows(),
				"recordsFiltered" => $agent_report_all->num_rows(),
				"data"            => $data
			);
		  echo json_encode($output);
		}
		public function profit_report_list() {
			if ($this->session->userdata('name')=="") {
            redirect("../logout");
    	}
			$data = array();
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			if (isset($_REQUEST['hotel_id'])) {
				$_REQUEST['hotel_id'] = $_REQUEST['hotel_id'];
			} else {
				$_REQUEST['hotel_id'] = "";
			}
			if (isset($_REQUEST['agent_id'])) {
				$_REQUEST['agent_id'] = $_REQUEST['agent_id'];
			} else {
				$_REQUEST['agent_id'] = "";
			}
			$profit_report = $this->Finance_Model->profit_report_list_select($_REQUEST['hotel_id'],$_REQUEST['agent_id']);
			// print_r($profit_report->result());
			// exit();
			foreach($profit_report->result() as $key => $r) {
				$final_total = 0;
	            $board_data   = $this->Finance_Model->get_board_amount($r->full_id);
	            $general_data = $this->Finance_Model->get_general_amount($r->full_id);
	            $ExBed        = $this->Finance_Model->get_extrabed_amount($r->full_id);
	            $indiviadual_amount = $this->Finance_Model->get_individual_amount($r->full_id);
          		$final_total = $board_data + $general_data + $ExBed + $indiviadual_amount;
          		$markup_total = ($final_total * $r->admin_markup)/100; 
          		// print_r($markup_total);
          		// echo "<br>";
				$data[] = array(
					$key+1,
					$r->booking_id,
					$r->hotel_code,
					$r->book_room_count,
					$r->no_of_days,
					$r->admin_markup.'%',
					$markup_total.' '.$r->currency_type,
					// '<a href="profit_report_view?id='.$r->full_id.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);
			}
			$output = array(
			   	"draw" => $draw,
				 "recordsTotal" => $profit_report->num_rows(),
				 "recordsFiltered" => $profit_report->num_rows(),
				 "data" => $data
			);
			
			
		  echo json_encode($output);
		}
		public function profit_report_view() {
			$this->load->view('backend/report/profit_report_view');
		}
		public function reports_view_dtails() {
			$data = array();
			// Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$reports_all = $this->Finance_Model->reports_list_all_select($_REQUEST['id']);
			foreach($reports_all->result() as $key => $r) {
				$data[] = array(
					$key+1,
					$r->booked,
					$r->invoice_id,
					$r->hotel_code,
					$r->normal_price,
					$r->no_of_days,
					$r->book_room_count,
					$r->tax.'%',
					$r->tax_amount,
					$r->admin_markup.'%',
					($r->normal_price*$r->admin_markup)/100*$r->book_room_count*$r->no_of_days.' '.$r->currency_type,
					$r->date,
				);
		  	}
			$output = array(
			   	"draw" => $draw,
				 "recordsTotal" => $reports_all->num_rows(),
				 "recordsFiltered" => $reports_all->num_rows(),
				 "data" => $data
			);
		  echo json_encode($output);
		}
		public function hotel_select_list(){
			if ($this->session->userdata('name')=="") {
            	redirect("../logout");
    		}
    		$data = array();
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
    		} else {
    			$from_date = date('Y-m-d', strtotime('-4 week'));
    		}
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	} else {
    			$to_date = date('Y-m-d', strtotime('-4 week'));
        	}
			// $from_date = "2018-01-15";
			// $to_date = "2018-03-17";
			if (isset($_REQUEST['hotel_id'])) {
				$_REQUEST['hotel_id'] = $_REQUEST['hotel_id'];
			} else {
				$_REQUEST['hotel_id'] = "";
			}
			$hotel_finance = $this->Finance_Model->hotel_finance_list_select($_REQUEST['hotel_id'],$from_date,$to_date);

			foreach($hotel_finance->result() as $key => $r) {
        		$final_booking_amount = $this->Finance_Model->get_final_amount($r->hotel_id,$from_date,$to_date);
				$data[] = array(
					$key+1,
					$r->hotel_code,
					$r->hotel_name,
					$r->book_count,
					$final_booking_amount.' '.$r->currency_type,
					'<a href="hotel_finance_view?id='.$r->hotel_id.'&from_date='.$from_date.'&to_date='.$to_date.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);	
		    }
			$output = array(
			   	"draw" => $draw,
				 "recordsTotal" => $hotel_finance->num_rows(),
				 "recordsFiltered" => $hotel_finance->num_rows(),
				 "data" => $data
			);
			 
		  echo json_encode($output);

		}
		public function search_booking_list(){
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
       		$data = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	
        	if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
    		} else {
    			$from_date = date('Y-m-d', strtotime('-4 week'));
    		}
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	} else {
    			$from_date = date('Y-m-d', strtotime('-4 week'));
        	}
        	if (isset($_REQUEST['hotel_id'])) {
        		$_REQUEST['hotel_id'] = $_REQUEST['hotel_id'];
        	} else {
        		$_REQUEST['hotel_id'] = "";
        	}
			// $hotel_report = $this->Finance_Model->hotel_booking_list_first_select($r->hotel_id,$from_date,$to_date);		

        	$hotel_finance = $this->Finance_Model->hotel_booking_list_select($_REQUEST['hotel_id'],$from_date,$to_date);
        	foreach($hotel_finance as $key => $r) {
        		$final_booking_amount = $this->Finance_Model->get_final_amount($r->hotel_id,$from_date,$to_date);
				$data[] = array(
					$key+1,
					$r->hotel_code,
					$r->hotel_name,
					$r->book_count,
					$final_booking_amount.' '.$r->currency_type,
					'<a href="hotel_finance_view?id='.$r->hotel_id.'&from_date='.$from_date.'&to_date='.$to_date.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);
		    }
		    exit();

			$output = array(
			   	"draw" => $draw,
				 "recordsTotal" => $hotel_finance->num_rows(),
				 "recordsFiltered" => $hotel_finance->num_rows(),
				 "data" => $data
			);
			 
		  echo json_encode($output);
		  

		}
		public function search_booking_agents_list(){
			if ($this->session->userdata('name')=="") {
            redirect("/logout");
    		}
       		$data = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	$from_date= "";
        	$to_date= "";
        	if (isset($_REQUEST['from_date'])) {
           		$from_date = $_REQUEST['from_date'];
        		}
       		
        	if (isset($_REQUEST['to_date'])) {
           		$to_date = $_REQUEST['to_date'];
        	}
        	$agent_list = $this->Finance_Model->booking_agent_list_select($_REQUEST['id'],$from_date,$to_date);
        	
        	foreach($agent_list->result() as $key => $r) {
		  //   $agent_report = $this->Finance_Model->agent_booking_list_first_select($r->agent_id,$from_date,$to_date);		   
		  //      foreach($agent_report->result() as $key1 => $t) {
			 //    	    $total[$key1]=intval($t->AgentTot);
				// }
				// print_r($agent_list->result());
				// exit();
				
				$data[] = array(
					$key+1,
					$r->Agent_Code,
					$r->First_Name,
					$r->book_count,
					$r->price,
					'<a href="agent_report_view?id='.$r->agent_id.'&from_date='.$from_date.'&to_date='.$to_date.'"><i class="fa fa-eye" aria-hidden="true"></i></a>',
				);
		  	}

			$output = array(
			   	"draw" => $draw,
				"recordsTotal" => $agent_list->num_rows(),
				"recordsFiltered" => $agent_list->num_rows(),
				"data" => $data
			);
			 
		  echo json_encode($output);

		}

		public function NightReport() {
			$data['view']= $this->Finance_Model->SelectCountry();
			$nightreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Total Room Night Report'); 
		    if (count($nightreportMenu)!=0 && $nightreportMenu[0]->view==1) {
		       $this->load->view('backend/report/NightReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }  
			
		}
		
		public function RoomNightReportFilter(){
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
    		
    		$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
           	$ReportFilter= $this->Finance_Model->RoomNightReportFilter($_REQUEST);
            foreach ($ReportFilter->result() as $key => $value) {
            		$noTotal[] = $value->noOfTrans;
            }
            $arraySum = array_sum($noTotal);
            	
           	foreach($ReportFilter->result() as $key1 => $r) {
			    $data[] = array(
		    			'',
		    			$LeadTime[] = $r->LeadTime,
		    			$r->noOfTrans,
		    			$totper[] = round(($r->noOfTrans * 100)/$arraySum,2),
		    	);
			}
			if (count($ReportFilter->result())!=0) {
				$data[] = array(
						'Total',
						array_sum($LeadTime),
						array_sum($noTotal),
						round(array_sum($totper)),
				);
			}
			$output = array(
			   		"draw" => $draw,
				 	"recordsTotal" => $ReportFilter->num_rows(),
				 	"recordsFiltered" => $ReportFilter->num_rows(),
				 	"data" => $data
			);
		  	echo json_encode($output);
		}
		public function StateSelect() {
			$data = $this->Finance_Model->SelectState($_REQUEST['Conid']);
			echo json_encode($data);
		}
		public function RoomSelect() {
			$data = $this->Finance_Model->SelectRoom($_REQUEST['Roomid']);
			echo json_encode($data);
		}
		public function ContractSelect() {
			$data = $this->Finance_Model->SelectContract($_REQUEST['Contid']);
			echo json_encode($data);
		}
		public function CitySelect() {
			$data = $this->Finance_Model->CitySelect($_REQUEST['stateid']);
			echo json_encode($data);
		}
		public function NightReport30(){
			$data['view']= $this->Finance_Model->SelectCountry();
			$this->load->view('backend/report/NightReport30',$data);
		}
		public function RoomNightReport30Con(){
			if ($this->session->userdata('name')=="") {
            redirect("/logout");
    		}
    		
    		$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
           	$ReportFilter= $this->Finance_Model->RoomNightReportFilter30Con($_REQUEST);
            foreach ($ReportFilter->result() as $key => $value) {
            		$noTotal[] = $value->noOfTrans;
            }
            $arraySum = array_sum($noTotal);
            	
           	foreach($ReportFilter->result() as $key1 => $r) {
			    $data[] = array(
		    			'',
		    			$LeadTime[$key1] = $r->LeadTime,
		    			$r->noOfTrans,
		    			$totper[$key1] = $arraySum,
		    	);
			}
			if (count($ReportFilter->result())!=0) {
				$data[] = array(
						'Total',
						array_sum($LeadTime),
						array_sum($noTotal),
						array_sum($totper),
				);
			}
			$output = array(
			   		"draw" => $draw,
				 	"recordsTotal" => $ReportFilter->num_rows(),
				 	"recordsFiltered" => $ReportFilter->num_rows(),
				 	"data" => $data
			);
		  	echo json_encode($output);

		}
		public function dummy() {
			$board = $this->Finance_Model->get_board_amount($_REQUEST['booking_id']);
			$general = $this->Finance_Model->get_general_amount($_REQUEST['booking_id']);
            $extrabed = $this->Finance_Model->get_extrabed_amount($_REQUEST['booking_id']);
            $individual_amount = $this->Finance_Model->get_individual_amount($_REQUEST['booking_id']);
			print_r($board);
			echo "<br>";
			echo "<br>";
			print_r($general);
			echo "<br>";
			echo "<br>";
			print_r($extrabed);
			echo "<br>";
			echo "<br>";
			print_r($individual_amount);
			echo "<br>";
			echo "<br>";
			$total_amount = $board + $general + $extrabed + $individual_amount;
			print_r($total_amount);
		}
		public function bookingReport() {
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
			$data['view']= $this->Finance_Model->SelectCountry();
			$data['agents'] = $this->Finance_Model->SelectAgent();
			$bookingreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Booking Report'); 
		    if (count($bookingreportMenu)!=0 && $bookingreportMenu[0]->view==1) {
		       $this->load->view('backend/report/bookingReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
		}
		public function BookingReportList() {
			$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	if (!isset($_REQUEST['filter'])) {
        		$_REQUEST['filter'] = 2;
      		}
           	$ReportFilter= $this->Finance_Model->BookingReportList($_REQUEST,$_REQUEST['filter']);
       		// print_r($ReportFilter->result());
       		// exit();
       		$TOTALCOUNTPer = array();
       		$TOTALROOMNIGHTSPer = array();

           	foreach($ReportFilter as $key => $r) {
           		$TOTALCOUNTPer[$key] = $r->TOTALCOUNT;
           		$TOTALROOMNIGHTSPer[$key] = $r->TOTALROOMNIGHTS;
       		}
           	foreach($ReportFilter as $key1 => $r) {
			    $data[] = array(
		    			$r->NAME,
		    			$r->TOTALCOUNT,
		    			round(($r->TOTALCOUNT/array_sum($TOTALCOUNTPer))*100),
		    			$r->TOTALROOMNIGHTS,
		    			round(($r->TOTALROOMNIGHTS/array_sum($TOTALROOMNIGHTSPer))*100),
		    			$r->AVERAGELEADDAYS,
		    			$r->AVERAGELENGTHOFSTAY,
		    	);
			}
			$output = array(
			   		"draw" => $draw,
				 	"recordsTotal" => count($ReportFilter),
				 	"recordsFiltered" => count($ReportFilter),
				 	"data" => $data
			);
		  	echo json_encode($output);
		}
   		public function allotmentUtilizationReport() {
   			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
    		$rooms = array();
			$data['view']  = $this->Finance_Model->SelectCountry();
			$data['view1'] = $this->Finance_Model->SelectHotel();
			$data['view2'] = $this->Finance_Model->SelectAgent();
			if (isset($_REQUEST['HotelSelect'])) {
				$rooms = $this->Finance_Model->getRooms($_REQUEST['HotelSelect'])->result();
			}
			$data['rooms'] = $rooms;
			$utilizationreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Allotment utilization Report'); 
		    if (count($utilizationreportMenu)!=0 && $utilizationreportMenu[0]->view==1) {
		       $this->load->view('backend/report/altUtlzReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
   		}
  //  		public function altUtlzReportList() {
		// 	$data = array();
  //   		$noTotal = array();
  //   		$LeadTime = array();
  //   		$totper = array();
  //       	// Datatables Variables
  //       	$draw = intval($this->input->get("draw"));
  //       	$start = intval($this->input->get("start"));
  //       	$length = intval($this->input->get("length"));
  //          	$ReportFilter= $this->Finance_Model->altUtlzReportList($_REQUEST);
  //      		// print_r($allotmentOutput);
  //      		// exit();
  //          	foreach($ReportFilter->result() as $key1 => $r) {
  //          		$allotmentOutput = $this->Finance_Model->allotmentOutput($r->hotel_id,$r->room_id,$r->contract_id,$r->allotement_date,$_REQUEST['Agent']);
		// 	    $data[] = array(
		//     			$r->allotement_date,
		//     			$allotmentOutput['allotment'],
		//     			$allotmentOutput['booking'],
		//     			$allotmentOutput['balance'],
		    		
		//     	);
		// 	}
		// 	$output = array(
		// 	   		"draw" => $draw,
		// 		 	"recordsTotal" => $ReportFilter->num_rows(),
		// 		 	"recordsFiltered" => $ReportFilter->num_rows(),
		// 		 	"data" => $data
		// 	);
		//   	echo json_encode($output);
		// }
		public function altUtlzReportList() {
			$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	$from_date=date_create($_REQUEST['from_date']);
        	$to_date=date_create($_REQUEST['to_date']);
        	$no_of_days=date_diff($from_date,$to_date);
        	$tot_days = $no_of_days->format("%a");
           	$ReportFilter= $this->Finance_Model->getRooms($_REQUEST);
           	foreach($ReportFilter->result() as $key1 => $r) {
			 	$data[] =$r->room_name."<table class='table table-condensed table-hover table-responsive table-desi'><thead>
			 	<tr>";
			 	for($i=0;$i<$tot_days;$i++) { 
			 		$ndate = date('Y-m-d', strtotime($_REQUEST['from_date']. ' + '.$i.' days'));
			 		$data[] = "<td></td><td>". $ndate."</td></tr></thead>";
			 	}
			 	$data[]="<tbody><tr><td>Allotment</td></tr><tr><td>Utilized</td></tr><tr><td>Balance</td></tr></tbody>
			 	</table>";
			}
		  	echo json_encode($data);
		}
		public function availabilityReport() {
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
    		$data['view']= $this->Finance_Model->SelectCountry();
    		$availabilityreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Availability Report'); 
		    if (count($availabilityreportMenu)!=0 && $availabilityreportMenu[0]->view==1) {
		       $this->load->view('backend/report/availabilityReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
		}
		public function nationalityReport() {
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
			$data['view']= $this->Finance_Model->SelectCountry();
			$nationalityreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Nationality Report'); 
		    if (count($nationalityreportMenu)!=0 && $nationalityreportMenu[0]->view==1) {
		       $this->load->view('backend/report/nationalityReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
		}
		public function nationalityReportList() {
			$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
           	$ReportFilter= $this->Finance_Model->NationalityReportList($_REQUEST);
       		$TOTALCOUNTPer = array();
       		$TOTALROOMNIGHTSPer = array();
           	foreach($ReportFilter->result() as $key => $r) {
           		$TOTALCOUNTPer[$key] = $r->TOTALCOUNT;
           		$TOTALROOMNIGHTSPer[$key] = $r->TOTALROOMNIGHTS;
       		}   			
           	foreach($ReportFilter->result() as $key1 => $r) {
			    $data[] = array(
		    			$r->NAME,
		    			$count[]=$r->TOTALCOUNT,
		    			$countper[]=round(($r->TOTALCOUNT/array_sum($TOTALCOUNTPer))*100,2),
		    			$totalnights[]=$r->TOTALROOMNIGHTS,
		    			$totalnightsper[]=round(($r->TOTALROOMNIGHTS/array_sum($TOTALROOMNIGHTSPer))*100,2),
		    	);
			}
			if (count($ReportFilter->result())!=0) {
				$data[] = array(
						'Total',
						array_sum($count),
						round(array_sum($countper)),
						array_sum($totalnights),
						round(array_sum($totalnightsper))
				);
			}
			$output = array(
			   		"draw" => $draw,
				 	"recordsTotal" => $ReportFilter->num_rows(),
				 	"recordsFiltered" => $ReportFilter->num_rows(),
				 	"data" => $data
			);
		  	echo json_encode($output);
		}
		public function availabilityList(){
			if ($this->session->userdata('name')=="") {
            redirect("/logout");
    		}
    		
    		$data = array();
    		$noTotal = array();
    		$LeadTime = array();
    		$totper = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
           	$availabilityList= $this->Finance_Model->AvailabilityRepList($_REQUEST);
            foreach ($ReportFilter->result() as $key => $value) {
            		$noTotal[] = $value->noOfTrans;
            }
            $arraySum = array_sum($noTotal);
            	
           	foreach($ReportFilter->result() as $key1 => $r) {
			    $data[] = array(
		    			'',
		    			$LeadTime[] = $r->LeadTime,
		    			$r->noOfTrans,
		    			$totper[] = (($r->noOfTrans) * 100)/$arraySum,
		    	);
			}
			if (count($ReportFilter->result())!=0) {
				$data[] = array(
						'Total',
						array_sum($LeadTime),
						array_sum($noTotal),
						array_sum($totper),
				);
			}
			$output = array(
			   		"draw" => $draw,
				 	"recordsTotal" => $ReportFilter->num_rows(),
				 	"recordsFiltered" => $ReportFilter->num_rows(),
				 	"data" => $data
			);
		  	echo json_encode($output);

		}
		public function avaReportFilter(){
			if ($this->session->userdata('name')=="") {
            redirect("/logout");
    		}
       		$data = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	// print_r($_REQUEST);
        	// exit();
        	if (!isset($_REQUEST['stateSelect'])) {
        		$_REQUEST['stateSelect'] = '';
        	}
        	if (!isset($_REQUEST['country'])) {
        		$_REQUEST['country'] = '';
        	}
        	$AvaReport = $this->Finance_Model->availabilityFilterList($_REQUEST['from_date'],$_REQUEST['to_date'],$_REQUEST['stateSelect'],$_REQUEST['country']);
        	if (count($AvaReport)!=0) {
	        	foreach($AvaReport['state'] as $key => $r) {
			    	$RoomAva[$key] = $this->Finance_Model->GetRoomAva($AvaReport['hotelRoom'][$key],$AvaReport['date'][$key]);
			      
								$data[] = array(
									$r,
									$AvaReport['date'][$key],
									$AvaReport['count'][$key],
									$RoomAva[$key]['balance'],
									$RoomAva[$key]['stopSaleCount'],
								);
					
			  	}
			  	$output = array(
				   	"draw" => $draw,
					"recordsTotal" => count($AvaReport['state']),
					"recordsFiltered" => count($AvaReport['state']),
					"data" => $data
				);
        	} else {
        		$output = array(
				   	"draw" => $draw,
					"recordsTotal" => 0,
					"recordsFiltered" => 0,
					"data" => $data
				);
        	}
		  echo json_encode($output);
		}
		public function AgentSalesReport() {
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
			$data['view']= $this->Finance_Model->agent_select();
			$salesreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Agent Sales Report'); 
		    if (count($salesreportMenu)!=0 && $salesreportMenu[0]->view==1) {
		       $this->load->view('backend/report/agent_sales_report',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
		}
		public function agentsalesfilter() {
			if ($this->session->userdata('name')=="") {
            redirect("/logout");
    		}
       		$data = array();
        	// Datatables Variables
        	$draw = intval($this->input->get("draw"));
        	$start = intval($this->input->get("start"));
        	$length = intval($this->input->get("length"));
        	$from_date= "";
        	$to_date= "";
        	
        	if (!isset($_REQUEST['agent_id'])) {
        		$_REQUEST['agent_id'] = '';
        	}
        	$agent_list = $this->Finance_Model->AgentsalesReport($_REQUEST['month'],$_REQUEST['year'],$_REQUEST['agent_id']);
        	
        	foreach($agent_list->result() as $key => $r) {

        		$totalcost = array();
        		$Totselling = array();
        		$Totmargin = array();
        		$booking_id = explode(",", $r->booking_id);

        		foreach ($booking_id as $key1 => $value1) {
					$totalcost[$key1]= $this->Finance_Model->TotcostGet($value1);
					$Totselling[$key1]= $this->Finance_Model->TotsellingGet($value1);
					$Totmargin[$key1]= $this->Finance_Model->TotmarginGet($value1);
        		}
        		// print_r(($r->bkid));
        		// exit();
				$data[] = array(
					$key+1,
					$r->hotel,
					$r->firstname.''.$r->lastname,
					$r->room,
					array_sum($totalcost),
					array_sum($Totselling),
					array_sum($Totmargin),
					(array_sum($Totmargin)*count($booking_id))/100,
				);
		  	}
			$output = array(
			   	"draw" => $draw,
				"recordsTotal" => $agent_list->num_rows(),
				"recordsFiltered" => $agent_list->num_rows(),
				"data" => $data
			);
			 
		  echo json_encode($output);
		}
		public function HotelSelect() {
			$data = $this->Finance_Model->SelectHotelByState($_REQUEST['stateid']);
			echo json_encode($data);
		}
		public function bookingpatternReport() {
			if ($this->session->userdata('name')=="") {
            	redirect("/logout");
    		}
			$data['view']= $this->Finance_Model->SelectCountry();
			$data['agents'] = $this->Finance_Model->SelectAgent();
			$patternreportMenu = menuPermissionAvailability($this->session->userdata('id'),'Report','Booking Pattern Report'); 
		    if (count($patternreportMenu)!=0 && $patternreportMenu[0]->view==1) {
		       $this->load->view('backend/report/bookingpatternReport',$data);
		    } else {
		      redirect(base_url().'backend/dashboard');
		    }   
		}
		public function BookingPatternReportList() {
           	$ReportFilter= $this->Finance_Model->BookingPatternReportList($_REQUEST);
       		// print_r($ReportFilter);
       		// exit();
       		$data = array();
           	foreach($ReportFilter as $key1 => $r) {
           		$color = $this->random_color_part().$this->random_color_part().$this->random_color_part();
			    $data['Name'][$key1] = $r->NAME;
			    $data['TOTALCOUNT'][$key1] = $r->TOTALCOUNT;
			    $data['TOTALROOMNIGHTS'][$key1] = $r->TOTALROOMNIGHTS;
			    $data['colors'][$key1] = '#'.$color;
			}
			
		  	echo json_encode($data);
		}
		public function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}
		public function bookinpatternreportform_validation() {
		    if ($_REQUEST['from_date']=="") {
		        $Return['error'] = 'From date field is required!';
		        $Return['color'] = 'orange';
		    }
		    else if ($_REQUEST['to_date']=="") {
		        $Return['error'] = 'To date field is required!';
		        $Return['color'] = 'orange';
		    }
		    else if ($_REQUEST['ConSelect']=="") {
		        $Return['error'] = 'Country field is required!';
		        $Return['color'] = 'orange';
		    }
		    else if ($_REQUEST['from_date']>$_REQUEST['to_date']) {
		        $Return['error'] = 'To Date Must be After From Date';
		        $Return['color'] = 'orange';
		    }
		    else {
		            $Return['status'] = '1';
		    }
		    echo json_encode($Return);
		}
		public function CountryHotelSelect() {
			$data = $this->Finance_Model->SelectHotelByCountry($_REQUEST['conid']);
			echo json_encode($data);
		}	
   }	
