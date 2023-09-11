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
			var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
			$('#messageModalTxt').html(AW.Lang.errors[AW.Actions.errors[500]]);
			$('#messageModalTxt').removeClass('alert-success');
			$('#messageModalTxt').addClass('alert-danger');
			messageModal.show();
			AW.log('api call error');
			AW.log(response);
		}
	},
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
	}
});