function validate_all() {

	var fn = document.getElementById("first_name").value;
	var ln = document.getElementById("last_name").value;
	var email = document.getElementById("email").value;
	var pass = document.getElementById("password").value;
	var confpass = document.getElementById("confirmpassword").value;
	var secQues1 = document.getElementById("secQues1").value;
	var secQues2 = document.getElementById("secQues2").value;
	var unameExists = document.getElementById("check-availability-status").innerText;

	var allset = true;
	//value returned by javascript function. allset returns false if any of the validation fails
	function common_check() {

		var Common_Check_Ok = true;
		/*JAVASCRIPTS FUNCTION IS CALLED WHEN REGISTER BUTTON IS CLICKED. IF THE VALIDATION FAILS THE USER IS
		PROMPTED TO CORRECT THE ISSUES. IF THE USER FILLS ALL TEH FIELDS CORRECTLY THEN THE REQUEST IS SENT TO SERVER
		THIS REDUCES LOAD ON SERVER

		var allset = true; */ //value returned by javascript function. allset returns false if any of the validation fails
		function allLetter(inputtxt)//function to check if the first_name and last_name contains only alphabets
		{
			var letters = /^[A-Za-z]+$/;
			if (inputtxt.match(letters)) {
				return true;
			} else {
				return false;
			}
		}

		//FUNCTION TO VALIDATE EMAIL ID
		function emailValidation(text) {
			var valid = /^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]{2,20})+\.[a-zA-Z]{2,3}$/;
			if (text.match(valid)) {
				return true;
			} else {
				return false;
			}

		}

		//FUNCTION TO CHECK IF FIRST NAME AND LAST NAME CONTAINS ALL LETTERS
		if (!allLetter(fn) && document.getElementById("first_name").value != "") {
			msg4 = "Please enter only alphabets";
			document.getElementById("first_name").style.borderColor = "green";
			document.getElementById("fnerr").innerHTML = msg4;

			Common_Check_Ok = false;
		}
		//TO CHECK IF LAST NAME CONTAINS ALL ALPHABETS ONLY
		if (!allLetter(ln) && document.getElementById("last_name").value != "") {
			msg5 = "Please enter only alphabets";
			document.getElementById("last_name").style.borderColor = "green";
			document.getElementById("lnerr").innerHTML = msg5;
			Common_Check_Ok = false;
		}

		if (!emailValidation(email)) {
			msg6 = "Please enter only alphanumeric characters, Domain name should contain 1-20 characters";
			document.getElementById("email").style.borderColor = "green";
			document.getElementById("emailerr").innerHTML = msg6;
			Common_Check_Ok = false;
		}

		return Common_Check_Ok;
	};
	//TO CHECK TWO PASSWORDS
	function password_check() {
		var Password_Check_Ok = true;
		if (pass != confpass && pass != "" && confpass != "") {
			msg1 = "The passwords donot match";
			document.getElementById("password").style.borderColor = "green";
			document.getElementById("confirmpassword").style.borderColor = "green";
			document.getElementById("matcherr").innerHTML = msg1;
			Password_Check_Ok = false;
		}
		return Password_Check_Ok;
	};
	function security_check() {
		var Security_Check_Ok = true;
		if (secQues1 == secQues2) {
			msg2 = "Please Select two different Questions";
			document.getElementById("secQues1").style.borderColor = "green";
			document.getElementById("secQues2").style.borderColor = "green";
			document.getElementById("Queserr").innerHTML = msg2;
			Security_Check_Ok = false;
		}
		return Security_Check_Ok;
	};
	//TO CHECK IF USER ALREADY EXISTS
	function user_check() {

		var user_check_ok = true;
		if (unameExists == "Username Not Available.") {

			msg7 = "Please select a different Username.";
			document.getElementById("username").style.borderColor = "green";
			document.getElementById("usererr").innerHTML = msg7;
			user_check_ok = false;
		}
		return user_check_ok;
	};
	var a = common_check();
	var b = password_check();
	var c = security_check();
	var d = user_check();
	//IF ANY OF THE VALIDATION FAILS FUNCTION RETURNS FALSE AND DISPLAY CORRESPONDING MESSAGE
	allset = a && b && c && d;
	return allset;
};
//	TO DISPLAY IF USERNAME IS AVAILABLE AS SOON AS USER FILLS IN USERNAME
function checkUser() {

	var uname = document.getElementById("username").value;
	var message = document.getElementById('UnameError');
	jQuery.ajax({
		url : "check_username.php", // your username checker url
		type : "POST",
		data : 'username=' + $("#username").val(),
		success : function(data) {
			$("#check-availability-status").html(data);

		}
	});

}

function validateSearch() {

	var result;
	var category = document.getElementsByName('category')[0].value;
	var skillName = document.getElementById('skillName').value;
	var location = document.getElementById('location').value;
	var time = document.getElementsByName('time')[0].value;

	document.getElementById('error').innerHTML = "";
	document.getElementById("nameError").innerHTML = "";
	document.getElementById("locationError").innerHTML = "";
	//IF NO SEARCH CRITERIA IS SELECTED
	if (category == "" && skillName == "" && location == "" && time == "") {

		document.getElementById('error').innerHTML = 'Select atleast one criteria';
		result = false;
	} else {
		var letters = /^[A-Za-z]+$/;
		var allowed_characters = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
		if (skillName != "" && !skillName.match(allowed_characters)) {

			document.getElementById("nameError").innerHTML = 'Skill name should only be alphabets';
			result = false;
		}
		if (location != "" && !location.match(letters)) {
			document.getElementById("locationError").innerHTML = 'Location should only be alphabets';
			result = false;
		}
	}
	return result;
}

