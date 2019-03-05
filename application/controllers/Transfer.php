<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends MY_Controller {
	
	public function __construct() {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('List_Model');
          $this->load->model('Payment_Model');
          $this->load->library("Ajax_pagination");
          $this->load->helper('common');
    }	
	public function index() {
		if ($this->session->userdata('agent_name')=="") {
			redirect(base_url());
		}
		
		$data['nationality'] = $this->List_Model->getNationality();
		$this->load->view('frontend/transfers/transfer',$data); 
	}
	public function searchresults() {
		if ($this->session->userdata('agent_name')=="") {
	      redirect("../backend/logout/agent_logout");
	    }
	    $data['vehicletypes'] = $this->List_Model->GetVehicleTypes();
	    $data['agent_currency'] =  agent_currency();
	    // $data['list'] =  $this->List_Model->transfersearchprocess($_REQUEST);
	    $data['nationality'] = $this->List_Model->getNationality();
	    $this->load->view('frontend/transfers/transferresults',$data);
	}
	public function GetAirportName() {
		$keyword=$_REQUEST['keyword'];
    	$data=$this->List_Model->GetAirport($keyword);        
    	echo json_encode($data);
	}
	public function search_list() {
		$config['first_link'] = 'First';
	    $config['div'] = 'result_search'; //Div tag id
	    $config['base_url'] = base_url() . "transfer/searchresults";
    	$config['total_rows'] = $this->List_Model->Trasfersearch_listcount($_REQUEST);
    	 if ($_REQUEST['view_type']=="list") {
	      $config['per_page'] = 15;
	    } elseif ($_REQUEST['view_type']=="grid") {
	      $config['per_page'] = 24;
	    } else {
	      $config['per_page'] = 18;
	    }
	    $config['postVar'] = 'page';
	    $this->ajax_pagination->initialize($config);
	    if (!isset($_REQUEST['page']) || $_REQUEST['page']=="") {
	      $page = 0;
	    } else {
	      $page = $_REQUEST['page'];
	    }
	    $result["links"] = $this->ajax_pagination->create_links();
	     $myDateTime = DateTime::createFromFormat('d/m/Y H:i', $_REQUEST['arrivaldate']);
   		$arrivaldate = $myDateTime->format('d-m-Y');
	    $Transferlist = $this->List_Model->Trasfersearch_list($config['per_page'],$page); 
	    $minAmountArr = array();
	    if (count($Transferlist)!=0) {
      		foreach ($Transferlist as $key => $value) {
		       
		        $image = base_url('uploads/vehicle_images/'.$value->vehicleID.'/'.$value->vehicle_image);
		        $original_price = $_REQUEST['Passenger'] * $value->Passenger_selling;
		        if($_REQUEST['transfertype']=='one-way') {
		        	$original_price = $_REQUEST['Passenger'] * $value->Passenger_selling;
		        } else {
		        	$original_price = 2 * $_REQUEST['Passenger'] * $value->Passenger_selling;
		        }
		        $agentMarkup = mark_up_get();
		        $adminMarkup = 0;
		        $totalMarkup = $agentMarkup+$adminMarkup;
		        $original_price =  ($original_price*$totalMarkup)/100+$original_price;
		        $minAmountArr[$key] = $original_price;
		        if ($_REQUEST['view_type']=="list") {
					$data['list'][] =  '<div class="offset-2">
			            <div class="col-md-3 offset-0">
			            <div class="listitem">
			            <a href="'.$value->vehicle_image.'"  data-title="'.$value->VehicleName.'" data-gallery="multiimages" data-toggle="lightbox"><img src="'.$image.'"  alt=""/></a>
			            <div class="liover"></div>
			            <a class="fav-icon" href="#" onclick="favourite_add('.$this->session->userdata("agent_id").','.$value->vehicleCode.')"></a>
			            <a class="book-icon" target="_blank" href="'.$value->vehicleCode.'"></a>
			            </div>
			            </div>
			            <div class="col-md-9 offset-0">
				        <div class="itemlabel3">
				        <div class="labelright">
				        <div class="customer-rating">
				       	<p class="grey"><i class="fa fa-user" aria-hidden="true"></i>  '.$value->Passengers.' Passengers</p>
						<p class="grey"><i class="fa fa-suitcase" aria-hidden="true"></i>  '.$value->Bags.' Bags</p>
				        </div><br><br>
				        <div class="row"><div class="col-xs-12"><p class="color-green size24">
				        <b style="width:100%;display:block;"><small><small>'.agent_currency().'</small> '.currency_type(agent_currency(),$original_price).'</b></p></div></div>
				        <span class="size11 grey">'.$_REQUEST['transfertype'].'</span>
				        <a onclick="transferview('.$value->contractId.','.$value->vehicleId.')" style="background:green;border-bottom: 2px solid green;" href="#" class="hotel-view-btn" target="_blank">Book</a>
				        </div>
			            <div class="labelleft2">
			            <h3>'.$value->ContractName.'</h3>
			           <span class="size11 grey">'.$value->VehicleName.'</span>

			            <p class="grey"> <br>'.$value->description.'</p>
			            
			            <ul class="hotelpreferences--search">
			            </ul>
			            </div>
			            </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="col-sm-12 more-wrap">
			           
			            <div class="spin-wrapper-sub text-center" style="display: block;">
			            <img src="'.base_url().'/assets/images/ellipsis-spinner.gif" alt="" width="75px">
			            </div>
			            </div>
			            </div>
			            </div>
			            </div>

			            <div class="clearfix"></div>
			            <div class="offset-2"><hr class="featurette-divider3"></div>';
        			} else if ($_REQUEST['view_type']=="grid") {
			            $data['list'][] =  '<div class="col-md-4 border">
							<div class="carscontainer">
							<div class="center listitem">
								<a href=""><img src="'.$image.'" alt=""/></a>
							</div>
							<div class="hpadding20">	  
								<span class="size14 bold dark">Shared Transfer</span><br/>
								<span class="size13 grey">
								
									<table>
										<tr>
											<td class="dark bold" valign="top">From:&nbsp;&nbsp;&nbsp;</td>
											<td>'.$value->name.'</td>
										</tr>
										<tr>
											<td class="dark bold" valign="top">To:</td>
											<td>'.$_REQUEST['region'].'</td>
										</tr>
										<tr>
											<td class="dark bold" valign="top">On:</td>
											<td>'.$arrivaldate.'</td>
										</tr>
									</table>
								
								</span>
							</div>
							<div class="purchasecontainer">
								<span class="size18 bold green mt5"> <small>'.agent_currency().'</small> '.currency_type(agent_currency(),$original_price).'</span><br/>
								<span class="size12 mt-3 grey"><i>per way</i></span>
								<button class="bookbtn right margtop-20">Book</button>	
							</div>
						</div>
					</div>';
			        }
      			}
   			 }

		    if (count($Transferlist)==0) {
		      $data['list'][] = '<p class="text-center no-records"><i class="fa fa-warning"></i>No Records found.</p>';
		    }
	    $data['list'][] = '<div class="col-md-12 pull-right"><div class="hpadding20">
	      <ul class="pagination right paddingbtm20">
	      '.$result["links"].'
	      </ul>
	      </div></div>';
	    $data['countprice'][] = count($minAmountArr)==0 ? count($minAmountArr) :  floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),MIN($minAmountArr))));
	    $data['transfercount'][] = $config['total_rows'];
	    echo json_encode($data);       
	}
	public function transferview() {
	    $contractid = $_REQUEST['contractid'];
	    $vehicleid = $_REQUEST['vehicleid'];
	    $data['transferdetails'] = $this->List_Model->gettransferdetails($contractid,$vehicleid);
	    $data['contract_policies'] = $this->List_Model->gettransfercontractpolicies($contractid);
	    $data['contractconditions'] = $this->List_Model->gettransfercontractconditions($contractid);
	    $data['agent_credit_amount'] = $this->List_Model->agent_credit_amount();
	    $agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $data['totalMarkup'] = $agentMarkup+$adminMarkup;
	    $this->load->view('frontend/transfers/transferview',$data);
 	}
  	public function paymentbooking() {
		$contractid = $_REQUEST['contractid'];
		$vehicleid = $_REQUEST['vehicleid'];
		$data['transferdetails'] = $this->List_Model->gettransferdetails($contractid,$vehicleid);
		$data['agent_credit_amount'] = $this->List_Model->agent_credit_amount();
		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $data['totalMarkup'] = $agentMarkup+$adminMarkup;
		$this->load->view('frontend/transfers/transferpaymentbooking',$data);
	}
	public function transferbookingconfirm() {
		$contractid = $_REQUEST['contractid'];
		$vehicleid = $_REQUEST['vehicleid'];
		$transferdetails = $this->List_Model->gettransferdetails($contractid,$vehicleid);
		$passenger = $_REQUEST['passenger'];
		if($_REQUEST['transfertype']=='one-way') {
     		$type = 1;
    	} else {
			$type = 2;
    	} 
    	$oneway_cost = $passenger * $transferdetails[0]->Passenger_cost;
    	$oneway_selling = $passenger * $transferdetails[0]->Passenger_selling;
    	$agent_markup = mark_up_get();
        $admin_markup = 0;
		$total_amount = $type * $passenger * $transferdetails[0]->Passenger_selling;
		for($i=0;$i<$passenger;$i++){
        $cost[] = $transferdetails[0]->Passenger_cost;
        $selling[] = $transferdetails[0]->Passenger_selling;
		}
		$passengercost = implode(',', $cost);
		$passengerselling =implode(',', $selling);
		$individual_amount = $transferdetails[0]->Passenger_selling;
		$totalcost = $type * $passenger * $transferdetails[0]->Passenger_cost;
		$max_id = $this->List_Model->max_transferbooking_id();
        if ($max_id[0]->id=="") {
          $max_booking_id = "TRAB01";
        } else {
          $booking_id = $max_id[0]->id+1;
          $max_booking_id = "TRAB0".$booking_id;
        }
		$agent_currency_type = $this->List_Model->agent_currency_type();
 		$insert_id = $this->List_Model->transfer_booking_add($_REQUEST,$max_booking_id,$agent_currency_type,$total_amount,$oneway_cost,$oneway_selling,$passengercost,$passengerselling,$totalcost,$individual_amount,$agent_markup,$admin_markup);
 		$contract_policies = $this->List_Model->gettransfercancellationpolicies($_REQUEST);
        if (count($contract_policies)!=0) {
            foreach ($contract_policies as  $Cpvalue) {
              $this->List_Model->addTransferCancellationBooking($insert_id,$Cpvalue->id,$Cpvalue->from_date,$Cpvalue->to_date,$Cpvalue->cancel_percent,$Cpvalue->from_day,$Cpvalue->to_day,$Cpvalue->description);
            }
        }
	    $contractconditions = $this->List_Model->gettransfercontractconditions($contractid);
	    if (count($contractconditions)!=0) {
            foreach ($contractconditions as  $Cpvalue) {
              $this->List_Model->addTransferConditionsBooking($insert_id,$Cpvalue->id,$Cpvalue->conditions);
            }
        }
        AgentlogActivity('Transfer booked [ID: '.$insert_id.', Transfer ID: '.$max_booking_id.']');
        transferemailNotification('Booking','Accept',$this->session->userdata('agent_id'),$insert_id,$_REQUEST['RequestType']);

		$this->session->set_flashdata('message', 'Booked Successfully');
        redirect('../transfer');
	}
	public function dummy() {
		$this->session->set_flashdata('message', 'Booked Successfully');
        redirect('../transfer');
	}
	public function agent_booking() {
		$this->load->view('frontend/transfers/bookingList');
	}
	public function transfer_booking_list() {
		$data = array();
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		if (isset($_REQUEST['filter'])) {
		  $filter = $_REQUEST['filter'];
		} else {
		  $filter = "2";
		}
        $booking_list = $this->List_Model->transfer_booking_list($filter);
        foreach($booking_list->result() as $key => $r) {
        	$permission = '<a title="cancel" href="#" class="btn btn-sm btn-danger" onclick="deletetransferfun('.$r->bookId.');" data-toggle="modal" data-target="#myModal"><i class="fa fa-remove" aria-hidden="true"></i></a>';
        	$view='<a title="view" class="btn btn-sm btn-success" href="'.base_url().'transfer/transfer_booking_view/'.$r->bookId.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';

	    	if ($r->booking_flag==2 || $r->booking_flag==8) {
	            $status= "<span class='text-primary'>pending</span>";
	            $button = $view.$permission;
	        } else if ($r->booking_flag==1) {
	            $status= "<span class='text-success'>Accepted</span>";
	            $button = $view;
	        } else if ($r->booking_flag==0) {
	            $status= "<span class='text-danger'>Rejected</span>";
	            $button = $view;
	        } else if ($r->booking_flag==3) {
	            $status= "<span class='text-danger'>Cancelled</span>";
	            $button = $view;
	        } else if ($r->booking_flag==4) {
	            $status= "<span class='text-danger'>Accept Pending</span>";
	            $button = $view;
	        } else if ($r->booking_flag==5) {
	            $status= "<span class='text-danger'>Cancellation pending</span>";
	            $button = $view;
	      	}
	      	if (isset($r->invoice_id) && $r->invoice_id!="" && $r->booking_flag==1) {
            	$invoice = '<a class="text-primary" href="'.base_url().'transfer/invoice_pdf?id='.$r->bookId.'">'.$r->invoice_id.'</a>';
          	} else {
            	$invoice = '';
          	}
	      	$total_markup = $r->agent_markup+$r->admin_markup; 
	      	$total_amount = ($r->total_amount*$total_markup)/100+$r->total_amount;
            $data[] = array(
          		$key+1,
          		$r->booking_id,
          		date('d/m/Y',strtotime($r->Created_Date)),
          		$r->transfertype,
          		$invoice,
          		$r->arrivaldate,
          		$r->From_location.'<b> to </b> '.$r->To_location,
          		agent_currency()." ".currency_type(agent_currency(),$total_amount),
          		$status,
          		$button
          	);
        }
        $output = array(
         "draw"            => $draw,
         "recordsTotal"    => $booking_list->num_rows(),
         "recordsFiltered" => $booking_list->num_rows(),
         "data" => $data
        );
        echo json_encode($output);
        exit();
	}
	public function transfer_booking_view($id) {
		$view = $this->List_Model->transfer_booking_details($id);
        $data['view'] = $view;
        $data['cancellation'] = $this->List_Model->gettransferbookpolicy($id,$view[0]->arrivaldate);
        $data['conditions'] = $this->List_Model->gettransferbookcondition($id);
		$this->load->view('frontend/transfers/transferbookingview',$data);
	}
	public function CancellationBookingModal() {
		$bookId = $_REQUEST['id'];
		$data['view'] = $this->List_Model->transfer_booking_details($bookId);
		$data['cancelation'] = $this->List_Model->gettransferbookpolicy($bookId);
		$this->load->view('frontend/transfers/cancellationtransferbookingmodal',$data);
	}
	public function CancellationTransferBooking() {
		$this->List_Model->CancellationTransferBookingUpdate($_REQUEST['id']);
		AgentlogActivity('Transfer booking cancelled [ID: '.$_REQUEST['id'].']');
		echo json_encode(true);
	}
	public function invoice_pdf() {
      	$data = $this->List_Model->transfer_booking_detail($_REQUEST['id']);  
		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		ob_start();
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$this->load->library('Pdf');
		$dimensions = $pdf->getPageDimensions();
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetDisplayMode('real', 'default');

		// HEADER
		$pdf->SetAuthor('Otelseasy');
		$pdf->SetTitle('Otelseasy');

		// DESIGN
		// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		// $pdf->SetHeaderMargin(20);
		$pdf->AddPage();
		$info_right_column = '';
		$info_left_column  = '';
		$invoice='';  

		//AGENT DETAILS
		$agent_name=$data[0]->AFName." ".$data[0]->ALName;
		$agent_number=$data[0]->Mobile;
		$agent_email=$data[0]->Email;

		//TRANSFER DETAILS
		$myDateTime = DateTime::createFromFormat('d/m/Y H:i', $data[0]->arrivaldate);
		$arrivaldate = $myDateTime->format('Y-m-d');	
		$arrivaldate1 = $myDateTime->format('d-m-Y'); 
		$invoice_company_name=$data[0]->ContractName;
		$invoice_company_address=$data[0]->CityName." ".$data[0]->countryName;  
		$tbl_header = '<table border="0"  cellspacing="2" nobr="true" style="border-bottom:1px solid #999">';
		$tbl_footer = '</table>';
		$tbl = '';
		$tbl .= 
		'
		  <tr>
		    <td><img width="100" src="'.base_url().'skin/images/dash/logo.png" /></td>
		    <td style="text-align:right;">'.$agent_name.'<br>'.$agent_number.'<br>'.$agent_email. '
		    </td>
		  </tr>
		';

		$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

		$html='
		<div  style="font-size:14px ;font-weight:bold;color:#337ab7;">INVOICE</div>
		<div  style="font-size:12px ">Issued to : </div>
		';
		$pdf->writeHTML($html, false, false, false, false, '');

		//INVOICE DETAILS
		$invoice_data_date= date("d-m-Y",strtotime($data[0]->invoice_date));
		$invoice_number = $data[0]->invoice_id;
		if ($invoice_number=="") {
		$invoice_number = "Invoice0000";
		}
		$reference_id = $data[0]->booking_id;
		$customer_name=$data[0]->bk_contact_fname." ".$data[0]->bk_contact_lname;
		$customer_email=$data[0]->bk_contact_email;
		$customer_phone=$data[0]->bk_contact_number;
		$booking_id=$data[0]->bookid;

		$tb2 =
		'
			<table class="table2">
			<tbody>
				<tr>
					<td style="text-indent:5px;">'.$customer_name.'</td>
					<td style="text-align:right;">Invoice date  : '.$invoice_data_date.'</td>
				</tr>
				<tr>
					<td style="text-indent:5px;">'.$customer_phone.'</td>
					<td style="text-align:right;">Invoice number  : '.$invoice_number.'</td>
				</tr>
				<tr>
					<td style="text-indent:5px;">'.$customer_email.'</td>
					<td style="text-align:right;">Booking reference number : '.$reference_id.'</td>
				</tr>
				<tr>
					<td style="text-indent:5px;"></td>
					<td style="text-align:right;">Tour name : '.$invoice_company_name.'</td>
				</tr>
			</tbody>
			</table>
		';

		$pdf->writeHTML($tb2, true, false, false, false, '');
		// TRANSFER DETAILS
		$tb3=
		'
			<style type="text/css">
				.tg  {border-spacing:0;border:1px solid grey; border-collapse: collapse;text-align:center;}
				.tg td{font-size:10px;padding-top:2px 20px;border-style:solid;border-width:1px;word-break:normal;color:#333;background-color:ghostwhite; padding-bottom: 20px; border-collapse: separate;}
				.tg th{font-size:11px;padding:2px 20px;border-style:solid;border-width:1px;overflow:hidden;color:#333;background-color:ghostwhite; border-bottom: 1px solid #f0f8ff; height:20px;}
				.rgt_bor {border-right: 1px dashed #ccc;}
				.tg tr{width: 100%;}
			</style>
			<table class="tg">
				<tr>
					<th class="tgh rgt_bor" >Tour Name</th>
					<th class="tgh rgt_bor">Duration</th>
					<th class="tgh rgt_bor">Arrival Date</th>
				</tr>
				<tr>
					<td class="tgd rgt_bor">'.$invoice_company_name.'</td>
					<td class="tgd rgt_bor">'.$data[0]->arrivaldate.'</td>
				</tr>
			</table>
		';

		// $pdf->writeHTML($tb3, true, false, false, false, '');

		//AMOUNT DETAILS START

		$tb5=
		'
			<table style="border-collapse: collapse">
			<tbody>
				<tr>
					<th style="font-size:10px;font-weight:bold">Booking Amount Breakup : <br></th>
				</tr>
			</tbody>
			</table>
		';
		$pdf->writeHTML($tb5,true,false,false,false,'');
		$tb51=
		'
			<style type="text/css">
				.tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
				.tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
				.tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
			</style>
		';
		$total_markup = $data[0]->agent_markup+$data[0]->admin_markup;
		$total_amount = ($data[0]->total_amount*$total_markup)/100+$data[0]->total_amount;
		$SellingPerWay = ($data[0]->SellingPerWay*$total_markup)/100+$data[0]->SellingPerWay;
		$cancelation =  $this->List_Model->gettransferbookpolicy($_REQUEST['id']);
		$tb51.=
		'
			<table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
			<thead>
				<tr style="background-color: #0074b9;">
					<td style="color: white">Date & Time</td>
					<td style="color: white">Vehicle Name</td>
					<td style="color: white">Pickup/Dropoff</td>
					<td style="color: white">Rate</td>
				</tr>
			</thead>
			<tbody>
		';
		$tb51 .=
		'
			    <tr>
			          <td>'.$data[0]->arrivaldate.'</td>
			          <td>'.$data[0]->VehicleName.'</td>
			          <td>'.$data[0]->From_location.'<br> - <br>'.$data[0]->To_location.'</td>
			          <td style="text-align: right">
			          '.currency_type(agent_currency(),$SellingPerWay).' '.agent_currency().'</td>
			    </tr>
		';   
		if($data[0]->transfertype == 'two-way') {
			$tb51 .=
			'
			    <tr>
			          <td>'.$data[0]->returndate.'</td>
			          <td>'.$data[0]->VehicleName.'</td>
			          <td>'.$data[0]->To_location.'<br> - <br>'.$data[0]->From_location.'</td>
			          <td style="text-align: right">
			          '.currency_type(agent_currency(),$SellingPerWay).' '.agent_currency().'</td>
			    </tr>
			';  
		}               
		$tb51 .=
		'
			</tbody>
			<tfoot>
				<tr>
				    <td colspan="3" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
				    <td style="text-align:right"><strong style="color:#0074b9">'.currency_type(agent_currency(),$total_amount).' '.agent_currency().'</strong></td>
				</tr>
		</tfoot>
		</table>';
		


		$pdf->writeHTML($tb51,true,false,false,false,'');
		$final_total = $total_amount;
		$tb52 =
		'
			<table style="border-collapse: collapse">
				<tr>
					<td colspan="2"></td>
					<td>Tax :</td>
					<td style="text-align:right">0%</td>
				</tr>
		';

		$tb52 .= 
		'
				<tr>
					<td colspan="2"></td>
					<td>GRAND TOTAL :</td>
					<td style="text-align:right">'.currency_type(agent_currency(),$final_total).' '.agent_currency().'</td>
				</tr>
			</table>
		';
		$pdf->writeHTML($tb52,true,false,false,false,'');
		//AMOUNT DETAILS END

	   	$conditions = $this->List_Model->gettransferbookcondition($_REQUEST['id']); 
	   	$cancelation = $this->List_Model->gettransferbookpolicy($_REQUEST['id']);
    	if(count($cancelation)!=0) {

	        $tb7 =
	        ' 
		        <table style="border-collapse: collapse">
	                <tbody>
	                  	<tr>
	                    	<td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Cancellation policy:</div></td>
	                  	</tr>
	                </tbody>
		        </table>
	            <br>
	            <br>
	            <style type="text/css">
	              .tg  {border-spacing:0;border:1px solid #dddddd; border-collapse: collapse;text-align:center;}
	              .tg td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}
	              .tg tr td{font-size:11px;border-style:solid #dddddd;border-width:1px;word-break:normal;color:#333;  border-collapse: separate;}             
	            </style>
	            <table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
	              	<thead>
	                <tr style="background-color: #0074b9;">
	                  	<td style="color: white">Cancelled on or After</td>
	                  	<td style="color: white">Cancelled on or Before</td>
	                  	<td style="color: white">Cancellation Charge</td>
	                </tr>
	              	</thead>
	              	<tbody>
	        ';
	        foreach ($cancelation as $Canckey => $Cancvalue) { 
	            if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysFrom).' days',
	            strtotime($arrivaldate))) < $data[0]->Created_Date) {
	               	$afterDate =  date('d/m/Y',strtotime($data[0]->Created_Date));
	            } else {
	                $afterDate =   date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($arrivaldate)));
	            }
	           	if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysTo).' days', 
				strtotime($arrivaldate))) < $data[0]->Created_Date) {
					$beforeDate =  date('d/m/Y',strtotime($data[0]->Created_Date));
				} else {
					$beforeDate = date('d/m/Y' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($arrivaldate)));
				}

	              	$tb7 .=
	              	'
		              	<tr>
			                <td>'.$afterDate.'</td>
			                <td>'.$beforeDate.'</td>
			                <td>'.$Cancvalue->cancellationPercentage.'% '.$Cancvalue->application.'</td>
		              	</tr>
		            ';
	            }
	        $tb7 .=
	        	'
	        		</tbody>
	        		</table>
	        	';
	      	$pdf->writeHTML($tb7,true,false,false,false,'');
   		}
    	if (count($conditions)!=0) {
	       	$tb8=
	       	'
			    <table style="border-collapse: collapse">
			        <thead>
			          <tr>
			            <td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Important Remarks & Policies: </div></td>
			          	</tr>
			        </thead>
			';
			foreach ($conditions as $value) {
				$tb8.=
       				'
				        <tbody>
				          <tr>
				            <td style="font-size:10px;text-indent:20px">'.$value->condition.' </td>
				          	</tr>
				        </tbody>
				    </table><br>
				';
			}
			$pdf->writeHTML($tb8,true,false,false,false,'');
		}   	   
	    $bankDetails = $this->Payment_Model->bankDetails();
	   	$tb9 = 
	   	'
	   		<table style="border-collapse: collapse">
        	<thead>
        		<tr>
            		<td style="font-size:10px;text-indent:20px"><div style="font-weight:bold">Otelseasy Bank Account Details: </div>
            		</td>   
           		</tr>
            	<tr>
            		<td style="font-size:10px;">'.nl2br($bankDetails[0]->account).'
            		</td>
            	</tr>
           		<tr>
           			<td style="font-size:10px;">'.$bankDetails[0]->email.'</td>
           		</tr>
            </thead>
     		</table>
     	';      
     	$pdf->writeHTML($tb9,true,false,false,false,'');
        $type = 'D';
        $pdf->Output($invoice_number.'.pdf', $type);
    }
}


