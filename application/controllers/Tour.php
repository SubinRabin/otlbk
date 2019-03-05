<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends MY_Controller {
	
	public function __construct() {
          parent::__construct();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->model('Tour_Model');
          $this->load->model('Payment_Model');
          $this->load->library("Ajax_pagination");
          $this->load->helper('common');
          $this->load->library('email');
          $this->load->library('session');
    }
	public function index()	{
		if ($this->session->userdata('agent_name')=="") {
			redirect(base_url());
		}
		
		$data['nationality'] = $this->Tour_Model->getNationality();
		$this->load->view('frontend/tours/tour',$data); 
	}
	public function tourlist() {
		 if ($this->session->userdata('agent_name')=="") {
	      redirect("../backend/logout/agent_logout");
	    }
	    $data['agent_currency'] =  agent_currency();
	   	$data['list'] =  $this->Tour_Model->toursearchprocess($_REQUEST);
	    $data['nationality'] = $this->Tour_Model->getNationality();
	    $this->load->view('frontend/tours/tourlists',$data);
	}
	public function search_list() {
		$config['first_link'] = 'First';
	    $config['div'] = 'result_search'; //Div tag id
	    $config['base_url'] = base_url() . "tour/tourlist";
	    $config['total_rows'] = $this->Tour_Model->SearchTourListDataFetchcount();
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
	    $TourList = $this->Tour_Model->SearchTourListDataFetch($config['per_page'],$page);
	    $minAmountArr = array();
	    if (count($TourList)!=0) {
      		foreach ($TourList as $key => $value) {
		        if (strlen($value->description)> 180) {
		          $tourdescription[$key] = substr($value->description, 0, 180).'...';
		        } else {
		          $tourdescription[$key] = $value->description;
		        }
		        $image = base_url('uploads/tour_services_images/'.$value->tour_type.'/'.$value->image);
		        $adultcount = array_sum($_REQUEST['adults']);
		        $childcount = array_sum($_REQUEST['Child']);
		        if (isset($_REQUEST['room1-childAge'])) {
					foreach ($_REQUEST['room1-childAge'] as $key => $age) { 
						if($age > $value->max_childAge) {
							$adultcount++;
							$childcount--;
						}
					}
				} 
		        $adultcost = $adultcount * ($value->adult_selling);
		        $childcost = $childcount * ($value->child_selling);
		        $agentMarkup = mark_up_get();
		        $adminMarkup = 0;
		        $totalMarkup = $agentMarkup+$adminMarkup;
		        $original_price = $adultcost + $childcost;
		        $original_price =  ($original_price*$totalMarkup)/100+$original_price;
		      	$minAmountArr[$key] = $original_price;
       				if ($_REQUEST['view_type']=="list") {
			            $data['list'][] =  '<div class="offset-2">
			            <div class="col-md-3 offset-0">
			            <div class="listitem">
			            <a href="'.$value->image.'"  data-title="'.$value->type.'" data-gallery="multiimages" data-toggle="lightbox"><img src="'.$image.'"  alt=""></a>
			            <div class="liover"></div>
			            <a class="fav-icon" href="#" onclick="favourite_add('.$this->session->userdata("agent_id").','.$value->contract_code.')"></a>
			            <a class="book-icon" onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->tour_type.'"></a>
			            </div>
			            </div>
			            <div class="col-md-9 offset-0">
			            <div class="itemlabel3">
			            <div class="labelright">
			           
			           <h5 class="room-type"><span class="text-primary text-transform bold"></span> <span class="tool-tip" title="#"></span> </h5 class="room-type">
            				<p></p>
			            <div class="row"><div class="col-xs-12"><p class="color-green size24">
			            <b style="width:100%;display:block;"><small>'.agent_currency().'</small> '.currency_type(agent_currency(),$original_price).'</b></p></div></div>
			            <span class="size11 grey">'.$value->duration.' '.$value->durationType.'</span>
			              
			             <a  onclick="tourview('.$value->contractid.','.$value->tour_type.')" style="background:green;border-bottom: 2px solid green;" href="'.base_url().'tour/tourview/" class="hotel-view-btn" target="_blank">Book</a>
			         
			           
			            </div>
			            <div class="labelleft2">
			             <a onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->tour_type.'"><h3>'.$value->type.' </h3> </a>
			                 
			            <p class="grey">'.$tourdescription[$key].'</p><br/>
			            <ul class="hotelpreferences--search">
			            </ul>
			            </div>
			            </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="col-sm-12 more-wrap">
			            <div class="more-content more-content'.$value->tour_type.'">
			            <div class="spin-wrapper-sub text-center" style="display: block;">
			            <img src="'.base_url().'/assets/images/ellipsis-spinner.gif" alt="" width="75px">
			            </div>
			            </div>
			            </div>
			            </div>
			            </div>

			            <div class="clearfix"></div>
			            <div class="offset-2"><hr class="featurette-divider3"></div>';
        			} elseif ($_REQUEST['view_type']=="grid") {
			            $data['list'][] =  '<div class="col-md-4">
			          <div class="listitem">
			          <a href="'.$value->image.'"  data-title="'.$value->type.'" data-gallery="multiimages" data-toggle="lightbox"><img src="'.$image.'"  alt=""/></a>
			          <div class="liover"></div>
			          <a class="fav-icon" href="#" onclick="favourite_add('.$this->session->userdata("agent_id").','.$value->tour_type.')"></a>
			          <a class="book-icon" onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->tour_type.'"></a>
			          </div>
			          <div class="itemlabel">
			          <div class="right mt1" style="top:-19px;">
			         <a  onclick="tourview('.$value->contractid.','.$value->tour_type.')" style="background:green;border-bottom: 2px solid green;" href="'.base_url().'tour/tourview/" class="hotel-view-btn" target="_blank">Book</a>
			          </div>
			           <a onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->tour_type.'"> <b>'.$value->type.'</b> </a>
			         <br>
			          <p class="lightgrey"><span class="green size14"><b><small>'.agent_currency().'</small> '.currency_type(agent_currency(),$original_price).'</b> </span> / '.$value->duration.' '.$value->durationType.' </p>
			          </div>
			          </div>';
			        } else {
			          $data['list'][] = '<div class="col-md-4">
			          <div class="listitem">
			          <a href="'.$value->image.'"  data-title="'.$value->type.'" data-gallery="multiimages" data-toggle="lightbox"><img src="'.$image.'"  alt=""/></a>
			          <div class="liover"></div>
			          <a class="fav-icon" href="#"></a>
			          <a class="book-icon" onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->type.'"></a>
			          </div>
			          <div class="itemlabel2">
			          <div class="labelright">
			          <div class="rate-size"><small></small></div>
			          <img src="" width="60" alt=""><br>
			          <span class="size11 grey"></span><br><br>
			          <span class="green size18"><b><small>'.agent_currency().'</small> '.currency_type(agent_currency(),$original_price).'</b></span><br>
			          <span class="size11 grey">'.$value->duration.' '.$value->durationType.' night</span><br><br><br>
			        <a  onclick="tourview('.$value->contractid.','.$value->tour_type.')" style="background:green;border-bottom: 2px solid green;" href="'.base_url().'tour/tourview/" class="hotel-view-btn" target="_blank">Book</a>
			          </div>
			          <div class="labelleft">     
			         <a onclick="tourdetails('.$value->contractid.','.$value->tour_type.')" target="_blank" href="'.$value->tour_type.'"> <b>'.$value->type.'</b> <br><br><br>
			          <p class="grey">'.$tourdescription[$key].'</p>
			          </div>
			          </div>
			          </div>';
			        }
      			}
   			 }

		    if (count($TourList)==0) {
		      $data['list'][] = '<p class="text-center no-records"><i class="fa fa-warning"></i>No Records found.</p>';
		    }
	    $data['list'][] = '<div class="col-md-12 pull-right"><div class="hpadding20">
	      <ul class="pagination right paddingbtm20">
	      '.$result["links"].'
	      </ul>
	      </div></div>';
      	$data['countprice'][] = count($minAmountArr)==0 ? count($minAmountArr) :  floatval(preg_replace('/[^\d.]/', '', currency_type(agent_currency(),MIN($minAmountArr))));
	    $data['counttours'][] = $config['total_rows'];
	    echo json_encode($data);
	}
	public function tourview() {
		$contractid = $_REQUEST['contractid'];
		$tourid = $_REQUEST['tourid'];
		$data['tourdetails'] = $this->Tour_Model->gettourdetails($contractid,$tourid);
		$data['contract_policies'] = $this->Tour_Model->getcancellationpolicies($_REQUEST);
		$data['contractconditions'] = $this->Tour_Model->getcontractconditions($contractid);
		$data['agent_credit_amount'] = $this->Tour_Model->agent_credit_amount();
		$data['services'] = $this->Tour_Model->multipleServices($tourid);
		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $data['totalMarkup'] = $agentMarkup+$adminMarkup;
		$this->load->view('frontend/tours/tourview',$data);
	}
	public function paymentbooking() {
		$contractid = $_REQUEST['contractid'];
		$tourid = $_REQUEST['tourid'];
		$data['tourdetails'] = $this->Tour_Model->gettourdetails($contractid,$tourid);
		$data['agent_credit_amount'] = $this->Tour_Model->agent_credit_amount();
		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $data['totalMarkup'] = $agentMarkup+$adminMarkup;
		$this->load->view('frontend/tours/tourpaymentbooking',$data);
	}
	public function tourbookingconfirm() {
		$contractid = $_REQUEST['contractid'];
		$tourid = $_REQUEST['tourid'];
		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $totalMarkup = $agentMarkup+$adminMarkup;
		$tourdetails = $this->Tour_Model->gettourdetails($contractid,$tourid);
		$adultcount = $_REQUEST['adults'];
		$childcount = $_REQUEST['childs'];
		if (isset($_REQUEST['room1-childAge'])) {
			foreach ($_REQUEST['room1-childAge'] as $key => $age) { 
				if($age > $tourdetails[0]->max_childAge) {
					$adultcount++;
					$childcount--;
				}
			}
		}
		$childcost = array();
		$childselling = array();
		for($i=0;$i<$adultcount;$i++){
        $adultcost[] = $tourdetails[0]->adult_cost;
        $adultselling[] = $tourdetails[0]->adult_selling;
		} 
		for($i=0;$i<$childcount;$i++){
        $childcost[] = $tourdetails[0]->child_cost;
        $childselling[] = $tourdetails[0]->child_selling;
		} 
		$adult_cost = implode(',', $adultcost);
		$adult_selling =implode(',', $adultselling);
		$child_cost = implode(',', $childcost);
		$child_selling =implode(',', $childselling);
		$total_amount = ($adultcount * $tourdetails[0]->adult_selling) + ($childcount * $tourdetails[0]->child_selling);
		$total_cost = ($adultcount * $tourdetails[0]->adult_cost) + ($childcount * $tourdetails[0]->child_cost);
		$max_id = $this->Tour_Model->max_booking_id();
        if ($max_id[0]->id=="") {
          $max_booking_id = "TAB01";
        } else {
          $booking_id = $max_id[0]->id+1;
          $max_booking_id = "TAB0".$booking_id;
        }
		$agent_currency_type = $this->Tour_Model->agent_currency_type();
 		$insert_id = $this->Tour_Model->tour_booking_add($_REQUEST,$max_booking_id,$agent_currency_type,$total_amount,$total_cost,$adult_selling,$adult_cost,$child_selling,$child_cost,$adminMarkup,$agentMarkup);
 		if (isset($_REQUEST['mulltiServiceDate'])) {
 			foreach ($_REQUEST['mulltiServiceDate'] as $key => $value) {
 				$this->Tour_Model->multiserviceBook_add($insert_id,$value,$_REQUEST['mulltiService'][$key],$_REQUEST['mulltiServiceFromTime'][$key],$_REQUEST['mulltiServiceToTime'][$key]);
			}
 		}
 		$contract_policies = $this->Tour_Model->getcancellationpolicies($_REQUEST);
        if (count($contract_policies)!=0) {
            foreach ($contract_policies as  $Cpvalue) {
              $this->Tour_Model->addCancellationBooking($insert_id,$Cpvalue->id,$Cpvalue->from_date,$Cpvalue->to_date,$Cpvalue->cancel_percent,$Cpvalue->from_day,$Cpvalue->to_day,$Cpvalue->description);
            }
        }
	    $contractconditions = $this->Tour_Model->getcontractconditions($contractid);
	    if (count($contractconditions)!=0) {
            foreach ($contractconditions as  $Cpvalue) {
              $this->Tour_Model->addConditionsBooking($insert_id,$Cpvalue->id,$Cpvalue->conditions);
            }
        }
        AgentlogActivity('Tour booked [ID: '.$insert_id.', TourID: '.$max_booking_id.']');
        touremailNotification('Booking','Accept',$this->session->userdata('agent_id'),$insert_id,$_REQUEST['RequestType']);
		$this->session->set_flashdata('message', 'Booked Successfully');
        redirect('../tour');
	}
	public function agent_booking() {
		$this->load->view('frontend/tours/bookingList');
	}
	public function tour_booking_list() {
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
        $booking_list = $this->Tour_Model->tour_booking_list($filter);
        foreach($booking_list->result() as $key => $r) {
        	$arrivaldate =strtotime($r->arrivaldate);
        	$permission = ' <a title="cancel" href="#" class="btn btn-sm btn-danger" onclick="deletetourfun('.$r->bookId.');" data-toggle="modal" data-target="#myModal" class="sb2-2-1-edit delete"><i class="fa fa-remove" aria-hidden="true"></i></a>';
        	$view='<a title="view" class="btn btn-sm btn-success" href="'.base_url().'tour/tour_booking_view/'.$r->bookId.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
        	if (isset($r->invoice_id) && $r->invoice_id!="" && $r->booking_flag==1) {
            	$invoice = '<a class="text-primary" href="'.base_url().'tour/invoice_pdf?id='.$r->bookId.'">'.$r->invoice_id.'</a>';
          	} else {
            	$invoice = '';
          	}
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
	      	$total_markup = $r->agent_markup+$r->admin_markup; 
	      	$total_amount = ($r->total_amount*$total_markup)/100+$r->total_amount;
            $data[] = array(
          		$key+1,
          		$r->booking_id,
          		date('d/m/Y',strtotime($r->Created_Date)),
          		$r->type,
          		$invoice,
          		date('d/m/Y',strtotime($r->arrivaldate)),
          		$r->duration.' '.$r->durationType,
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
	public function tour_booking_view($id) {
        $data['view'] = $this->Tour_Model->tour_booking_details($id);
        $data['cancellation'] = $this->Tour_Model->gettourbookpolicy($id);
        $data['conditions'] = $this->Tour_Model->gettourbookcondition($id);
    	$data['multiservice'] =  $this->Tour_Model->gettourbookmultiservice($id);
		$this->load->view('frontend/tours/tourbookingview',$data);
	}
	// @cancellation modal
	// loads the cancellation modal for tour booking
	public function CancellationBookingModal() {
		$bookId = $_REQUEST['id'];
		$data['view'] = $this->Tour_Model->tour_booking_details($bookId);
		$data['cancelation'] = $this->Tour_Model->gettourbookpolicy($bookId);
		$this->load->view('frontend/tours/cancellationtourbookingmodal',$data);
	}
	// @Booking cancel
	// cancelling the tour booking
	public function CancellationTourBooking() {
		$this->Tour_Model->CancellationTourBookingUpdate($_REQUEST['id']);
		AgentlogActivity('Tour booking cancelled [ID: '.$_REQUEST['id'].']');
		echo json_encode(true);
	}
	// @Tour booking invoice 
	// generating invoice in pdf format for tour bookings
	public function invoice_pdf() {
      	$data = $this->Tour_Model->tour_booking_detail($_REQUEST['id']);
     

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

		//TOUR DETAILS
		$invoice_company_name=$data[0]->type;
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
		// TOUR DETAILS
		$days=$data[0]->duration.' '.$data[0]->durationType;
		$arrivaldate=date('d-m-Y',strtotime($data[0]->arrivaldate));

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
					<td class="tgd rgt_bor">'.$days.'</td>
					<td class="tgd rgt_bor">'.$arrivaldate.'</td>
				</tr>
			</table>
		';

		// $pdf->writeHTML($tb3, true, false, false, false, '');

		//ADULT & CHILD DETAILS 
		$child_no=$data[0]->childs_count;
		$adult_no=$data[0]->adults_count;

		$tb4=
		'
			<style type="text/css">
				.tb4h {font-size:10px; background-color:ghostwhite; padding-top:5px;padding-bottom:5px}
			</style>

			<table class="tb4h">
				<tr>
					<td>Adult(s) : '.$adult_no.'</td>
					<td>Child(s) : '.$child_no.'</td>
				</tr>
			</table>
		';

		// $pdf->writeHTML($tb4,true,false,false,false,'');


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
		$cancelation =  $this->Tour_Model->gettourbookpolicy($_REQUEST['id']);
		$tb51.=
		'
			<table style="border-collapse: collapse;border:1px solid #dddddd" class="tg">
			<thead>
				<tr style="background-color: #0074b9;">
					<td style="color: white">Date of Tour</td>
					<td style="color: white">Tour Name</td>
					<td style="color: white">Rate</td>
				</tr>
			</thead>
			<tbody>
		';
		$tb51 .=
		'
			    <tr>
			          <td>'.$arrivaldate.'</td>
			          <td>'.$invoice_company_name.'</td>
			          <td style="text-align: right">
			          '.currency_type(agent_currency(),$total_amount).' '.agent_currency().'</td>
			    </tr>
		';                  
		$tb51 .=
		'
			</tbody>
			<tfoot>
				<tr>
				    <td colspan="2" style="text-align: right"><strong style="color:#0074b9">Total</strong></td>
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

	   	$conditions = $this->Tour_Model->gettourbookcondition($_REQUEST['id']); 
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
	            strtotime($data[0]->arrivaldate))) < $data[0]->Created_Date) {
	               	$afterDate =  date('d/m/Y',strtotime($data[0]->Created_Date));
	            } else {
	                $afterDate =   date('d/m/Y' , strtotime('-'.($Cancvalue->daysFrom).' days', strtotime($data[0]->arrivaldate)));
	            }
	           	if(date('Y-m-d' , strtotime('-'.($Cancvalue->daysTo).' days', 
				strtotime($data[0]->arrivaldate))) < $data[0]->Created_Date) {
					$beforeDate =  date('d/m/Y',strtotime($data[0]->Created_Date));
				} else {
					$beforeDate = date('d/m/Y' , strtotime('-'.($Cancvalue->daysTo).' days', strtotime($data[0]->arrivaldate)));
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
    public function tourdetails() {
		$contractid = $_REQUEST['contractid'];
		$tourid = $_REQUEST['tourid'];
		$data['view'] = $this->Tour_Model->gettourdetails($contractid,$tourid);
		//$data['contractList'] = $this->Tour_Model->all_details($_REQUEST);
		$data['contract_policies'] = $this->Tour_Model->getcancellationpolicies($_REQUEST);
		$data['contractconditions'] = $this->Tour_Model->getcontractconditions($contractid);
		$data['agent_credit_amount'] = $this->Tour_Model->agent_credit_amount();
		$data['services'] = $this->Tour_Model->multipleServices($tourid);
		$agentMarkup = mark_up_get();
        $adminMarkup = 0;
        $data['totalMarkup'] = $agentMarkup+$adminMarkup;
		$this->load->view('frontend/tours/tourdetails',$data);
	}
	public function all_date_checking() {
		$data = $this->Tour_Model->all_details($_REQUEST);
		echo json_encode($data);
	}
}



