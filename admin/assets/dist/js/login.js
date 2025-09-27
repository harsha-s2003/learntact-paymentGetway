function validateLogin()
{
	var email = $('#lg_email').val().trim();
	var password = $('#lg_password').val().trim();

	if(email=='')
	{
		//var appendEmail = '<span class="">'+'Email field is required'+'</span>';
		var appendEmail = '<div class="card-body m-top-20"><div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i> Alert!</h5>Email field is required, please enter valid email address.</div></div>';

		$('#appendvalidate').html(appendEmail);
		$("#lg_email").focus();return false;
	}
	if(password=='')
	{
		//var appendPassword = '<span class="red">'+'Password field is required'+'</span>';
		var appendPassword = '<div class="card-body m-top-20"><div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i> Alert!</h5>Password field is required, please enter valid password.</div></div>';
		$('#appendvalidate').html(appendPassword);
		$("#lg_password").focus();return false;
	}
}

setTimeout(function(){$('#appendvalidate').fadeOut();}, 10000);
setTimeout(function(){$('#appendmsg').fadeOut();}, 3000);