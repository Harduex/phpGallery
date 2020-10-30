<?php
$file = basename($_GET['f']);
$album = basename($_GET['album']);
if(is_file("./albums/".$album.'/'.$file)){
    header("Location: ./list_album.php?album=$album");
    unlink("./albums/".$album.'/'.$file);
    exit();
}else{
    echo 'error';
}