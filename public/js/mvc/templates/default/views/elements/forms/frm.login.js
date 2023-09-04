AW.Forms.Login = APP.Base.Form.extend
( {
	id: 'Login' ,
	name: 'Login' ,
	xtype: 'form' ,
	items:
	[
		{
			id: 'l_username' , 
			name: 'username' ,
			xtype: 'textfield' ,
			validator: 'required'
		},
		{
			id: 'l_pass' , 
			name: 'password' ,
			xtype: 'textfield' ,
			type: 'password' ,
			validator: 'required'
		},
		{
			xtype: 'checkbox' ,
			id: 'remember_me' , 
			name: 'remember_me'
		},
		{
			xtype: 'button' ,
			id: 'l_send' , 
			name: 'LoginButton'
		}
	] ,
	handler: 'LoginButton' ,
	exec: 'attachHandler' ,
	success: function(values)
	{
		$("#l_err_msg_div").slideUp();
		AW.getController( 'Login' ).login(values);
		return false;
	}
} );