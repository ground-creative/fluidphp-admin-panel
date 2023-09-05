AW.Controllers.Login = APP.Base.Controller.extend
( {
	id: 'Login',
	name: 'Login',
	run: function( )
	{

	},
	login: function(values)
	{
		$("#loading-overlay").show();
		AW.Api.post("login/", values, function(response)
		{
			//AW.log(typeof response);
			let json = JSON.parse(response);
			AW.log(json);
			if (json.success)
			{
				window.location.href = AW.routes['home'];
			}
			else
			{
				switch(json.code)
				{
					case 801: 
						var msg = "<strong>Error!</strong> Invalid username or password";
					break;
					default: 
						var msg = "<strong>Error!</strong> " + json.message;
				}
				$("#l_err_msg").html(msg);
				$("#l_err_msg_div").slideDown("slow");
				AW.log( msg);
			}
			$("#loading-overlay").hide();
		});
	}
});