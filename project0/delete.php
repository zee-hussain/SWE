<form method="post">
   <input name="delete" type="submit" value="Delete bish!">
</form>    

<?php
    if(isset($_POST['delete']))
    {
        unlink(__FILE__);
    }
?>