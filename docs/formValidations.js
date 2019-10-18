//Below is registration form validation

//for both signin and register email fields
function validateEmail(id){
	var emailElem = document.getElementById(id);
	var emailPattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/;
	if (emailPattern.test(emailElem.value)) {
		emailElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		emailElem.setAttribute("style", "background-color:pink");
		return false;
	}
}
//for both signin and register password fields
function validatePassword(id) {
	var passwordElem = document.getElementById(id);
	//password should be composed of numbers and letters, at least one digit and one upper case letter
	var passwordPattern = /^(?=.*\d)(?=.*[A-Z])[a-zA-Z0-9]{8,12}$/;
	if (passwordPattern.test(passwordElem.value)) {
		passwordElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		passwordElem.setAttribute("style", "background-color:pink");
		return false;
	}
}

//for entire sign in section
function validateSignIn(emailId, passwordId){
	var emailResult = validateEmail(emailId);
	var passwordResult = validatePassword(passwordId);
	if((emailResult == true) && (emailResult == true)){
		// showLoader();
		return true;
	} else {
		window.alert("failed");
		return false;
	}
}

//registration first and last name simply cannot be empty
function validateNameExists(nameId) {
	var nameElem = document.getElementById(nameId);
	if ((nameElem.value.length != 0)) {
		nameElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		nameElem.setAttribute("style", "background-color:pink");
		return false;
	}
}

//register user name field
function validateUserName(userNameId) {
	var userNameElem = document.getElementById(userNameId);
	var userNamePattern = /^[a-zA-Z0-9]+$/;
	if (userNamePattern.test(userNameElem.value)) {
		userNameElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		userNameElem.setAttribute("style", "background-color:pink");
		return false;
	}
}

//on check fill in username field
//note : only copy if email valid
//this means checkbox will "check" but no copy, email box will show invalid however
function completeUsername(checkBoxId, emailId, userNameId) {
	var checkStatus = document.getElementById(checkBoxId);
	var emailElem = document.getElementById(emailId);
	var userNameElem = document.getElementById(userNameId);
	var emailValid = validateEmail(emailId);
	if (checkStatus.checked && (emailValid == true)) {
		userNameElem.value = emailElem.value;
	}
}

//if check box checked then username and email should match
function userNameEmailMatch(userNameId, emailId) {
	var emailElem = document.getElementById(emailId);
	var userNameElem = document.getElementById(userNameId);
	if (emailElem.value == userNameElem.value) {
		emailElem.setAttribute("style", "background-color:white");
		userNameElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		emailElem.setAttribute("style", "background-color:pink");
		userNameElem.setAttribute("style", "background-color:pink");
		return false;
	}
}

//when confirming new password fields have to match
function validatePasswordsMatch(passwordId, otherPasswordId) {
	var passwordElem = document.getElementById(passwordId);
	var otherPasswordElem = document.getElementById(otherPasswordId);
	if (passwordElem.value == otherPasswordElem.value){
		passwordElem.setAttribute("style", "background-color:white");
		otherPasswordElem.setAttribute("style", "background-color:white");
		return true;
	} else {
		passwordElem.setAttribute("style", "background-color:pink");
		otherPasswordElem.setAttribute("style", "background-color:pink");
		return false;
	}
}

//for complete registration form
function validateRegistration() {
	var firstNameResult = validateNameExists('registerFirstName');
	var lastNameResult = validateNameExists('registerLastName');
	var emailResult = validateEmail("registerEmail");
	var userNameResult = validateUserName("registerUserName");
	var checkStatus = document.getElementById("checkEmail");
	var emailMatch = true;
	var passwordResult = validatePassword("registerFirstPass");
	var otherPasswordResult = validatePassword("registerSecondPass");
	var passwordsResult = validatePasswordsMatch("registerFirstPass", "registerSecondPass");	
	if (checkStatus.checked == true) {
		emailMatch = userNameEmailMatch("registerUserName", "registerEmail");
	}
	if ((firstNameResult == true) && (lastNameResult == true) && (emailResult == true) && (userNameResult == true) && (emailMatch == true) && (passwordResult == true) && (otherPasswordResult == true) && (passwordsResult == true)){
		window.alert("registration passed");
		return true;
	} else {
		window.alert("failed");
		return false;
	}
}
//end of registration form validations