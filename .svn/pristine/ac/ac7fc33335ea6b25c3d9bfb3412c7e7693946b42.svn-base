<?php init_head(); ?>
<style type="text/css">
  .multi-select-trans .select-wrapper input.select-dropdown, .dropdown-content.select-dropdown.multiple-select-dropdown{
    display: none !important;
  }
  .multi-select-trans .multiselect.dropdown-toggle.btn.btn-default {
    border-color: transparent !important;
    transform: translateY(-8px) !important;
    padding: 0 !important;
    overflow: hidden !important;
  }
  .multi-select-trans .form-control {
    padding: 6px 0 !important;
  }
  .multi-select-trans1 .form-control {
    padding: 0px 0 !important;
  }
  .input-hide input {
    display: none ! important;
  }
  .input-hide li {
    display: none ! important;
  }

  .select-wrapper.multi-select-trans2 {
    border: none !important;
    box-shadow: none !important;
    padding: 6px 0px ! important;
  }
  .multi-select-trans2  .select-dropdown ,.select-wrapper.multi-select-trans2 .caret{
    display: none ! important;
  }

</style>
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <?php if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                        <span>Ranking Edit  </span>
                        <?php } else { ?>
                        <span>Ranking Add  </span>
                        <?php }?>
                        <span class="pull-right"><a href="<?php echo base_url(); ?>backend/hotels/Ranking" class="btn-sm btn-primary">Back</a></span>
                    </div>
                    <div class="tab-inn">
                        <form method="post" action=""  id="RankingForm" enctype="multipart/form-data"> 
                            <input type="hidden" name="id" value="<?php echo isset($edit[0]->id) ? $edit[0]->id : '' ?>">
                            <div class="row">
                            	<div class="col-md-6">
                            		<div class="col-md-6">
                            			<label>Country</label>
                            			<select name="ConSelect" id="ConSelect" onchange ="ConSelectFun();">
				                            <option value="">Select</option>
				                            <?php $count=count($Country);
				                            for ($i=0; $i <$count ; $i++) { ?>
				                              <option <?php echo isset($edit[0]->countryId) && $edit[0]->countryId ==$Country[$i]->id  ? 'selected' : '' ?> value="<?php echo $Country[$i]->id;?>" countrycode="<?php echo $Country[$i]->sortname; ?>"><?php echo $Country[$i]->name; ?></option>
				                            <?php  } ?>
			                            </select>
                            		</div>
                            		<div class="col-md-6 form-group">
                            			<label>City</label>
                            			<input type="hidden" id="hiddenCity" value="<?php echo isset($edit[0]->CityId) ? $edit[0]->CityId : '' ?>">
			                            <div class="multi-select-mod multi-select-trans multi-select-trans1">
			                              <select name="citySelect" id="citySelect" class="form-control input-hide">
			                              <option value="">Select</option>
			                              </select> 
			                            </div>
                            		</div>
                            		<div class="col-md-6">
                            			<label>From Date</label>
                            			<input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker" name="date_picker" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->FromDate) ?  $edit[0]->FromDate : date('Y-m-d') ?>" />
						                <div class="input-group">
						                    <input class="form-control datepicker date-pic" id="alternate1" name="" value="<?php echo isset($edit[0]->FromDate) ?  date('d/m/Y',strtotime($edit[0]->FromDate)) : date('d/m/Y') ?>">
						                    <label for="alternate1" class="input-group-addon"><i class="fa fa-calendar"></i></label>
						                </div>
                            		</div>
                            		<div class="col-md-6">
                            			<label>To Date</label>
                            			<input type="text" class="datePicker-hide datepicker input-group-addon" id="date_picker1" name="date_picker1" placeholder="dd/mm/yyyy" value="<?php echo isset($edit[0]->ToDate) ? $edit[0]->ToDate : date('Y-m-d',strtotime('+1 month')) ?>" />
						                <div class="input-group">
						                    <input class="form-control datepicker date-pic" id="alternate2" name="" value="<?php echo isset($edit[0]->ToDate) ? date('d/m/Y',strtotime($edit[0]->ToDate)) : date('d/m/Y',strtotime('+1 month')) ?>">
						                    <label for="alternate2" class="input-group-addon"><i class="fa fa-calendar"></i></label>
						                </div>
                            		</div>
                            	</div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Hotels</label>
                                            <select name="hotel_select[]"  id="hotel_undo_redo" class="form-control multi-select-trans2"  size="13" multiple="multiple">
                                            </select>
                                                           
                                        </div>
                                        
                                        <div class="col-xs-2">
                                            <button type="button" id="hotel_undo_redo_undo" class="mt-6 no-border btn-sm btn-primary btn-block">Undo</button>
                                            <button type="button"  id="hotel_undo_redo_rightAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-forward"></i></button>
                                            <button type="button" id="hotel_undo_redo_rightSelected"  class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-right"></i></button>
                                            <button type="button" id="hotel_undo_redo_leftSelected" class="no-border btn-sm btn-default btn-block"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" id="hotel_undo_redo_leftAll" class="no-border btn-sm btn-default btn-block"><i class="fa fa-backward"></i></button>
                                            <button type="button" id="hotel_undo_redo_redo" class="no-border btn-sm btn-primary btn-block">Redo</button>
                                        </div>
                                        
                                        <div class="col-xs-5">
                                            <label>Selected Hotels</label>
                                                <input type="hidden" name="hotel_id" value="">
                                            <select name="hotel[]" class="form-control multi-select-trans2"  id="hotel_undo_redo_to"  size="13" multiple="multiple"></select>
                                            <input type="hidden" name="hoteltext" id="hoteltext" value="<?php echo isset($edit[0]->Hotels) ? $edit[0]->Hotels : ''; ?>"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix" style="margin-top: 75px ! important;"></div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
                                            <input type="button" id="RankingUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Update">
                                        <?php } else { ?>
                                            <input type="button" id="RankingUpdate" class="waves-effect waves-light btn-sm btn-success pull-right" value="Submit">
                                        <?php
                                        }
                                        ?>
                                    </div> 
                                </div>
                            </div>
                        </form>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prettify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect1.min.js"></script>
