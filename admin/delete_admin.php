<?php 
ob_start();
require("layouts/db.php");
?>
<?php 
$id=$_GET['id'];

    $dlt=$conn->prepare("DELETE FROM admin WHERE admin_id=?");
    $dlt->execute([$id]);
    header("Location:admin.php?success");
    exit();

?>