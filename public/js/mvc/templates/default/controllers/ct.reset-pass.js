AW.Controllers.ResetPass = APP.Base.Controller.extend
( {
	id: 'ResetPass',
	name: 'ResetPass',
	run: function( )
	{

	},
	request: function(values)
	{
		$("#loading-overlay").show();
		AW.Api.post("change-password/" + AW.user_code + "/", values, function(response)
		{
			let json = JSON.parse(response);
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
					case 107: 
						var msg = "<strong>Error!</strong> code expired or invalid";
					break;
					default: 
						var msg = json.message;
				}
				$("#l_err_msg").html(msg);
				$("#l_err_msg_div").slideDown("slow");
			}
			$("#loading-overlay").hide();
		});
	}
});