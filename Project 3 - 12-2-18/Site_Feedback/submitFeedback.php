<?php
    extract($_POST);

    $fh = fopen("feedback.txt", "a");
    if ($fh) {
        $str = "{$_POST['name']},,,{$_POST['email']},,,'''{$_POST['comments']}'''\n\n";
        fwrite($fh, $str);
        fclose($fh);
    }
?>
