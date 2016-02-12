<html>
<head>
<title>Edit Data</title>
        <!--link rel="stylesheet" href="libs/bootstrap.min.css">	
        <link rel="stylesheet" href="libs/dataTables.bootstrap.css"-->
<?php 
include ('../libs/koneksi.php');
//include ("../libs/alerts.php");
	//$kunjungan="kunjungan";
					
	$sql="SELECT kode_dokter,nama_dokter,alamat_praktek,telp FROM dokter  WHERE kode_dokter = '".$_GET['kode_dokter']."' ";
	$query=mysql_query($sql); 
	$data=mysql_fetch_array($query);
	//echo $sql;
	?> 
</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="">
            <h3>Set Fee Dokter</h3>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
if(isset($_POST['update']))
{
	//$nama_parameter=mysql_real_escape_string($_POST['nama_parameter']);
	//$fee =$_POST['fee'] / 100 * $data['total'];	
	mysql_query("UPDATE dokter SET  fee = '".$_POST['fee']."' WHERE kode_dokter = '".$_GET['kode_dokter']."'");
	echo "<script language=javascript>parent.location.href='home.php?ref=dokter';</script>";
	//writeMsg('update.sukses');
	//Re-Load Data from DB
	//$sql = mysql_query("select id,kode,nama from kelompok_parameter_uji  WHERE id = '".$_GET['id']."'");
	//$data = mysql_fetch_array($sql);
}
?>

	<!--div class="form-group">
  		<label class="control-label" for="kode">Kode Kelompok</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data['nama']; ?>" readonly="readonly">
	</div>

	<div class="form-group">
  		<label class="control-label" for="sub_kode">Sub Kode</label>
  		<input type="text" class="form-control" name="sub_kode" id="sub_kode" value="<?php echo $data['sub_kode']; ?>" readonly="readonly">
	</div>
	<div class="form-group">
  		<label class="control-label" for="nama_parameter">Nama Parameter</label>
  		<input type="text" class="form-control" name="nama_parameter" id="nama_parameter" value="<?php echo $data['nama_parameter']; ?>" tabindex="1" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="satuan">Satuan</label>
  		<input type="text" class="form-control" name="satuan" id="satuan" value="<?php echo $data['satuan']; ?>" tabindex="2" required>
	</div>
	<div class="form-group">
  		<label class="control-label" for="metode">Metode</label>
  		<input type="text" class="form-control" name="metode" id="metode" value="<?php echo $data['metode']; ?>" tabindex="3" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="batas_normal">Batas Normal</label>
  		<input type="text" class="form-control" name="batas_normal" id="batas_normal" value="<?php echo $data['batas_normal']; ?>" tabindex="4" required>
	</div>
	<div class="form-group">
  		<label class="control-label" for="biaya">Biaya</label>
  		<input type="number" class="form-control" name="biaya" id="biaya" value="<?php echo $data['biaya']; ?>" tabindex="5" required>
	</div-->
	
	<!--div class="form-group">
  		<label class="control-label" for="tanggal">Tanggal</label>
  		<input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo $data['tanggal']; ?>" readonly>
		  
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="kode">Kode Resep</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data['kode_pembelian']; ?>" readonly>
		  
	</div-->

	<div class="form-group">
  		<label class="control-label" for="nama_dokter">Nama Dokter</label>
  		<input type="text" class="form-control" name="nama_dokter" id="nama_dokter" tabindex="2" value="<?php echo $data['nama_dokter']; ?>" readonly>
	</div>

	<div class="form-group">
  		<label class="control-label" for="alamat_praktek">Alamat Praktek</label>
  		<textarea type="text" class="form-control" name="alamat_praktek" id="alamat_praktek" tabindex="3" value="" readonly><?php echo $data['alamat_praktek']; ?></textarea>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="telp">No Telp</label>
  		<input type="text" class="form-control" name="telp" id="telp" tabindex="4" value="<?php echo $data['telp']; ?>" readonly>
	</div>

	<!--div class="form-group">
  		<label class="control-label" for="total">Total Resep (Rp)</label>
  		<input type="number" class="form-control" name="total" id="total" tabindex="6" value="<?php echo number_format($data['total'],0,'.','.'); ?>" readonly>
	</div-->

	<div class="form-group">
  		<label class="control-label" for="fee">Set Fee (%)</label>
  		<input type="number" min="2015-01-01" class="form-control" name="fee" id="fee" tabindex="7"  required>
	</div>
	
	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary" tabindex="6">
	<a href="home.php?ref=dokter" class="btn btn-danger" tabindex="7">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>
</body>
</html>