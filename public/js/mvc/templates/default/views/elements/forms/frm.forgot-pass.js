AW.Forms.ForgotPass = APP.Base.Form.extend
( {
	id: 'ForgotPass' ,
	name: 'ForgotPass' ,
	xtype: 'form' ,
	items:
	[
		{
			id: 'frg_email' , 
			name: 'username' ,
			xtype: 'textfield' ,
			validator: 'required,email'
		},
		{
			xtype: 'button' ,
			id: 'frg_send' , 
			name: 'ForgotPassButton'
		}
	] ,
	handler: 'ForgotPassButton' ,
	exec: 'attachHandler' ,
	success: function(values)
	{
		$("#l_err_msg_div").slideUp();
		$("#l_success_msg_div").slideUp();
		AW.getController( 'ForgotPass' ).sendEmail(values);
		return false;
	}
} );