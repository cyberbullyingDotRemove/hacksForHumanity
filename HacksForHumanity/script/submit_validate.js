function validateURL(inp) {
	// check for a match in the URL regular expression
	var regex = /(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/;
	return regex.test(inp);
}

function validateImage(file) {
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