if(!window.console) { console = {log: function(){}}; } //OMG, IE8-

jQuery(document).ready(function($){

	$.mobileNumber = getMobileNumber();

	//click on the try now button
	$('#mobileNumber').on('keyup', function(e){
		$.mobileNumber = getMobileNumber();
		if(e.which == 13) { // hit 'enter' in the field
			activateEmail($.mobileNumber);
		}
	});

	//focus on the imput field when modal shown
	$('#tryItModal').on('shown', function(){
		$('#mobileNumber').focus();
	});

	//click on the 'send' button
	$('#activateEmail').on('click', function(e){
		e.preventDefault();
		activateEmail($.mobileNumber);
	});

	//validate and redirect to a mailto link
	function activateEmail(mobileNumber) {
		var valid = validateMobileNumber(mobileNumber);
		if(!valid) return false;
		var email = mobileNumber+'@mail2sms.co';
		var mailto = 'mailto:'+email+'?subject=Hello+SMS&body=write+your+long+text+here';
		window.location.href = mailto;
	}

	//validate mobile number
	function validateMobileNumber(mobileNumber) {
		if(mobileNumber.length < 7) {
			alert('Number looks a bit too short. Please double check. Have you forgotten the country code?');
			return false;
		}
		return true;
	}

	//get the value from the field and clean it up
	function getMobileNumber() {
		if(!($('#mobileNumber').length)) return false;
		//strip away all the non-numbers
		return $('#mobileNumber').val().replace(/\D+/g, '' );
	}

	//update email on the getmore page
	$('#newUserEmail').on('keyup', function() {
		$('#userEmail').attr('value', $(this).val());
	});

	//submit buy more form
	$('#buyMoreButton').on('click', function(e) {
		e.preventDefault();
		//validate
		var email = $('#userEmail').val();
		var valid = validateEmail(email);
		if(!valid){
			alert(email+' doesn\'t look like a proper email address. Please double check.');
			return;
		}
		//submit
		var form = $(this).closest('form');
		form.submit();
	});

	function validateEmail(email) {
		var re = /\S+@\S+\.\S+/;
		return re.test(email);
	}
});