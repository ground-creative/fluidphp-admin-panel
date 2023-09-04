var AW = APP.extend
({
	id: 'AW',
	name: 'AW',
	env: '/aw.v1',
	test_env: 1,
	Api: 
	{
		prefix: null,
		url: null,
		get: function(uri, params, successCallback, errorCallback, timeout) 
		{
			var method = 'GET';
			this._call(uri, method, params, successCallback, errorCallback, timeout);
		},
		post: function(uri, params, successCallback, errorCallback, timeout) 
		{
			var method = 'POST';
			this._call(uri, method, params, successCallback, errorCallback, timeout);
		},
		put: function(uri, params, successCallback, errorCallback, timeout) 
		{
			var method = 'PUT';
			this._call(uri, method, params, successCallback, errorCallback, timeout);
		},
		del: function(uri, params, successCallback, errorCallback, timeout) 
		{
			var method = 'DELETE';
			this._call(uri, method, params, successCallback, errorCallback, timeout);
		},
		error: function(loaderID, action) 
		{
			action = (action === undefined || action === null) ? 'visibility' : action;
			if ('hide' === action) 
			{
				$('#' + loaderID).hide();
			} 
			else 
			{
				AW.controlSpinner(loaderID, 'hide');
			}
			var response = { result: { code: 999 } };
			this.responseErrMsg(response);
		},
		_call: function(uri, method, params, successCallback, errorCallback, timeout) 
		{
			method = (method === undefined || method === null) ? 'POST' : method;
			params = (params === undefined || params === null) ? {} : params;
			if ('/' !== uri.substring(0, 1)) 
			{
				uri = '/' + uri;
			}
			if ('/' !== uri.slice(-1)) 
			{
				uri = uri + '/';
			}
			if (typeof(timeout) === 'undefined') 
			{
				timeout = 60000;
			}
			if (typeof(errorCallback) === 'undefined') 
			{
				errorCallback = function(xhr, errorType, error) 
				{
					var response = { result: { code: 999 } };
					AW.Api.responseErrMsg(response);
				}
			}
			params.site_uri = location.pathname.substring(1);
			$.ajax
			({
				url: ((null !== uri.match('http')) ? uri.slice(1) : this.prefix + uri),
				method: method,
				data: params,
				timeout: timeout,
				success: function(response) 
				{
					successCallback(response);
				},
				error: function(xhr, errorType, error) 
				{
					errorCallback(xhr, errorType, error);
				}
			});
		},
		responseErrMsg: function(response,timeout) 
		{
			$("#loading-overlay").hide();
			AW.log('api call error');
			AW.log(response);
		},/*,
		responseErrMsg: function(response,timeout) 
		{
			if (typeof(timeout) === 'undefined') 
			{
				timeout = 3000;
			}
			switch (response.result.code) 
			{
				case 106:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.ucfirst(AW.Config.icon_warning_msg + AW.Lang.user_not_found) + '</div>';
				break;
				case 515:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.ucfirst(AW.Config.icon_warning_msg + AW.Lang.newsletter_registered_err) + '</div>';
				break;
				case 811:
					var str = response.result.message;
					var limit_date = str.substring(str.indexOf('{') + 1, str.indexOf('}'));
					var text = AW.ucfirst(AW.Lang.service_closed.replace('_LIMIT_DATE_', limit_date));
					var msg = '<div class="alert alert-danger" role="alert">' + AW.Config.icon_danger_msg + text + '</div>';
				break;
				case 812:
					var msg = '<div class="alert alert-info" role="alert">' + AW.Config.icon_warning_msg + AW.ucfirst(AW.Lang.guestlist_already_registered) + '</div>';
				break;
				case 916:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.ucfirst(AW.Config.icon_warning_msg + AW.Lang.not_enough_points) + '</div>';
				break;
				case 104:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.ucfirst(AW.Config.icon_warning_msg + AW.Lang.already_verified) + '</div>';
				break;
				case 819:	// max sale purchase
					var msg = '<div class="alert alert-info" role="alert">' + AW.ucfirst( AW.Config.icon_warning_msg + AW.Lang.maximum_amount_msg ) + '</div>';
				break;
				case 999:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.ucfirst(AW.Config.icon_warning_msg + AW.Lang.network_error) + '</div>';
				break;
				case 804:
					if ( AW.User.has_autologin_cookie )
					{
						AW.renewLoginToken( AW.Api.current_uri , AW.Api.current_method, AW.Api.current_params, 
									AW.Api.current_successCallback, AW.Api.current_errorCallback, timeout );
					}
					else
					{
						AW.showSessionExpiredPopup( );
					}
					return false;
				break;
				default:
					var msg = '<div class="alert alert-danger" role="alert">' + AW.Config.icon_danger_msg + AW.ucfirst(AW.Lang.general_error) + '</div>';
			}
			AW.openAlertModal(msg, timeout);
		}*/
	}/*,
	openAlertModal: function(msg, timeout) 
	{
		if (typeof(timeout) === 'undefined') 
		{
			timeout = 3000;
		}
		$('#alertsModalBody').html(msg);
		$('#alertsModal').modal('show');
		if (timeout > 0) 
		{
			setTimeout(function() 
			{
				$('#alertsModal').modal('hide');
			}, timeout);
		}
	},
	ucfirst: function(string) 
	{
		if (null === string || string.length < 1) 
		{
			return sting;
		}
		return string.charAt(0).toUpperCase() + string.slice(1);
	},
	controlSpinner: function(loaderID, action) 
	{
		action = (action === undefined || action === null) ? 'show' : action;
		if ('show' === action) 
		{
			$('#' + loaderID).removeClass("fa-angle-double-right").addClass("fa-spinner fa-spin");
		} 
		else 
		{
			$('#' + loaderID).removeClass("fa-spinner fa-spin").addClass("fa-angle-double-right");
		}
	},
	mergeObjects: function(obj, src) 
	{
		for (var key in src) 
		{
			if (src.hasOwnProperty(key)) 
			{
				obj[key] = src[key];
			}
		}
		return obj;
	} ,
	showSessionExpiredPopup( )
	{
		var timeleft = 5;
		var downloadTimer = setInterval( function( )
		{
			$( "#countdown" ).html( timeleft );
			timeleft -= 1;
			if ( timeleft <= 0 )
			{
				clearInterval( downloadTimer );
				AW.Api.post( AW.Api.url[ 'post_logout' ] , null , function( response )
				{
					$( '#expiredTokenModal' ).modal( 'hide' );
					AW.getView( 'Skeleton' ).getItem( 'loginModal' ).show( );
				} );
			}
		} , 1000 );
		$( '#expiredTokenModal' ).modal( { backdrop: 'static' , keyboard: false , show: true } );
	} ,
	renewLoginToken: function( uri , method , params , successCallback , errorCallback , timeout )
	{
		$.ajax
		( {
			url: AW.Api.prefix + '/user/new-token/' ,
			type: 'POST' ,
			//data: params ,
			dataType: 'json' ,
			timeout: 30000 ,
			async: false ,
			headers: { 'X-Requested-With' : 'XMLHttpRequest' } ,
			success: function( response )
			{ 
				if ( response.result.success )
				{
					AW.User.token_expiry = response.result.data.token_validity;
					if ( uri !== undefined && uri !== null )
					{
						AW.Api._call( uri , method , params , successCallback , errorCallback , timeout );
					}
				
				}
				else
				{
					AW.showSessionExpiredPopup( );
				}
			}
		} );
	}*/
});