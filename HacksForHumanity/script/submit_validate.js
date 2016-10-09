function validateURL(inp) {
	alert("URL VALIdATE");
	//check for a match in the URL regular expression
	return /(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/.match(inp);
}

function validateImage(inp) {
	var file = document.getElementById("image").value;
	
	//since the field is optional, return true if the field is empty
	if (file == "")
		return true;
	
	//now validate based on the file extension (the last 3 characters of the URL)
	var extension = file.substring(file.length - 3);
	if (extension == "peg" || extension == "jpg" || extension == "png" || extension == "gif") return true;
	return false;
}