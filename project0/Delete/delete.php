<?php

	$file = $_GET['name'];

	unlink("../Upload/uploads/".$file);

	echo "File Deleted! <a href ='index.php'>Click here to continue</a>"
?>