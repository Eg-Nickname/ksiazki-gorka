<?php
if(isset($_SESSION['email'])){
    $flag=true;
}else{
    $flag=false;
}
echo json_encode($flag);
?>