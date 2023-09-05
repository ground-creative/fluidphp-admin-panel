AW.Controllers.ForgotPass = APP.Base.Controller.extend
( {
	id: 'ForgotPass',
	name: 'ForgotPass',
	run: function( )
	{

	},
	sendEmail: function(values)
	{
		$("#loading-overlay").show();
		AW.Api.post("forgot-password/", values, function(response)
		{
			let json = JSON.parse(response);
			AW.log(json);
			if (json.success)
			{
				//window.location.href = AW.routes['home'];
				$("#l_success_msg_div").slideDown("slow");
				$("#frg_send").prop('disabled', true);
			}
			else
			{
				switch(json.code)
				{
					case 102: 
						var msg = "<strong>Error!</strong> Email address not found in the database";
					break;
					default: 
						var msg = json.message;
				}
				$("#l_err_msg").html(msg);
				$("#l_err_msg_div").slideDown("slow");
				AW.log(msg);
			}
			$("#loading-overlay").hide();
		});
	}
});