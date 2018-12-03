<?php
    extract($_POST);

    $fh = fopen("requests.txt", "a");
    if ($fh) {
        $str = "{$_POST['firstname']} {$_POST['lastname']},,,{$_POST['email']},,,'''{$_POST['comments']}'''\n\n";
        fwrite($fh, $str);
        fclose($fh);
    }
?>
