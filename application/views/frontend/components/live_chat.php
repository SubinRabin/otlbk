	
	<div id="live-chat">
		
		<header class="clearfix">
			<a  class="chat-close">&#60;</a>
			<?php $status = get_admin_active_status();
			if($status>0){ ?>
				<h4><span class="circle-success"></span>Support <span id="count"></span></h4>
			<?php } else { ?>
				<h4><span class="circle-warning"></span>Support <span id="count"></span></h4>
			<?php } ?>


			

		</header>

		<div class="chat">
			
			<div class="chat-history" id="chat-history">
				
				<div class="chat-message clearfix" id="chat_support_msg">

					<div class="chat-message-content Welcome-msg">
						<p>Welcome to Otelseasy support, how can we help you today?</p>
					</div> <!-- end chat-message-content -->

				</div> <!-- end chat-message -->

				<hr>

			</div> <!-- end chat-history -->

			<!--<p class="chat-feedback">Your partner is typing…</p>-->

			<div class="form">

				<fieldset>
					
					<input type="text" placeholder="Type your message…"  id="sendmsg" autofocus>
					<input type="hidden" id="pr_chat_id">

				</fieldset>

			</div>

		</div> <!-- end chat -->

	</div>
	<style>
	#live-chat  fieldset {
	border: 0;
	margin: 0;
	padding: 0;
}

#live-chat  h4, #live-chat  h5 {
	line-height: 1.5em;
	margin: 0;
	text-align: left;
}

#live-chat  hr {
	background: #e9e9e9;
    border: 0;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 1px;
    margin: 0;
    min-height: 1px;
}


#live-chat  input {
	border: 0;
	color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}

#live-chat  p { margin: 0; }

#live-chat  .clearfix { *zoom: 1; } /* For IE 6/7 */
#live-chat  .clearfix:before, #live-chat  .clearfix:after {
    content: "";
    display: table;
}
#live-chat  .clearfix:after { clear: both; }

/* ---------- LIVE-CHAT ---------- */

#live-chat {
	bottom: 0;
	font-size: 12px;
	right: 24px;
	position: fixed;
	width: 300px;
	z-index: 99999;
}

#live-chat header {
	background: #293239;
	border-radius: 5px 5px 0 0;
	color: #fff;
	cursor: pointer;
	padding: 16px 24px;
}

#live-chat .circle-success {
	background: #1a8a34;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}
#live-chat .circle-warning {
	background: red;
	border-radius: 50%;
	content: "";
	display: inline-block;
	height: 8px;
	margin: 0 8px 0 0;
	width: 8px;
}

#live-chat h4 {
	font-size: 12px;
}

#live-chat h5 {
	font-size: 11px;
    font-weight: 600;
    color: #006699;
}

#live-chat .form {
	padding: 24px;
}

#live-chat input[type="text"] {
	border: 1px solid #ccc;
	border-radius: 3px;
	padding: 8px;
	outline: none;
	width: 234px;
}

#live-chat .chat-message-counter {
	background: #e62727;
	border: 1px solid #fff;
	border-radius: 50%;
	display: none;
	font-size: 12px;
	font-weight: bold;
	height: 28px;
	left: 0;
	line-height: 28px;
	margin: -15px 0 0 -15px;
	position: absolute;
	text-align: center;
	top: 0;
	width: 28px;
}

#live-chat .chat-close {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
    transform: rotate(-90deg);	
}
#live-chat .chat-close.open {
	background: #1b2126;
	border-radius: 50%;
	color: #fff;
	display: block;
	float: right;
	font-size: 10px;
	height: 16px;
	line-height: 16px;
	margin: 2px 0 0 0;
	text-align: center;
	width: 16px;
    transform: rotate(90deg);	
}

#live-chat .chat {
	background: #fff;
}

#live-chat .chat-history {
	height: 252px;
	padding: 8px 24px;
	overflow-y: scroll;
}

#live-chat .chat-message {
	margin: 16px 0;
}

#live-chat .chat-message img {
	border-radius: 50%;
	float: left;
}

#live-chat .chat-message-content {
	text-align: left;
}
#live-chat .chat-message-content.right {
	text-align: right;
}
#live-chat .chat-message-content.right h5 {
	text-align: right;
}

#live-chat .chat-time {
	font-size: 10px;
	color: #b0b0b0;
    margin-left: 3px;	
}

#live-chat .chat-feedback {
	font-style: italic;	
	margin: 0 0 0 80px;
}
	</style>  
	<script>
	setInterval(function () {
	    pr_chat_id_get();
	}, 3000000);
	/*(function poll(){
    	setTimeout(function(){
      		pr_chat_id_get();
      		poll();
    	}, 300);
	})();*/
	var user_id = '<?= $this->session->userdata('agent_id')?>';
	(function() {
		$('.chat').css('display','none');
		$('#live-chat header').on('click', function() {
		// alert($(".chat").attr('style'));
		$('.chat').slideToggle(300, 'swing');
		$('.chat-message-counter').fadeToggle(300, 'swing');
		$('.chat-close').toggleClass('open');
		$('#chat_support_msg').show();
		load_chat();
		// var element = document.getElementById("chat-history");
  //   	element.scrollTop = element.scrollHeight;
		
	});

}) ();
	$("#sendmsg").keyup(function(e) {
		if (e.keyCode==13) {
			sendmessage();
		}
	});
	function load_chat() {
		var user_id = '<?= $this->session->userdata('agent_id')?>';
		var ch_id = $("#pr_chat_id").val();
		$.ajax({
                url: base_url + "livechat/load_chat/"+user_id+"/"+ch_id,
                type: "get",
                success: function (res) {
                	$('.chat-history').html(res);
                }
        });
        var element = document.getElementById("chat-history");
    	element.scrollTop = element.scrollHeight;
	}
	function sendmessage() {
		var message = $('#sendmsg').val();
		var pr_chat_id = $('#pr_chat_id').val();
		$(".Welcome-msg").remove();
		 $('#sendmsg').val("");
		    $.ajax({
                url: base_url + "livechat/send_message/" + message + "/" + user_id +"/"+pr_chat_id,
                type: "get",
                dataType: 'json',
                success: function(data) {
	        		if (data.success == 1) {
	                    $('.chat-history').append('<div class="chat-message clearfix">    <div class="chat-message-content right"><h5>you<span class="chat-time"></span></h5><p>'+data.message+'</p></div>    </div><hr>');
	        		}
		        			
                }
            });
	}
	function pr_chat_id_get() {
		 $.ajax({
                url: base_url + "livechat/get_pr_chat_id/" + user_id,
                type: "get",
                dataType: 'json',
                success: function(res) {
                	$("#pr_chat_id").val(res.output);
                	$("#count").text("("+res.unread+")");
                	if ($(".chat").attr('style')=='display: block;' || $(".chat").attr('style')=='' || $(".chat").attr('style') == undefined) {
	                	load_chat();
                	}
                	
                }
            });
		
	}
</script>