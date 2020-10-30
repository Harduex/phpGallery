<?php
$file = basename($_GET['f']);
if(is_file("./images/".$file)){
    header("Location: ./dashboard.php");
    unlink("./images/".$file);
    exit();
}else{
    echo 'error';
}