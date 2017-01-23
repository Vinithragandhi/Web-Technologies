$(document).ready(function(){
	$('#submit').click(function(e){
			if(validate()){
				return true;
				}
				else{
					return false;
				}
	});
	
});

$('#phone').blur(function() {
	var phone = $('#phone').val();
	if(phone.length == 10){
		$('#phone').val(phone.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3'));
	}
});
function validate(){
		var umid = $("#umid").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var ptitle = $("#ptitle").val();
		var name_regex = /^[a-zA-Z]+$/;
		var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		var umid_regex = /^[0-9]+$/;
		
		$("#error1").text("");
		$("#error2").text("");
		$("#error3").text("");
		$("#error4").text("");
		$("#error5").text("");
		$("#error6").text("");				
		var result =true;
		if(umid.length != 8 || !umid.match(umid_regex)){
							//alert();
							$("#error1").text("UMID should be an 8 digit number");
							result = false;
		}
		 if(fname.length == 0){
			$("#error2").text("Please enter a First Name");
			result = false;
		}
		else if(!fname.match(name_regex)){
					$("#error2").text("First Name should only contain alphabets");
				result = false;
				}
				 if(lname.length == 0){
					$("#error3").text("Please enter a Last Name");
					result = false;
				}
				else if(!lname.match(name_regex)){
					$("#error3").text("Last Name should only contain alphabets");
					result = false;
				}
				 if(ptitle.length == 0){
					$("#error4").text("Please enter a Project Title");
					result = false;
				}
				 if(email.length == 0){
					$("#error6").text("Please enter an email");
					result = false;
				}
				else if(!email.match(email_regex)){
					$("#error6").text("Email should be in example@example.com format");
					result = false;
				}
				 if(phone.length != 12){
									//alert();
									$("#error5").text("Please enter a valid phone number");
									return false;
				}
	return result;
}
function check(field, query) {
if(query.length != 0){
	var xmlhttp;
	if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp = new XMLHttpRequest();
	} else { // for IE6, IE5
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
	if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
	document.getElementById(field).innerHTML = "Validating..";
	} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	document.getElementById(field).innerHTML = xmlhttp.responseText;
	} 
	};
	xmlhttp.open("GET", "validation.php?field=" + field + "&query=" + query, false);
	xmlhttp.send();
}
}

