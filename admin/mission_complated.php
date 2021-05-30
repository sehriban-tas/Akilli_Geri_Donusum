<?php require_once('layouts/db.php');

        $id=$_GET['id'];
        $status="0";
    
        $update=$conn->prepare("UPDATE gorevli SET status=:status WHERE id=:id ");
        $update->execute([
           'status'=>$status,
           'id'=>$id,
           ]);
           header("Location: gorev.php?status=ok");
           exit();

?>      
      