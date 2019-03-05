<?php init_front_head_dashboard(); ?> 
<script src="<?php echo base_url(); ?>skin/js/profile.js"></script>
	<div class="col-md-12 apagecontainer2 offset-0">
		<div class="col-xs-11 offset-0 prof-top">
			<ul class="nav nav-tabs myTab2pos">
			    <li class="active">
					<a href="#profile1" data-toggle="tab">
					<span class="profile-icon"></span>
					     Your profile
				</a></li>
			  	<li>
				<a href="#password" data-toggle="tab" onclick="mySelectUpdate()">
			    <span class="password-icon"></span>							  
				  Change password
				</a></li>
			<span class="update_msg"><?php if (isset($_REQUEST['msg'])) { ?>
				<script type="text/javascript">
                AddToast('success','Updated Successfully','!');
                </script>
			<?php } ?></span>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-11 offset-0 full-prof">
			<div class="tab-content5">
				<div class="tab-pane padding40 active" id="profile1">
					<span class="size16 bold fontstyl">Personal details</span>
					<div class="line2"></div>
                    <form name="profile_form"  id="profile_form" action="<?php echo base_url('profile/profile_update'); ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-12 offset-0 per-details">
						<div class="row">
							<div class="col-md-12 ">
							<div class="row">
								<div class="col-md-4 pull-left">
									<label>Profile Picture:</label> <br>
									<div class="pro-bg">
	                                        <span class="list-img">
											    <?php if ($view[0]->profile_image!="") { ?>
												<img id="load_image" class="img_size_custom" src="<?php echo base_url();?>uploads/agent_profile_pic/<?php echo $view[0]->id;?>/thumb_<?php echo $view[0]->profile_image;?>" alt="">
												<?php } else { ?>
												<img id="load_image" class="img_size_custom" src="<?php echo base_url() ?>assets/images/user/1.png" alt="">
												<?php } ?>
											</span>
											<br>
	                                        <input type="file" id="profile_image" name="profile_image" onchange="return ValidateFileUpload();" value="Change Profile Picture">
	                                    </div>
								</div>
								<div class="col-md-4 pull-left">
									<label>Agent Logo:</label> <br>
									<div class="btn">
	                                        <span class="list-img">
											    <?php if ($view[0]->logo!="") { ?>
												<img id="load_image" class="img_size_custom" src="<?php echo base_url();?>uploads/agent_logo/<?php echo $view[0]->id;?>/<?php echo $view[0]->logo;?>" alt="">
												<?php } else { ?>
												<img id="load_image" class="img_size_custom" src="<?php echo base_url() ?>assets/images/user/1.png" alt="">
												<?php } ?>
											</span>
											<br>
	                                        <input type="file" id="logo" name="logo" onchange="return AgentLogoUpload();" value="Change Profile Picture">
	                                    </div>
	                                    <br><br>
								</div>
								<div class="col-md-4 form-group">
									<label for="first_name">First Name*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control"  rel="popover" id="name" data-content="This field is mandatory" data-original-title="Here you can edit your name" name="first_name" value="<?php echo $view[0]->First_Name ?>">
									<i class="name_error err_hide"></i>
							    </div>
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="last_name">Last Name*:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Last_Name ?>" rel="popover" id="lastname" data-content="This field is mandatory" data-original-title="Here you can edit your username" name="last_name">
									<i class="lastname_error err_hide"></i>
							    </div>
							    <div class="col-md-4 form-group"">
							    	<p>
									<label for="gender">Gender:</label>
									
									<label>
										<input type="radio" name="sex" id="optionsRadios1" value="2" <?php echo $view[0]->Sex == 2 ? 'checked' : '' ?>>
										Female 
									</label>
									  <label>
										<input type="radio" name="sex" id="optionsRadios2" value="1" <?php echo $view[0]->Sex == 1 ? 'checked' : '' ?>>
										Male 
									  </label>
									</p>
								</div>
								<div class="col-md-4 form-group">
									<label for="email">E-mail*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Email ?> " readonly id="email" data-content="This field is mandatory" data-original-title="Edit your email address" name="email">
							    </div>
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="mobile">Mobile:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Mobile ?>" id="phone" name="phone">
							        <i class="phone_error err_hide"></i>
								</div>
								<div class="col-md-4 form-group">
									<label for="phone_num">Phone Number*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Phone_Num ?>" id="phone_num" name="phone_num">
							        <i class="phone_num_error err_hide"></i>
							    </div>
								<div class="col-md-4 form-group">
									<label for="country">Country*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Country ?>" name="country" id="country">
							        <i class="country_error err_hide"></i>
								</div>
								<div class="col-md-4 form-group">
									<label for="city">City*:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->City ?>" name="city" id="city">
							        <i class="city_error err_hide"></i>
							    </div>
								
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="state">State*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" id="state"  name="state" value="<?php echo $view[0]->State ?>">
						            <i class="state_error err_hide"></i>
							    </div>
								<div class="col-md-4 form-group">
									<label for="date_of_birth">Date Of Birth:</label> 
									<!-- <br> <br> -->
									<input type="date" class="form-control" value="<?php echo $view[0]->Date_Of_Birth ?>" name="date">
								</div>
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="designation">Designation*:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Designation ?>" id="designation" name="designation">
						            <i class="designation_error err_hide"></i>
							    </div>
								<div class="col-md-4 form-group">
									<label for="pin_code">Pin Code*:</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" id="pin_code" name="pin_code" value="<?php echo $view[0]->Pincode ?>">
						            <i class="pin_code_error err_hide"></i>
							    </div>
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="fax">Fax :</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Fax ?>" id="fax" name="fax">
							    </div>
								<div class="col-md-4 form-group">
									<label for="web_site">Web Site :</label> 
									<!-- <br> <br> -->
									<input type="text" class="form-control" id="web_site" name="web_site" value="<?php echo $view[0]->Website ?>">
							    </div>
									<!-- <br/> -->
								<div class="col-md-4 form-group">
									<label for="nature_business">Nature Of Business*:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Nature_Business ?>" id="nature_business" name="nature_business">
						            <i class="nature_business_error err_hide"></i>
							    </div>
								<div class="col-md-4 form-group">
									<label for="business_type">Business type*:</label>
									<!-- <br> <br> -->
									<input type="text" class="form-control" value="<?php echo $view[0]->Business_Type?>" rel="popover" id="business_type" name="business_type">
						            <i class="business_type_error err_hide"></i>
							    </div>
								<div class="col-md-4 form-group">
									<div class=form-horizondal>
				            		<div class="form-group">
				                     <label for="preferred_currency" class="control-label" style="">Preferred Currency<span>*</span></label>
				                        <select name="preferred_currency"  id="preferred_currency" class="form-control">
                                        <?php foreach ($currency_list as $key => $value) { 
                                            if($view[0]->Preferred_Currency==$value->currency_type) {?>
                                            <option selected="" value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php } else { ?>
                                            <option  value="<?php echo $value->currency_type ?>"><?php echo $value->currency_name. ' ('.($value->currency_type).')' ?></option>
                                        <?php  } } ?>
                        
                                    	</select>
				                        <span class="preferred_currency_err popup_err blink_me"></span>
				        		    </div>
        				            </div>
							    </div>
								<!-- <div class="col-md-4 form-group">
									<label for="markup">Markup*:</label>
									<input type="text" class="form-control" value="<?php echo $view[0]->Markup ?>" id="markup" name="markup">
						            <i class="markup_error err_hide"></i>
							    </div> -->
							    <div class="col-md-4 form-group">
									<label for="address">Address*:</label>
									<!-- <br> <br> -->
									<textarea  class="form-control" name="address" id="address"><?php echo $view[0]->Address ?></textarea>
						            <i class="address_error err_hide"></i>
								</div>
								<div class="col-md-4">
                                        <label for="tradefile">Trade license  : </label><?php  if ( isset($view[0]->tradefile)) { ?>
                                           <span><a class="pull-right" href="<?php echo base_url(); ?>uploads/trade_license/<?php echo $view[0]->id ?>/<?php echo $view[0]->tradefile ?>"><?php echo isset($view[0]->tradefile) ? $view[0]->tradefile : '' ?></a></span>
                                       <?php } ?>
                                        <input type="file" id="tradefile" name="tradefile" class="form-control" onchange="return TradeFileUpload();">
                                </div>
                                <div class="col-md-8">
								<div class="col-md-6 form-group">
									<label for="iata_status" class=" control-label" >IATA Status </label>
	                            	<p>
	                            	<?php  if (isset($view[0]->Iata_Status) && $view[0]->Iata_Status=="Approved") { ?> 
	                                   <input name="iata_status" type="radio" id="test1" checked value="Approved" onclick="iata_check('1')"/>
	                                    <label for="test1" class="control-label">Approved</label>
	                                    <input name="iata_status" type="radio" id="test2"   value="Not Approved" onclick="iata_check('2')" />
	                                    <label for="test2" class="control-label">Not Approved</label>
	                                    <?php }else { ?>
	                                    <input name="iata_status" type="radio" id="test1"  value="Approved" onclick="iata_check('1')"/>
	                                    <label for="test1" class="control-label">Approved</label>
	                                    <input name="iata_status" type="radio" id="test2" checked  value="Not Approved" onclick="iata_check('2')" />
	                                    <label for="test2" class="control-label">Not Approved</label>
	                                    <?php } ?>
                            		</p>
                                </div>
                            <?php  if (isset($view[0]->Iata_Status) && $view[0]->Iata_Status=="Approved") { ?> 
                             <div class="col-md-6 form-group iata_number">
				        		<div class=form-horizondal>
				            		<div class="form-group">
				                        <label for="iata_reg" class="control-label" style="">IATA Reg Number</label>
				                          <input type="text" class="form-control" value="<?php echo $view[0]->Iata_Reg_Number ?>" id="iata_reg" name="iata_reg">
				                  <span class="iata_reg_error popup_err blink_me"></span>
				            		</div>
				                </div>
				        	</div>
				        	<?php } else{ ?>
                            <div class="col-sm-6 iata_number hide">
				        		<div class=form-horizondal>
				            		<div class="form-group">
				                        <label for="iata_reg" class="control-label" style="">IATA Reg Number</label>
				                          <input type="text" class="form-control" value="<?php echo $view[0]->Iata_Reg_Number ?>" id="iata_reg" name="iata_reg">
				                  <span class="iata_reg_error popup_err blink_me"></span>
				            		</div>
				                </div>
				        	</div>
				        	<?php } ?>
				        	</div>
									<!-- <br/> -->
									<div class="clearfix"></div>
								<span class="size16 bold fontstyl">Contact Details</span>
				                <div class="line2"></div><br>
								<div class="row">
									<div class="col-md-4">
										<label for="account_name">Account Name*:</label> 
										<!-- <br> <br> -->
										<input type="text" class="form-control"  rel="popover" id="First_Name_Accounts" data-content="This field is mandatory" data-original-title="Here you can edit your name" name="First_Name_Accounts" value="<?php echo $view[0]->First_Name_Accounts ?>">
										<i class="First_Name_Accounts_error err_hide"></i>
								    </div>
										<!-- <br/> -->
									<div class="col-md-4">
										<label for="reservation_name">Reservation Name*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->First_Name_Reservation ?>" rel="popover" id="First_Name_Reservation" data-content="This field is mandatory" data-original-title="Here you can edit your Reservation Name" name="First_Name_Reservation">
										<i class="First_Name_Reservation_error err_hide"></i>
								    </div>
								    <div class="col-md-4">
										<label for="management_name">Management Name*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->First_Name_Management ?>" rel="popover" id="First_Name_Management" data-content="This field is mandatory" data-original-title="Here you can edit your Management Name" name="First_Name_Management">
										<i class="First_Name_Management_error err_hide"></i>
								    </div>
							    </div><br>
								<div class="row">
									<div class="col-md-4">
										<label for="account_mail">Account Mail*:</label> 
										<!-- <br> <br> -->
										<input type="text" class="form-control"  rel="popover" id="Email_Accounts" data-content="This field is mandatory" data-original-title="Here you can edit your name" name="Email_Accounts" value="<?php echo $view[0]->Email_Accounts ?>">
										<i class="Email_Accounts_error err_hide"></i>
								    </div>
										<!-- <br/> -->
									<div class="col-md-4">
										<label for="reservation_mail">Reservation Mail*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->Email_Reservation ?>" rel="popover" id="Email_Reservation" data-content="This field is mandatory" data-original-title="Here you can edit your Reservation Mail" name="Email_Reservation">
										<i class="Email_Reservation_error err_hide"></i>
								    </div>
								    <div class="col-md-4">
										<label for="managment_mail">Management Mail*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->Email_Management ?>" rel="popover" id="Email_Management" data-content="This field is mandatory" data-original-title="Here you can edit your Management Mail" name="Email_Management">
										<i class="Email_Management_error err_hide"></i>
								    </div>
								</div><br>
								<div class="row">
									<div class="col-md-4">
										<label for="account_phone">Account Phone Number*:</label> 
										<!-- <br> <br> -->
										<input type="text" class="form-control"  rel="popover" id="Number_Accounts" data-content="This field is mandatory" data-original-title="Here you can edit your Account Phone Number" name="Number_Accounts" value="<?php echo $view[0]->Number_Accounts ?>">
										<i class="Number_Accounts_error err_hide"></i>
								    </div>
										<!-- <br/> -->
									<div class="col-md-4">
										<label for="reservation">Reservation Phone Number*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->Number_Reservation ?>" rel="popover" id="Number_Reservation" data-content="This field is mandatory" data-original-title="Here you can edit your Reservation Phone Number" name="Number_Reservation">
										<i class="Number_Reservation_error err_hide"></i>
								    </div>
								    <div class="col-md-4">
										<label for="management_phone">Management Phone Number*:</label>
										<!-- <br> <br> -->
										<input type="text" class="form-control" value="<?php echo $view[0]->Number_Management ?>" rel="popover" id="Number_Management" data-content="This field is mandatory" data-original-title="Here you can edit your Management Phone Number" name="Number_Management">
										<i class="Number_Management_error err_hide"></i>
								    </div>
	                            </div><br>
								<div class="row">
	                             <div class="col-md-4">
	                                <label for="password_accounts">Account Password</label>
	                                <div class="input-group">
		                                <input id="password_accounts" name="password_accounts" type="password"  class="form-control pwd" value="<?php echo isset($view[0]->accounts_password) ? $view[0]->accounts_password : '' ?>">
		                                <span class="input-group-btn">
								            <button class="btn btn-default reveal" type="button"> <i class="fa fa-eye form-control-feedback" onclick="myFunction_accounts()"></i></button>
								          </span>
	                                 </div>
	                            </div>
	                            <div class="col-md-4">
	                                <label for="password_reservation">Reservation Password</label>
	                                <div class="input-group">
	                                <input id="password_reservation" name="password_reservation" type="password"   class="form-control" value="<?php echo isset($view[0]->reservation_password) ? $view[0]->reservation_password : '' ?>"> <span class="input-group-btn">
								            <button class="btn btn-default reveal" type="button"> <i class="fa fa-eye form-control-feedback" onclick="myFunction_reservation()"></i></button>
								          </span>
	                                 </div>
	                            </div>
	                            <div class="col-md-4">
	                                <label for="password_management">Management Password</label>
	                                <div class="input-group">
	                                <input id="password_management" name="password_management" type="password"   class="form-control" value="<?php echo isset($view[0]->management_password) ? $view[0]->management_password : '' ?>"> <span class="input-group-btn">
								            <button class="btn btn-default reveal" type="button"> <i class="fa fa-eye form-control-feedback" onclick="myFunction_management()"></i></button>
								          </span>
	                                </div>
	                            </div>
								</div>
							</div>
								<br>
							<div class="row">
								<div class="col-md-6 form-group">
									<button type="button" class="bluebtn margtop20" name="profile_update" id="profile_update">Update</button>
							    </div>
							</div>
									
						    </div>
					    </div>
					</div>
					</form>
				</div>
				<div class="tab-pane" id="password">
					<div class="padding40">
						<form name="change_password_form"  id="change_password_form" action="<?php echo base_url('profile/password_update'); ?>" method="post">
							
							<span class="dark size18">Change password</span>
							<div class="line4"></div>
							<span class="password_error err_hide"></span></br>
							E-mail<br/>
							<input type="text" class="form-control " value="<?php echo $view[0]->Email ?> " readonly>
							<br/>
							Old Password<br/>
							<input type="password" class="form-control " name="old_password" id="old_password">
							<br/>
							New Password<br/>
							<input type="password" class="form-control " name="new_password" id="new_password">
							<br/>
							<button type="button" class="bluebtn margtop20 btn-search5" id="change_password_button">Save changes</button>
							<br/>
							<br/>
							<br/>
						</form>
					</div>
			    </div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div><br/><br/>
	</div>
	<!-- END OF CONTENT -->
<?php init_front_head_footer(); ?> 

	
