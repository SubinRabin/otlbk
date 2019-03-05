<!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div style="height:95%" class="sb2-1 fixed_sm">
                <!--== USER INFO ==-->
<!--                 <div class="sb2-12">
                    <ul>
                        <li><img src="<?php echo base_url(); ?>assets/images/placeholder.jpg" alt="">
                        </li>
                        <li>
                            <h5><?php echo $this->session->userdata('name');?><span> Santa Ana, CA</span></h5>
                        </li>
                        <li></li>
                    </ul>
                </div> -->
                <!--== LEFT MENU ==-->
                <?php $usersmenu = menuPermissionAvailability($this->session->userdata('id'),'Users',''); ?>
                    <div class="sb2-13 <?php echo count($usersmenu)=="" ? "hide" : '' ?>">

                    <ul class="collapsible" data-collapsible="accordion" style="min-height: 1000px">
                        <li><a href="<?php echo base_url(); ?>backend/dashboard" class="dashboard_menu"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
                        </li>
                         
                           <?php  if (count($usersmenu)!=0 && isset($usersmenu[0]->view) && $usersmenu[0]->view!=0) { ?>
                        <li><a href="<?php echo base_url(); ?>backend/users" class="users_menu"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
                        </li>
                        <?php } ?>
                        <?php $agentmenu = menuPermissionAvailability($this->session->userdata('id'),'Agents','');  
                            if (count($agentmenu)!=0 && isset($agentmenu[0]->view) && $agentmenu[0]->view!=0) { ?>
                        <li><a href="<?php echo base_url(); ?>backend/agents" class="agents_menu"><i class="fa fa-umbrella" aria-hidden="true"></i> Agents</a>
                        </li>
                        <?php } ?>
                        <?php $Profilemenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Profile'); 
                        $contractmenu = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotels Contract');
                        $StopSale = menuPermissionAvailability($this->session->userdata('id'),'Hotels','S/O Sales & Availability'); 
                        $discountOffers = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Discounts & Offers');  
                        $revenueList = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Revenue List'); 
                        $hotelRanking = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotel Ranking'); 
                        $RoomType = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Room Type');
                        $Facilities = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Hotel Facilities'); 
                        $RoomFacility  = menuPermissionAvailability($this->session->userdata('id'),'Hotels','Room Facilities');
                        if ((count($Profilemenu)!=0 && $Profilemenu[0]->view!=0) || (count($contractmenu)!=0 && $contractmenu[0]->view!=0) || (count($StopSale)!=0 && $StopSale[0]->view!=0) || (count($discountOffers)!=0 && $discountOffers[0]->view!=0) || (count($revenueList)!=0 && $revenueList[0]->view!=0) || (count($hotelRanking)!=0 && $hotelRanking[0]->view!=0) || (count($RoomType)!=0 && $RoomType[0]->view!=0) || (count($Facilities)!=0 && $Facilities[0]->view!=0) || (count($RoomFacility)!=0 && $RoomFacility[0]->view!=0)) { ?>
                            <li class="hotels"><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-building" aria-hidden="true"></i></i>Hotels</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>                                    
                                   <?php if (count($Profilemenu)!=0 && isset($Profilemenu[0]->view) && $Profilemenu[0]->view!=0) { ?>
                                         <li><a class="hotels_menu" href="<?php echo base_url(); ?>backend/hotels"> Hotels Profile</a></li>
                                    <?php }                               
                                    if (count($contractmenu)!=0 && isset($contractmenu[0]->view) && $contractmenu[0]->view!=0) { ?>
                                    <li><a class="contract_menu" href="<?php echo base_url(); ?>backend/hotels/contract_menu"> Hotels Contracts</a></li>
                                    <?php } 
                                    if (count($StopSale)!=0 && isset($StopSale[0]->view) && $StopSale[0]->view!=0) { ?>
                                    <li><a class="contract_menu" href="<?php echo base_url(); ?>backend/hotels/hotels_stopSale"></i> S/O Sale & Availability</a></li>
                                    <?php }  
                                    if (count($discountOffers)!=0 && isset($discountOffers[0]->view) && $discountOffers[0]->view!=0) { ?>
                                    <li class="main_review">
                                        <a href="<?php echo base_url(); ?>backend/hotels/Disoffers" class="collapsible-header"> Discounts & Offers</a>
                                    </li>
                                    <?php }  
                                    if (count($revenueList)!=0 && isset($revenueList[0]->view) && $revenueList[0]->view!=0) { ?>
                                    <li>
                                        <a class="users_menu" href="<?php echo base_url(); ?>backend/hotels/Revenue">Revenue List</a>
                                    </li>
                                    <?php }  
                                    if (count($hotelRanking)!=0 && isset($hotelRanking[0]->view) && $hotelRanking[0]->view!=0) { ?>
                                    <li>
                                        <a class="users_menu" href="<?php echo base_url(); ?>backend/hotels/Ranking">Hotel Ranking</a>
                                    </li>
                                    <?php }                             
                                    if (count($RoomType)!=0 && isset($RoomType[0]->view) && $RoomType[0]->view!=0) { ?>
                                    <li>
                                        <a class= "room_type_menu" href="<?php echo base_url(); ?>backend/hotels/room_type">Room Type</a>
                                    </li>
                                    <?php } ?>
                                    <?php 
                                    if (count($Facilities)!=0 && isset($Facilities[0]->view) && $Facilities[0]->view!=0) { ?>
                                    <li>
                                        <a class= "hotel_facilities_menu" href="<?php echo base_url(); ?>backend/hotels/hotel_facilities">Hotel Facilities</a>
                                    </li>
                                    <?php } ?>
                                    <?php 
                                    if (count($RoomFacility)!=0 && isset($RoomFacility[0]->view) && $RoomFacility[0]->view!=0) { ?>
                                    <li><a class= "room_facilities_menu" href="<?php echo base_url(); ?>backend/hotels/room_facilities">Room Facilities/Amenities</a>
                                    </li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </li>
                        <?php }
                        $tourSupplier = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Supplier'); 
                        $tourServices = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Services');  
                        $tourContracts = menuPermissionAvailability($this->session->userdata('id'),'Tour','Tour Contracts');
                        if ((count($tourSupplier)!=0 && $tourSupplier[0]->view!=0) || (count($tourServices)!=0 && $tourServices[0]->view!=0) || (count($tourContracts)!=0 && $tourContracts[0]->view!=0)) { ?>
                            <li class="tour"><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-suitcase" aria-hidden="true"></i>Tour</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>  
                                        <?php  
                                        if (count($tourSupplier)!=0 && isset($tourSupplier[0]->view) && $tourSupplier[0]->view!=0) { ?>                                 
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/tour/supplier_index">Tour Supplier</a>
                                        </li> 
                                        <?php } 
                                        if (count($tourServices)!=0 && isset($tourServices[0]->view) && $tourServices[0]->view!=0) { ?>
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/tour/tour_services">Tour Services</a>
                                        </li>
                                        <?php }   
                                        if (count($tourContracts)!=0 && isset($tourContracts[0]->view) && $tourContracts[0]->view!=0) { ?>
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/tour/tour_contracts">Tour Contracts</a>
                                        <?php } ?>
                                        </li>                                         
                                    </ul>
                                </div>
                            </li>
                        <?php } 
                        $transferSupplier = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Supplier');  
                        $transferVehicle = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Vehicle'); 
                        $transferContracts = menuPermissionAvailability($this->session->userdata('id'),'Transfer','Transfer Contracts');
                        if ((count($transferSupplier)!=0 && $transferSupplier[0]->view!=0) || (count($transferVehicle)!=0 && $transferVehicle[0]->view!=0) || (count($transferContracts)!=0 && $transferContracts[0]->view!=0)) { ?>
                            <li class="tour"><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-arrows-h" aria-hidden="true"></i>Transfer</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>   
                                        <?php 
                                        if (count($transferSupplier)!=0 && isset($transferSupplier[0]->view) && $transferSupplier[0]->view!=0) { ?>                                 
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/transfer/transferSupplier">Transfer Supplier</a>
                                        </li>  
                                        <?php }  
                                        if (count($transferVehicle)!=0 && isset($transferVehicle[0]->view) && $transferVehicle[0]->view!=0) { ?>
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/transfer/transfer_vehicle">Transfer Vehicle</a>
                                        </li>
                                        <?php } 
                                        if (count($transferContracts)!=0 && isset($transferContracts[0]->view) && $transferContracts[0]->view!=0) { ?>
                                        <li><a class= "transfer_menu" href="<?php echo base_url(); ?>backend/transfer/transfer_contracts">Transfer Contracts</a>
                                        </li> 
                                        <?php } ?>                                        
                                    </ul>
                                </div>
                            </li>
                        <?php } 
                        $Booking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Hotel Booking');
                        $tourBooking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Tour Booking'); 
                        $transferBooking = menuPermissionAvailability($this->session->userdata('id'),'Booking','Transfer Booking'); 
                        if ((count($Booking)!=0 && $Booking[0]->view!=0) || (count($tourBooking)!=0 && $tourBooking[0]->view!=0) || (count($transferBooking)!=0 && $transferBooking[0]->view!=0)) { ?>
                            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Booking</a>                  
                                <div class="collapsible-body left-sub-menu">
                                    <ul>
                                        <?php 
                                        if (count($Booking)!=0 && isset($Booking[0]->view) && $Booking[0]->view!=0) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/booking">Hotel booking</a>
                                        </li>
                                        <?php } 
                                        if (count($tourBooking)!=0 && isset($tourBooking[0]->view) && $tourBooking[0]->view!=0) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/booking/TourBooking">Tour booking</a>
                                        </li>
                                        <?php } 
                                        if (count($transferBooking)!=0 && isset($transferBooking[0]->view) && $transferBooking[0]->view!=0) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/booking/TransferBooking">Transfer booking</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                        <?php } 
                        $hotelRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Hotels');
                        $tourRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Tours');
                        $transferRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Transfers'); 
                        $visaRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Visa'); 
                        $packageRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Package'); 
                        $flightRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Flight');
                        $parkRequest = menuPermissionAvailability($this->session->userdata('id'),'Offline Requests','Park'); 
                        if ((count($hotelRequest)!=0 && $hotelRequest[0]->view!=0) || (count($tourRequest)!=0 && $tourRequest[0]->view!=0) || (count($transferRequest)!=0 && $transferRequest[0]->view!=0) || (count($visaRequest)!=0 && $visaRequest[0]->view!=0) || (count($packageRequest)!=0 && $packageRequest[0]->view!=0) || (count($flightRequest)!=0 && $flightRequest[0]->view!=0) || (count($parkRequest)!=0 && $parkRequest[0]->view!=0)) { ?>
                            <li class="transfer"><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-share" aria-hidden="true"></i>Offline Requests</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>  
                                        <?php  
                                        if (count($hotelRequest)!=0 && isset($hotelRequest[0]->view) && $hotelRequest[0]->view!=0) { ?>             
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/booking/Offlinebooking">Hotels</a>
                                        </li> 
                                        <?php }  
                                        if (count($tourRequest)!=0 && isset($tourRequest[0]->view) && $tourRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/tour_requests">Tours</a>
                                        </li> 
                                        <?php } 
                                        if (count($transferRequest)!=0 && isset($transferRequest[0]->view) && $transferRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/transfer_requests">Transfers</a>
                                        </li> 
                                        <?php } 
                                        if (count($visaRequest)!=0 && isset($visaRequest[0]->view) && $visaRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/visa_requests">Visa</a>
                                        </li> 
                                        <?php } 
                                        if (count($packageRequest)!=0 && isset($packageRequest[0]->view) && $packageRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/package_requests">Package</a>
                                        </li>
                                        <?php }  
                                        if (count($flightRequest)!=0 && isset($flightRequest[0]->view) && $flightRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/flight_requests">Flight</a>
                                        </li>  
                                        <?php } 
                                        if (count($parkRequest)!=0 && isset($parkRequest[0]->view) && $parkRequest[0]->view!=0) { ?>
                                        <li><a class= "offlinerequests_menu" href="<?php echo base_url(); ?>backend/offlinerequest/park_requests">Park</a>
                                        </li>  
                                        <?php } ?>                   
                                    </ul>
                                </div>
                            </li>
                        <?php }
                        $onlinePayments = menuPermissionAvailability($this->session->userdata('id'),'Online Payments',''); 
                        if (count($onlinePayments)!=0 && isset($onlinePayments[0]->view) && $onlinePayments[0]->view!=0) { ?>
                        <li><a href="<?php echo base_url();?>backend/common/onlinepaymentrecords" class="collapsible-header"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Online Payments</a></li>
                        <?php }
                        $roomnightReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Total Room Night Report');
                        $bookingReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Booking Report');
                        $patternReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Booking Pattern Report');
                        $nationalityReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Nationality Report');
                        $allotmentReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Allotment utilization Report');
                        $availabilityReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Availability Report');
                        $salesReport =menuPermissionAvailability($this->session->userdata('id'),'Report','Agent Sales Report');
                        if ((count($roomnightReport)!=0 && $roomnightReport[0]->view!=0) || (count($bookingReport)!=0 && $bookingReport[0]->view!=0) || (count($patternReport)!=0 && $patternReport[0]->view!=0) || (count($nationalityReport)!=0 && $nationalityReport[0]->view!=0) || (count($allotmentReport)!=0 && $allotmentReport[0]->view!=0) || (count($availabilityReport)!=0 && $availabilityReport[0]->view!=0) || (count($salesReport)!=0 && $salesReport[0]->view!=0)) { ?> 
                            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-file-text-o" aria-hidden="true"></i> Report</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>
                                        <?php 
                                        if (count($roomnightReport)!=0 && isset($roomnightReport[0]->view) && $roomnightReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/NightReport">Total Room Night Report</a>
                                        </li>
                                        <?php } 
                                        if (count($bookingReport)!=0 && isset($bookingReport[0]->view) && $bookingReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/bookingReport">Booking Report</a>
                                        </li>
                                        <?php } 
                                        if (count($patternReport)!=0 && isset($patternReport[0]->view) && $patternReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/bookingpatternReport">Booking Pattern Report</a>
                                        </li>
                                        <?php } 
                                        if (count($nationalityReport)!=0 && isset($nationalityReport[0]->view) && $nationalityReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/nationalityReport">Nationality Report</a></li>
                                        <?php } 
                                        if (count($allotmentReport)!=0 && isset($allotmentReport[0]->view) && $allotmentReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/allotmentUtilizationReport">Allotment utilization Report</a>
                                        </li>
                                        <?php } 
                                        if (count($availabilityReport)!=0 && isset($availabilityReport[0]->view) && $availabilityReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/availabilityReport">Availability Report</a>
                                        </li>
                                        <?php } 
                                        if (count($salesReport)!=0 && isset($salesReport[0]->view) && $salesReport[0]->view!=0 ) { ?>
                                        <li><a href="<?php echo base_url(); ?>backend/report/AgentSalesReport">Agent Sales Report</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li> 
                        <?php } 
                        $hotelReview = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Hotel');
                        $toursReview = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Tours'); 
                        $transferReview = menuPermissionAvailability($this->session->userdata('id'),'Reviews','Transfer'); 
                        if ((count($hotelReview)!=0 && $hotelReview[0]->view!=0) || (count($toursReview)!=0 && $toursReview[0]->view!=0) || (count($transferReview)!=0 && $transferReview[0]->view!=0)) { ?>             
                            <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i> Reviews</a>
                                <div class="collapsible-body left-sub-menu">
                                    <ul>
                                        <?php  
                                        if (count($hotelReview)!=0 && isset($hotelReview[0]->view) && $hotelReview[0]->view!=0) { ?>
                                        <li><a class="users_menu" href="<?php echo base_url(); ?>backend/reviews">Hotel</a>
                                        </li>
                                        <?php } 
                                        if (count($toursReview)!=0 && isset($toursReview[0]->view) && $toursReview[0]->view!=0) { ?>
                                        <li><a class="users_menu" href="<?php echo base_url(); ?>backend/Tours/ToursReviews">Tours</a>
                                        </li>
                                        <?php } 
                                        if (count($transferReview)!=0 && isset($transferReview[0]->view) && $transferReview[0]->view!=0) { ?>
                                        <li><a class="users_menu" href="<?php echo base_url(); ?>backend/Transfer/TransferReviews">Transfer</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>  
                        <?php }                       
                        $eventsMenu = menuPermissionAvailability($this->session->userdata('id'),'Events',''); 
                        if (count($eventsMenu)!=0 && isset($eventsMenu[0]->view) && $eventsMenu[0]->view!=0) { ?>                      
                        <li><a href="<?php echo base_url();?>backend/events" class="collapsible-header"><i class="fa fa-university" aria-hidden="true"></i> Events</a></li>
                        <?php } ?>
                        <?php 
                        $xmlproviderMenu = menuPermissionAvailability($this->session->userdata('id'),'XML Providers',''); 
                        if (count($xmlproviderMenu)!=0 && isset($xmlproviderMenu[0]->view) && $xmlproviderMenu[0]->view!=0) { ?>
                        <li><a href="<?php echo base_url();?>backend/xmlprovider" class="collapsible-header"><i class="fa fa-exchange" aria-hidden="true"></i>XML Providers</a></li>
                        <?php } ?>
                        <?php 
                        $financeMenu = menuPermissionAvailability($this->session->userdata('id'),'Finance',''); 
                        if (count($financeMenu)!=0 && isset($financeMenu[0]->view) && $financeMenu[0]->view!=0) { ?>
                        <li>
                            <a target="_blank" href="http://otelseasy.bisells.com"><i class="fa fa-money" aria-hidden="true"></i> Finance</a>
                        </li>
                        <?php } ?>
                        <!-- <li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-money" aria-hidden="true"></i> Finance</a>
                            <div class="collapsible-body left-sub-menu">
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/company">Company</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/finance_account">Account Group</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/finance_head">Account Head</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/voucher_type">Voucher Type</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/voucher_entry">Voucher Entry</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/voucher_settings">Voucher Settings</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/financial_transaction">Financial Transaction</a>
                                    </li>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/opening_balance">Opening Balance</a>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/cost_center">Cost Center</a>
                                    <li><a href="<?php echo base_url(); ?>backend/finance/ledger">Ledger</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <?php 
                        $historylogsMenu = menuPermissionAvailability($this->session->userdata('id'),'History Logs',''); 
                        if (count($historylogsMenu)!=0 && isset($historylogsMenu[0]->view) && $historylogsMenu[0]->view!=0) { ?>
                        <li class="main_review"><a href="<?php echo base_url(); ?>backend/dashboard/HistoryLogs" class="collapsible-header"><i class="fa fa-history" aria-hidden="true"></i>History logs</a></li>
                        <?php } ?>
                        <?php 
                        $activitylogsMenu = menuPermissionAvailability($this->session->userdata('id'),'Activity Logs',''); 
                        if (count($activitylogsMenu)!=0 && isset($activitylogsMenu[0]->view) && $activitylogsMenu[0]->view!=0) { ?>
                        <li><a  href="<?php echo base_url(); ?>backend/common/activityLog"><i class="fa fa-gavel" aria-hidden="true"></i> Activity Logs</a></li>
                        <?php } ?>
                        <?php 
                        $errorlogsMenu = menuPermissionAvailability($this->session->userdata('id'),'Error Logs',''); 
                        if (count($errorlogsMenu)!=0 && isset($errorlogsMenu[0]->view) && $errorlogsMenu[0]->view!=0) { ?>
                        <li><a  href="<?php echo base_url(); ?>backend/common/logViewer"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Error Logs</a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata('role')==1) { 
                            $Payment = menuPermissionAvailability($this->session->userdata('id'),'General','Currency');
                            $paymentgateway = menuPermissionAvailability($this->session->userdata('id'),'General','Payment Gateways'); 
                            $databaseBackup = menuPermissionAvailability($this->session->userdata('id'),'General','Database Backup');  
                            $AddIcon = menuPermissionAvailability($this->session->userdata('id'),'General','Add Icons'); 
                            $Mail = menuPermissionAvailability($this->session->userdata('id'),'General','Mail'); 
                            $Settings = menuPermissionAvailability($this->session->userdata('id'),'General','Settings');
                            $customerDetails = menuPermissionAvailability($this->session->userdata('id'),'General','Customer Care Details');  
                            $aboutus = menuPermissionAvailability($this->session->userdata('id'),'General','About Us'); 
                            if ((count($Payment)!=0 && $Payment[0]->view!=0) || (count($paymentgateway)!=0 && $paymentgateway[0]->view!=0) || (count($databaseBackup)!=0 && $databaseBackup[0]->view!=0) || (count($AddIcon)!=0 && $AddIcon[0]->view!=0) || (count($Mail)!=0 && $Mail[0]->view!=0) || (count($Settings)!=0 && $Settings[0]->view!=0) || (count($customerDetails)!=0 && $customerDetails[0]->view!=0) || (count($aboutus)!=0 && $aboutus[0]->view!=0) || (CategoryCheck($this->session->userdata('id'))==1)) { ?>
                                <li class="main_general"><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cogs" aria-hidden="true"></i> General </a>
                                    <div class="collapsible-body left-sub-menu">
                                        <ul>
                                            <?php    
                                            if (count($Payment)!=0 && isset($Payment[0]->view) && $Payment[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/payment">Currency</a></li>
                                            <?php } 
                                            if (count($paymentgateway)!=0 && isset($paymentgateway[0]->view) && $paymentgateway[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/paymentgateway">Payment Gateways</a></li>
                                            <?php } 
                                            if (count($databaseBackup)!=0 && isset($databaseBackup[0]->view) && $databaseBackup[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/databaseBackup">Database Backup</a></li>
                                            <?php }  
                                            if (count($AddIcon)!=0 && isset($AddIcon[0]->view) && $AddIcon[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/icons">Add Icons</a>
                                            </li>
                                            <?php } 
                                            if (count($Mail)!=0 && isset($Mail[0]->view) && $Mail[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/mail">Mail</a>
                                            </li>
                                            <?php } 
                                            if (CategoryCheck($this->session->userdata('id'))==1) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/menu_permission">Menu Permission</a>
                                            </li>
                                            <?php }   
                                            if (count($Settings)!=0 && isset($Settings[0]->view) && $Settings[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/login/general_settings">Settings</a>
                                            </li>
                                            <?php } 
                                            if (count($customerDetails)!=0 && isset($customerDetails[0]->view) && $customerDetails[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/customer_care">Customer Care Details</a>
                                            </li>
                                            <?php }  
                                            if (count($aboutus)!=0 && isset($aboutus[0]->view) && $aboutus[0]->view!=0) { ?>
                                            <li><a  href="<?php echo base_url(); ?>backend/common/about">About Us</a>
                                            </li>
                                            <?php } ?>
                                        </ul>

                                    </div>
                                </li>
                            <?php } 
                        } ?>
                    </ul>
                </div>
            </div>
