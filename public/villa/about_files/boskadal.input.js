/*! BosKadal.com */

function isDate(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 45 || charCode > 45) && (charCode < 47 || charCode > 47))
		return false;
	return true;
}

function isUsername(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 95 || charCode > 95) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

function isPassword(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 32 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 95 || charCode > 95) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

function isNumber(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 45 || charCode > 46) && (charCode < 48 || charCode > 57))
		return false;
	return true;
}

function isEmail(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 32 && (charCode < 44 || charCode > 46) && (charCode < 48 || charCode > 57) && (charCode < 64 || charCode > 90) && (charCode < 95 || charCode > 95) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

function isText(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 32 && (charCode < 44 || charCode > 46) && (charCode < 47 || charCode > 47) && (charCode < 48 || charCode > 57) && (charCode < 63 || charCode > 63) && (charCode < 65 || charCode > 90) && (charCode < 92 || charCode > 92) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

function isGeneral(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 32 && (charCode < 44 || charCode > 46) && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

function isNoEnter(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 12 && (charCode < 32 || charCode > 13) && (charCode < 44 || charCode > 46) && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
		return false;
	return true;
}

// Calling Function : <input type="text" onkeypress="return isNumberKey(event)" />


function show_commas(number){
	//remove any existing commas...
	number=number.replace(/,/g, "");
	//start putting in new commas...
	number = '' + number;
	if (number.length > 3) {
		var mod = number.length % 3;
		var output = (mod > 0 ? (number.substring(0,mod)) : '');
		for (i=0 ; i < Math.floor(number.length / 3); i++) {
			if ((mod == 0) && (i == 0))
				output += number.substring(mod+ 3 * i, mod + 3 * i + 3);
			else
				output+= ',' + number.substring(mod + 3 * i, mod + 3 * i + 3);
		}
		return (output);
	}
	else return number;
}
// Calling Function : <input type="text" onkeyup="this.value=show_commas(this.value);" />