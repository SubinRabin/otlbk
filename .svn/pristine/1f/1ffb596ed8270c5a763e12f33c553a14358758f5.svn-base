<div class="modal-content col-md-4 col-md-offset-4">
  <div class="modal-head">
  	<div class="col-md-12 form-group">
    	<h3>Change Password</h3>
    </div>
    <div class="line2"></div>
  </div>
  <div class="modal-body">
    <div class="col-md-12 form-group">
    	<label>Current Password</label><span class="red cPassword-error">*</span>
    	<input type="Password" name="cPassword" class="form-control">
    </div>
    <div class="col-md-12 form-group">
    	<label>New Password</label><span class="red nPassword-error">*</span>
    	<input type="Password" name="nPassword" class="form-control">
    </div>
    <div class="col-md-12 form-group" style="padding-bottom: 20px;">
    	<button class="btn btn-primary pull-right ChangePasswordSubmit " style="margin-left: 5px;">Change</button>
    	<button class="btn btn-danger pull-right ChangePasswordCancel">Cancel</button>
    	<button class="close" data-dismiss="modal"></button>
    </div>
  </div>
</div>
<script type="text/javascript">
	tpj(document).ready(function() {
		tpj('.ChangePasswordSubmit').click(function() {
			cPassword = tpj('input[name="cPassword"]').val();
			nPassword = tpj('input[name="nPassword"]').val();
			if (cPassword=="" || nPassword=="") {
				if (cPassword=="" && nPassword=="") {
					tpj(".cPassword-error").text(' is required');
					tpj(".nPassword-error").text(' is required');
				} else if(cPassword=="") {
					tpj(".nPassword-error").text('*');
					tpj(".cPassword-error").text(' is required');
				} else if(nPassword=="") {
					tpj(".cPassword-error").text('*');
					tpj(".nPassword-error").text(' is required');
				}
			} else {
				tpj(".cPassword-error").text('*');
				tpj(".nPassword-error").text('*');
				tpj.ajax({
			        dataType: 'json',
			        type: "Post",
			        url: base_url+'/hotels/ChangePasswordSubmit?cPassword='+cPassword+'&nPassword='+nPassword,
			        success: function(data) {
			        	if (data=="success") {
           					window.location = base_url+"backend/logout/agent_logout";
			          		tpj(".close").trigger("click");
			        	} else {
			        		tpj(".cPassword-error").text(' '+data);
			        	}
		          	}
			    });
			}
			
		});
		tpj('.ChangePasswordCancel').click(function() {
			tpj.ajax({
		        dataType: 'json',
		        type: "Post",
		        url: base_url+'/hotels/ChangePasswordCancel',
		        success: function(data) {
	          		tpj(".close").trigger("click");
	          	}
		    });
		});
	});	
</script>
