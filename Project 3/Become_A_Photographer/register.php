<?php
    if (isset($_POST["signup"]))
    {
        $file = fopen("../user_pass.txt", "r");
        $user = $_POST['email'];
        $taken = false;
        while(!feof($file))
        {
            $line = trim(fgets($file));
            $array = explode(':',$line);
            if ($array[0] === "$user")
            {
                $taken = true;
                break;
            }
        }
        if ($taken === true)
        {
            echo "The email $user is already associated with an account.";
        }
        else
        {
            $password = $_POST['password'];
            $str = "$user:$password";
            $file = fopen("../user_pass.txt", "a");
            fwrite($file, "$str\n");
            setcookie("success", $user, time() + 86400*1095, "/");
            header("Location: ../");
        }
    }
?>
