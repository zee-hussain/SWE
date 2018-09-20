<?php
    unset($_COOKIE["success"]);
    setcookie("success", null, -1, '/');
    header("Location: ./");
?>
