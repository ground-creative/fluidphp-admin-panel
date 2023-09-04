AW.Forms.Register = APP.Base.Form.extend
( {
	id: 'Register' ,
	name: 'Register' ,
	xtype: 'form' ,
	items:
	[
		{
			xtype: 'textfield' ,
			type: 'email',
			id: 'reg_email' , 
			name: 'email' ,
			validator: 'required,email'
		} ,
		{
			id: 'reg_pass' , 
			name: 'password' ,
			xtype: 'textfield' ,
			type: 'password' ,
			validator: 
			[
				{ rule: 'required' } ,
				{ rule: 'max' , max: 20 } ,
				{ rule: 'min' , min: 6 }
			]
		} ,
		{
			xtype: 'checkbox' ,
			id: 'terms_conditions' , 
			name: 'terms_conditions',
			validator: 'required'
		},
		{
			xtype: 'button' ,
			id: 'reg_send' , 
			name: 'registerButton'
		}
	] ,
	handler: 'registerButton' ,
	exec: 'attachHandler' ,
	success: function( values )
	{
		$("#l_err_msg_div").slideUp();
		AW.getController( 'Register' ).register( values );
		return false;
	}
} );