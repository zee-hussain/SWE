

<!DOCTYPE html>

<html lang="en">

<head>
	test
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href = "../main.css">

    <title>Upload Files</title>


    

</head>

<body>
	
	
    
	<br>
	<br>
	<br>
	<br>
		<form method="post" enctype="multipart/form-data">
        <input type="file" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        <img id="output">
        <input type="submit" value="Upload File" name="submit">
        <br>
        <br>

        <script src="upload.js">
		
		</script>
    </form>
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


</body>

</html>


