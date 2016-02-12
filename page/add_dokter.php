<html>
<head>
<title>Edit Data</title>

</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="page-header1">
            <h3>Tambah Dokter </h3>
        </div>
    </div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
include ('../libs/koneksi.php');

$query = "SELECT max(kode_dokter) as maxID FROM dokter ";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$noUrut =substr($idMax, 1, 3);
$noUrut++;
$char = "D";
$new = $char . sprintf("%03s", $noUrut);
//echo $new;
$cek=substr($new,1,3);
//echo $cek;
if($cek == 000) 
{
$newID = $char . sprintf("%03s", $noUrut+1);
}
else
{
$newID = $char . sprintf("%03s", $noUrut);
} 
if(isset($_POST['tambah']))
{
	$sql="insert into dokter (kode_dokter,nama_dokter,alamat_praktek,telp) values ('".$_POST['kode']."','".$_POST['nama_dokter']."','".$_POST['alamat']."','".$_POST['no_hp']."')";
	$query=mysql_query($sql);
	echo "<script language=javascript>parent.location.href='home.php?ref=dokter';</script>";
	//writeMsg('save.sukses');
	
}
?>

	<div class="form-group">
  		<label class="control-label" for="kode">Kode Dokter</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $newID; ?>" readonly>
		  
	</div>

	<div class="form-group">
  		<label class="control-label" for="nama_dokter">Nama Dokter</label>
  		<input type="text" class="form-control" name="nama_dokter" id="nama_dokter" tabindex="2" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="alamat">Alamat</label>
  		<textarea type="text" class="form-control" name="alamat" id="alamat" tabindex="3" required></textarea>
	</div>

	<div class="form-group">
  		<label class="control-label" for="no_hp">No Telp</label>
  		<input type="number" class="form-control" name="no_hp" id="no_hp" tabindex="4" required>
	</div>

<br>
	<div class="form-group">
	<input type="submit" value="Tambah" name="tambah" class="btn btn-primary" tabindex="8">
	<a href="home.php?ref=dokter" class="btn btn-danger" tabindex="9">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>


</body>
</html>