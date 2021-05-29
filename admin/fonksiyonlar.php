<?php
require_once('layouts/db.php');

if(isset($_POST['gorevli_ekle'])){
    $fullname = strip_tags($_POST['adsoyad']);
    
    $insert = $conn->prepare("INSERT INTO gorevli(adsoyad) VALUES(:fullname)");
    $insert->execute(['fullname' => $fullname]);

    if($insert){
        header("Location: gorev.php?status=ok");
        die();
    }else{
        header("Location: gorev.php?status=fail");
        die();
    }
}
