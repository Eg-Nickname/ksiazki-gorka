<?php
session_start();
if(isset($_SESSION['logged_in']))
{
    session_unset();
    $kom="wylogowano";
}
else{
    $kom="Nikt nie był zalogowany";
}
echo json_encode($kom);
?>