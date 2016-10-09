function isEmpty(inp) {
	return inp.length == 0;
}

function confirmPassword(inp1, inp2) {
	if (inp1.length < 8)
		return false;
	
	if (inp1 != inp2)
		return false;
	
	return true;
}

function validateEmail(inp) {
	var regex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
	return regex.text(inp);	    
}