<?php
include "../libs/koneksi.php";

mysql_query("DELETE FROM obat WHERE kode_obat = '".$_GET['kode_obat']."'");
mysql_query("DELETE FROM stock_masuk WHERE kode_obat = '".$_GET['kode_obat']."'");
mysql_query("DELETE FROM stock_keluar WHERE kode_obat = '".$_GET['kode_obat']."'");
echo "<script language=javascript>parent.location.href='home.php?ref=stock';</script>";
?>