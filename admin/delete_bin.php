<?php 
ob_start();
require("layouts/db.php");
?>
<?php 
$id=$_GET['id'];

    $dlt=$conn->prepare("DELETE FROM bins WHERE bins_id=?");
    $dlt->execute([$id]);
    header("Location:bins.php?success");
    exit();

?>
