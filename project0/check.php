<?php
    $file = fopen("./passwd.txt","r");
    $user = $_POST['username'];
    $taken = false;
    while (!feof($file))
    {
        $line = trim(fgets($file));
        $arrfields = explode(':', $line);
        if ($arrfields[0] === "$user")
        {
            $taken = true;
            break;
        }
    }
    fclose($file);
    if ($taken === true)
    {
        echo "Taken";
    }
    else{
        $_SESSION["avaliable"] = true;
        echo "Avaliable";
        die;
    }
?>
