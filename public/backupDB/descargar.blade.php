<?php
include ("Function_Backup.blade.php");


echo backup_tables("localhost","root","","odonto");
$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/db-backup-".$fecha.".sql");

?>