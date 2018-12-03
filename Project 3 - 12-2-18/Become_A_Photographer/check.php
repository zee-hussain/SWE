<?php

    $host = "localhost";
    $user = "root";
    $pwd = ""; // Note: PW is clear text!!
    $dbs = "cs329e_zah339";
    
    $taken = false;
    $connect = mysqli_connect ($host, $user, $pwd, $dbs);
    $result = mysqli_query($connect, "select * from credentials where email = '{$_POST['username']}'");
    
    if (mysqli_num_rows($result) > 0) {
    $taken = true;
    }

    if ($taken === true)
    {
        echo "Taken";
    }
?>
