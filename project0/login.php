<?php
    $file = fopen("passwd","r");
    $user = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST[""]
    $adminmatch = false;
    $usermatch = false;
    while (!feof($file))
    {
        $line = trim(fgets($file));
        if ($line === "$user:$password:Admin")
        {
            $adminmatch = true;
            break;
        }
        if ($line === "$user:$password:User")
        {
            $usermatch = true;
            break;
        }
    }
    fclose($file);
    if ($adminmatch === true)
    {
        session_start();
        $_SESSION["success"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("Location: Admin/index.php");
    }
    if ($usermatch === true)
    {
        session_start();
        $_SESSION["success"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("Location: User/index.php");
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or Password. Please try again.")';
        echo '</script>';
    }
?>
