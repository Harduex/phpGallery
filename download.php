<?php
$file = basename($_GET['f']);
if(is_file("./images/".$file)){
    header("Content-Type:application/octet-stream");
    header("Content-Disposition:attachment; filename=".$file);
    readfile("./images/".$file);
    exit();
}else{
    echo 'error';
}