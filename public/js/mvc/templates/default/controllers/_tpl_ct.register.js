AW.Controllers.Register = APP.Base.Controller.extend
({
	id: 'Register',
	name: 'Register',
	run: function(){},
	register: function(values)
	{
		var params = 
		{
			"firstname": values.firstname,
			"lastname": values.lastname,
			"username": values.email,
			"email": values.email,
			"password": values.password,
			"lang": AW.Config.lang,
			"birthdate": "1980-01-01"
		};
		$("#loading-overlay").show();
		AW.Api.post("register/", params, function(response)
		{
			let json = JSON.parse(response);
			//AW.log(json);
			if (json.success)
			{
				window.location.href = AW.routes['check-email'];
			}
			else
			{
				switch(json.code)
				{
					case 100: 
						var msg = "<strong>Error!</strong> This email already exists";
					break;
					default: 
						var msg = json.message;
				}
				$("#l_err_msg").html(msg);
				$("#l_err_msg_div").slideDown("slow");
				AW.log(msg);
			}
			$("#loading-overlay").hide();
			
		} );
	}
});