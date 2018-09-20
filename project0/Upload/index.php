<?php
if (isset($_COOKIE["admin"])){
 		include "../adminNavbar.php";
 	}
 	else if (isset($_COOKIE["user"])){
 		include "../userNavbar.php";
 	}
 	else{
 		include "../navbar.php";
 	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upload Files</title>

</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document" onchange="loadFile(event)">
        <img id="output">
        <input type="submit" value="Upload File" name="submit">
    </form>

	<script src="upload.js"></script>
	<script>
		var loadFile = function(event) {
	   		var reader = new FileReader();
	    	reader.onload = function(){
	      		var output = document.getElementById('output');
	      		output.src = reader.result;
	    	};
	    	reader.readAsDataURL(event.target.files[0]);
	  	};
	</script>

</body>

</html>