<?php
ob_start();
require("admin/layouts/db.php");
?>
<?php
session_start();
session_destroy();
header('Location: index.php');
ob_end_flush();
?>