<?php

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
					echo $file_name."<br>";
					// echo "<a href=pdf_server.php?file=pdffilename>Final Exam</a><br>";
					// // echo "<a href='".$file_name."' download></a>";
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
	</head>
	<body>
	</body>

</html>
