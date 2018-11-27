<?php
    if(isset($_POST['login']))
    {
        $file = fopen("user_pass.txt", "r"); 
        $user = $_POST['user'];
        $password = $_POST['password'];
        $match = false;
        while (!feof($file))
        {
            $line = trim(fgets($file));
            if ($line === "$user:$password")
            {
            $match = true;
            setcookie("success", $_POST['user'], time() + 86400*1095, "/");
	    header("Location: ./");
            break;
            }
        }

        if($match === false)
        {
            echo "That login information is invalid. Please go back and try again.";
        }
    }
?>
