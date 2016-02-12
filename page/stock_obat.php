<html>
<head>
<title>Edit Data</title>
        <!--link rel="stylesheet" href="libs/bootstrap.min.css">	
        <link rel="stylesheet" href="libs/dataTables.bootstrap.css"-->
<?php 
include ('../libs/koneksi.php');
//include ("../libs/alerts.php");
	//$kunjungan="kunjungan";
					
	$sql="SELECT a.kode_obat,a.no_batch,a.nama_obat,b.golongan,c.nama_jenis,d.nama_bentuk,a.harga_satuan,a.stock_obat FROM obat a LEFT JOIN golongan_obat b ON (a.kode_golongan)=b.kode_golongan LEFT JOIN jenis_obat c ON (a.kode_jenis)=c.kode_jenis LEFT JOIN bentuk_obat d ON (a.kode_bentuk)=d.kode_bentuk  WHERE a.kode_obat = '".$_GET['kode_obat']."'";
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
            <h3>Set Stock Obat</h3>
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
	//$stk =$data['stock_obat'] + $_POST['stock'];
	//$sql="UPDATE obat SET   stock_obat = '".$stk."' WHERE kode_obat = '".$_GET['kode_obat']."'";
	//$query=mysql_query($sql);
	
	$sql="INSERT INTO stock_masuk (tanggal,no_batch,kode_obat,nama_obat,stock_masuk,kardaluarsa) VALUES (CURRENT_TIMESTAMP,'".$_POST['no_batch']."','".$_POST['kode']."','".$_POST['nama_obat']."','".$_POST['stock']."','".$_POST['kardaluarsa']."');";
	$query=mysql_query($sql);
	//echo $sql;
	echo "<script language=javascript>parent.location.href='home.php?ref=stock';</script>";
	//writeMsg('update.sukses');
	//Re-Load Data from DB
	//$sql = mysql_query("select id,kode,nama from kelompok_parameter_uji  WHERE id = '".$_GET['id']."'");
	//$data = mysql_fetch_array($sql);
}
?>

	
	<div class="form-group">
  		<label class="control-label" for="kode">Kode Obat</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data['kode_obat']; ?>" readonly>
		  
	</div>
	
	
	<div class="form-group">
  		<label class="control-label" for="nama_obat">Nama Obat</label>
  		<input type="text" class="form-control" name="nama_obat" id="nama_obat" value="<?php echo $data['nama_obat']; ?>" readonly>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="golongan">Golongan</label>
  		<input type="text" class="form-control" name="golongan" id="golongan" value="<?php echo $data['golongan']; ?>" readonly>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="jenis">Jenis</label>
  		<input type="text" class="form-control" name="jenis" id="jenis" value="<?php echo $data['nama_jenis']; ?>" readonly>
		</div>
	
	<div class="form-group">
  		<label class="control-label" for="bentuk">Bentuk</label>
  		<input type="text" class="form-control" name="bentuk" id="bentuk" value="<?php echo $data['nama_bentuk']; ?>" readonly>
	</div>

	<div class="form-group">
  		<label class="control-label" for="harga">Harga (Rp)</label>
  		<input type="number" class="form-control" name="harga" id="harga"  value="<?php echo $data['harga_satuan']; ?>" readonly>
	</div>

	<div class="form-group">
  	<label class="control-label" for="no_batch">No Batch</label>
  	<input type="text" class="form-control" name="no_batch" id="no_batch" value="" tabindex="1" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="stock">Tambahkan Stock</label>
  		<input type="number" class="form-control" name="stock" id="stock" tabindex="2" value="" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="kardaluarsa">Tanggal Kardaluarsa (Bulan-Tanggal-Tahun)</label>
  		<input type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="kardaluarsa" id="kardaluarsa" tabindex="3" required>
	</div>
	
	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary" tabindex="3">
	<a href="home.php?ref=stock" class="btn btn-danger" tabindex="4">Batal</a>
	</div>
	
	</form>
	</div>
</div>

</div>
</body>
</html>