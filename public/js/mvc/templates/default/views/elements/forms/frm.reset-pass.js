AW.Forms.ResetPass = APP.Base.Form.extend
( {
	id: 'ResetPass' ,
	name: 'ResetPass' ,
	xtype: 'form' ,
	items:
	[
		{
			id: 'reset_pass' , 
			name: 'password' ,
			xtype: 'textfield' ,
			type: 'password',
			validator: 
			[
				{ rule: 'required' } ,
				{ rule: 'max' , max: 20 } ,
				{ rule: 'min' , min: 5 }
			]
		},
		{
			id: 'reset_pass_again' , 
			name: 'password_again' ,
			xtype: 'textfield' ,
			type: 'password',
			validator: 
			[
				{ rule: 'required' } ,
				{ rule: 'equalTo' , equalTo: 'password' }
			]
		},
		{
			xtype: 'button' ,
			id: 'reset_pass_send' , 
			name: 'ResetPassButton'
		}
	] ,
	handler: 'ResetPassButton' ,
	exec: 'attachHandler' ,
	success: function(values)
	{
		$("#l_err_msg_div").slideUp();
		$("#l_success_msg_div").slideUp();
		AW.getController( 'ResetPass' ).request(values);
		return false;
	}
} );