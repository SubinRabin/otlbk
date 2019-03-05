$('document').ready(function() { 
	/* Handling login functionality */
	function currency_type() {		
		var data = $("#currency-form").serialize();				
		$.ajax({				
			type : 'POST',
            url: base_url+'convert.php',
			dataType:'json',
			data : data,
			beforeSend: function(){	
				$("#convert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; converting ...');
			},
			success : function(response){
				if(response.error == 1){	
					$("#converted_rate").html('<span class="form-group has-error">Error: Please select different currency</span>'); 
					$("#converted_amount").html("");
				} else if(response.rate){									
					$("#converted_amount").html("<strong>Converted Amount ("+response.to_Currency+"</strong>) : "+response.converted_amount);
					$("#converted_amount").show();
					$("#convert").html('Convert');
				} else {	
					$("#converted_rate").html("No Result");	
					$("#converted_rate").show();	
					$("#converted_amount").html("");
				}
			}
		});
		return false;
	}   
});