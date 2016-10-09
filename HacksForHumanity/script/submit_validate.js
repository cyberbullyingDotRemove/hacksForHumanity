function validateURL(inp) {
	 return /(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/.match(inp);
}

function validateImage(inp) {
	var file = document.getElementById("image").value;
	var extension = file.substring(file.length - 3);
	if (extension == "peg" || extension == "jpg" || extension == "png" || extension == "gif") return true;
	return false;
}