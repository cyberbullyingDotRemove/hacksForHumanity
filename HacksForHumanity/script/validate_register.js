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
	var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return regex.text(inp);	    
}