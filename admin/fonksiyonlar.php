<?php
require_once('layouts/db.php');

if(isset($_POST['gorevli_ekle']) && !empty($_POST['adsoyad'])){
    $fullname = strip_tags($_POST['adsoyad']);
    $tlf =$_POST['phone'];
    
    $insert = $conn->prepare("INSERT INTO gorevli(adsoyad,tlf_no) VALUES(:fullname,:tlf)");
    $insert->execute([
        'fullname' => $fullname,
        'tlf' => $tlf,
        ]);

    if($insert){
        header("Location: gorev.php?status=ok");
        die();
    }else{
        header("Location: gorev.php?status=fail");
        die();
    }
}

if($_GET['sil']){
    $id=$_GET['id'];
    $dlt=$conn->prepare("DELETE FROM gorevli WHERE id=?");
    $dlt->execute([$id]);
    header("Location:gorev.php?success");
    exit();
}







