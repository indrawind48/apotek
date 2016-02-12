<html>
<head>
<title>Edit Data</title>
<?php 
include ('../libs/koneksi.php');
//include ("../libs/alerts.php");
	//$kunjungan="kunjungan";
					
	$sql="SELECT kode_dokter,nama_dokter,alamat_praktek,telp FROM dokter WHERE kode_dokter = '".$_GET['kode_dokter']."'";
	$query=mysql_query($sql); 
	$data=mysql_fetch_array($query);
	//echo $sql;
	?> 
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="page-header1">
            <h3>Edit Data Dokter </h3>
        </div>
    </div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
if(isset($_POST['update']))
{
	//$nama_parameter=mysql_real_escape_string($_POST['nama_parameter']);
	$sql="UPDATE dokter SET  kode_dokter = '".$_POST['kode']."',nama_dokter = '".$_POST['nama_dokter']."', alamat_praktek = '".$_POST['alamat']."',telp = '".$_POST['no_hp']."' WHERE kode_dokter = '".$_GET['kode_dokter']."'";
	$query=mysql_query($sql);
	echo "<script language=javascript>parent.location.href='home.php?ref=dokter';</script>";
	//writeMsg('update.sukses');
	//Re-Load Data from DB
	//$sql = mysql_query("select id,kode,nama from kelompok_parameter_uji  WHERE id = '".$_GET['id']."'");
	//$data = mysql_fetch_array($sql);
}
?>
	


	<div class="form-group">
  		<label class="control-label" for="kode">Kode Dokter</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data['kode_dokter'];  ?>" readonly>
		  
	</div>

	<div class="form-group">
  		<label class="control-label" for="nama_dokter">Nama Dokter</label>
  		<input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?php echo $data['nama_dokter'];  ?>" tabindex="2" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="alamat">Alamat</label>
  		<textarea type="text" class="form-control" name="alamat" id="alamat"  tabindex="3" required><?php echo $data['alamat_praktek'];  ?></textarea>
	</div>

	<div class="form-group">
  		<label class="control-label" for="no_hp">No Telp</label>
  		<input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $data['telp'];  ?>" tabindex="4" required>
	</div>

<br>
	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary" tabindex="8">
	<a href="home.php?ref=dokter" class="btn btn-danger" tabindex="9">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>


</body>
</html>