function isEmpty(inp) {
	return inp.length == 0;
}

function confirmPassword(inp1, inp2) {
	if (inp1.length < 8)
		return false;
	
}

function isImage(file) {
	// since the field is optional, return true if the field is empty
	if (file == "")
		return true;

	// now validate based on the file extension (the last 3 characters of the
	// URL)
	var extension = file.substring(file.length - 3);
	if (extension == "peg" || extension == "jpg" || extension == "png"
			|| extension == "gif")
		return true;
	return false;
}