<script type="text/javascript">
    // 
        // make code pretty
       ConSelectFun();
        window.prettyPrint && prettyPrint();
        
        $('#hotel_undo_redo').multiselect({
            submitAllRight : true,
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
             },
            fireSearch: function(value) {
                return value.length = 1;
            },
            afterMoveToLeft: function($left, $right, $options) { 
            },
             afterMoveToRight: function($left, $right, $options) { 
     //         	if ($("#hotel_undo_redo_to option").length > 5) {
     //        		alert('Max 5 hotels');
     //        		$("#hotel_undo_redo_to option").each(function(i,v) {
     //        			if (i > 5) {
					//     	$(this).remove();
     //        			}
					// });
     //        	}
             }


        });

        var nextDay = new Date($("#date_picker1").val());
	    nextDay.setDate(nextDay.getDate() + 1);
	    $("#date_picker").datepicker({
	        altField: "#alternate1",
	        dateFormat: "yy-mm-dd",
	        altFormat: "dd/mm/yy",
	        minDate: new Date(<?php date('d/m/Y') ?>),
	        changeYear : true,
	        changeMonth : true,
	        onSelect: function(dateText) {
	        var nextDay = new Date(dateText);
	          nextDay.setDate(nextDay.getDate() + 1);
	        $("#date_picker1").datepicker('option', 'minDate', nextDay);
	      }
	    });

	    $("#date_picker1").datepicker({
	        altField: "#alternate2",
	        dateFormat: "yy-mm-dd",
	        altFormat: "dd/mm/yy",
	        minDate: new Date(<?php date('d/m/Y', strtotime('+ 1 day')) ?>),
	        changeYear : true,
	        changeMonth : true,
	    });
	    $("#alternate1").click(function() {
	        $( "#date_picker" ).trigger('focus');
	    });
	    $("#alternate2").click(function() {
	        $( "#date_picker1" ).trigger('focus');
	    });


        function ConSelectFun(){
	      var hiddenCity = $("#hiddenCity").val();
	      $('#citySelect option').remove();
	      var ConSelect = $('#ConSelect option:selected').val();
	      $.ajax({
	        url: base_url+'/backend/hotels/StateSelect?Conid='+ConSelect,
	        type: "POST",
	        data:{},
	        dataType: "json",
	        success:function(data) {
	          $('#citySelect').append('<option value="">Select</option>');
	          $.each(data, function(i, v) {
	            if (hiddenCity==v.id) {
	              selected = 'selected';
	            } else {
	              selected = '';
	            } 
	            $('#citySelect').append('<option '+selected+' value="'+ v.id +'">'+ v.name +'</option>');
	          });
      		  citySelect();
	        }
	      });
	    }
	    $("#citySelect").change(function() {
	    	citySelect();
	    })

		function citySelect() {
			$("#hotel_undo_redo option").remove();
			var Citycode = $('#citySelect option:selected').val();
		      $.ajax({
		        url: base_url+'/backend/hotels/HotelsSelect/'+Citycode,
		        type: "POST",
		        data:{},
		        dataType: "json",
		        success:function(data) {
		        	$.each(data, function(i, v) {
		          		$("#hotel_undo_redo").append('<option  value="'+ v.id +'">'+ v.hotel_name +'</option>');
	          		});
		        	var hoteltext = $("#hoteltext").val().split(',');
		        	$.each(hoteltext, function (j, item1) {
			            $("#hotel_undo_redo option[value='"+item1+"']").attr('selected','selected');
			            // $("#"+item1).attr("checked","checked");
			        });
		           	$("#hotel_undo_redo_rightSelected").trigger('click');
		        }
		     });
		}

		$("#RankingUpdate").click(function() {
			var Country = $("#ConSelect").val();
			var citySelect = $("#citySelect").val();
			var hotels = $("#hotel_undo_redo_to option").val();
			if (Country == "") {
				addToast('Must select a country!','orange');
			} else if(citySelect==""){
				addToast('Must select a City!','orange');
			} else if(hotels==undefined){
				addToast('Must select a hotels!','orange');
			} else {
				<?php  if (isset($edit[0]->id) && $edit[0]->id!="") { ?>
					addToast('Updated successfully','green');
				<?php } else { ?>
					addToast('Inserted successfully','green');
				<?php } ?>
				$("#RankingForm").attr('action',base_url+'backend/hotels/rankingUpdate');
				$("#RankingForm").submit();
			}
		});
</script>
<?php init_tail(); ?>