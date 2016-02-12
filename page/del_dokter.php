<?php
include "../libs/koneksi.php";

mysql_query("DELETE FROM dokter WHERE kode_dokter = '".$_GET['kode_dokter']."'");
mysql_query("DELETE FROM dokter_fee WHERE kode_dokter = '".$_GET['kode_dokter']."'");
echo "<script language=javascript>parent.location.href='home.php?ref=dokter';</script>";
?>