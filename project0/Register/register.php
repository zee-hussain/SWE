<html>
<head><title>User Verfication</title>
</head>
<body>


<?php
  extract($_POST);
        $file = fopen("../passwd.txt", "r");
        $user = $_POST['username'];
        $taken = false;
        while (!feof($file)){
                        $line = trim(fgets($file));
                        $arrfields = explode(':', $line);
                        if ($arrfields[0] === "$user"){
                        $taken = true;
                        break;
                        }
}
        if($taken === true)
        {
        echo  "<h1> Sorry, Username has been taken. Please try again. </h1>";
        echo  "<h2> Returning to Registration Page </h2>";
        header("refresh:3;url=index.php");
        }       
        else
        {
                $password = $_POST['password'];
                $usertype = $_POST['usertype'];
                $file = fopen("../passwd.txt", "a");
                fwrite($file, ($user . ":" . $password . ":" . $usertype . "\n"));
                header("refresh:1;url=../Login/index.php");
        }
?>

</body>
</html>