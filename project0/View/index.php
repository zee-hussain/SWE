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

	$dir_path = "../Upload/uploads";
	if(is_dir($dir_path))
	{
	$files = opendir($dir_path);
	{
		if($files)
		{
			while(($file_name = readdir($files)) !== FALSE)
			{
				if ($file_name != '.' && $file_name != '..')
				{
					// echo $file_name."<br>";
					// echo "<a href=pdf_server.php?file=pdffilename>Final Exam</a><br>";
					echo "<a href='../Upload/uploads/".$file_name."' download>".$file_name."</a><br>";

				}
				
			}
		}
	}
	}

?>



<!DOCTYPE html>
<html>
	<head>
		<title>View</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href = "../main.css">
	</head>
	<body>
	</body>

</html>
