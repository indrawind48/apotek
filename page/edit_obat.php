<html>
<head>
<title>Edit Data</title>
        <!--link rel="stylesheet" href="libs/bootstrap.min.css">	
        <link rel="stylesheet" href="libs/dataTables.bootstrap.css"-->
<?php 
include ('../libs/koneksi.php');
//include ("../libs/alerts.php");
	//$kunjungan="kunjungan";
					
	$sql="SELECT a.kode_obat,a.no_batch,a.nama_obat,b.kode_golongan,b.golongan,c.kode_jenis,c.nama_jenis,d.kode_bentuk,d.nama_bentuk,a.harga_resep,a.harga_nonresep,a.stock_obat,a.harga_kemasan FROM obat a LEFT JOIN golongan_obat b ON (a.kode_golongan)=b.kode_golongan LEFT JOIN jenis_obat c ON (a.kode_jenis)=c.kode_jenis LEFT JOIN bentuk_obat d ON (a.kode_bentuk)=d.kode_bentuk WHERE a.kode_obat = '".$_GET['kode_obat']."'";
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
            <h3>Edit Obat</h3>
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
	$sql="UPDATE obat SET  kode_obat = '".$_POST['kode']."',no_batch = '".$_POST['no_batch']."',nama_obat = '".$_POST['nama_obat']."', kode_golongan = '".$_POST['golongan']."',kode_jenis = '".$_POST['jenis']."', harga_resep = '".$_POST['harga_resep']."', harga_nonresep = '".$_POST['harga_nonresep']."', harga_kemasan = '".$_POST['harga_kemasan']."' WHERE kode_obat = '".$_GET['kode_obat']."'";
	$query=mysql_query($sql);
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
  		<label class="control-label" for="no_batch">No Batch</label>
  		<input type="text" class="form-control" name="no_batch" id="no_batch" tabindex="1" value="<?php echo $data['no_batch']; ?>" required>
	</div>
		
	<div class="form-group">
  		<label class="control-label" for="nama_obat">Nama Obat</label>
  		<input type="text" class="form-control" name="nama_obat" id="nama_obat" tabindex="2" value="<?php echo $data['nama_obat']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="golongan">Golongan</label>
  		<select type="text" class="form-control" name="golongan" id="golongan" tabindex="3" required>
		<option value="<?php echo $data['kode_golongan']; ?>"><?php echo $data['golongan']; ?></option>
		<?php $sql1="SELECT kode_golongan,golongan FROM golongan_obat "; $query1=mysql_query($sql1);  while ($data1=mysql_fetch_assoc($query1))
		{
		echo "<option value=$data1[kode_golongan]>$data1[golongan]</option>";
		} ?>
		</select>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="jenis">Jenis</label>
  		<select type="text" class="form-control" name="jenis" id="jenis" tabindex="4" required>
		<option value="<?php echo $data['kode_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
		<?php $sql2="SELECT kode_jenis,nama_jenis FROM jenis_obat "; $query2=mysql_query($sql2);  while ($data2=mysql_fetch_assoc($query2))
		{
		echo "<option value=$data2[kode_jenis]>$data2[nama_jenis]</option>";
		} ?>
		</select>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="bentuk">Bentuk</label>
  		<select type="text" class="form-control" name="bentuk" id="bentuk" tabindex="5" required>
		<option value="<?php echo $data['kode_bentuk']; ?>"><?php echo $data['nama_bentuk']; ?></option>
		<?php $sql3="SELECT kode_bentuk,nama_bentuk FROM bentuk_obat "; $query3=mysql_query($sql3);  while ($data3=mysql_fetch_assoc($query3))
		{
		echo "<option value=$data3[kode_bentuk]>$data3[nama_bentuk]</option>";
		} ?>
		</select>
	</div>

	<div class="form-group">
  		<label class="control-label" for="harga_kemasan">Harga Kemasan (Rp)</label>
  		<input type="number" class="form-control" name="harga_kemasan" id="harga_kemasan" tabindex="6" value="<?php echo $data['harga_kemasan']; ?>" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="harga_resep">Harga Resep (Rp)</label>
  		<input type="number" class="form-control" name="harga_resep" id="harga_resep" tabindex="6" value="<?php echo $data['harga_resep']; ?>" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="harga_nonresep">Harga Non Resep (Rp)</label>
  		<input type="number" class="form-control" name="harga_nonresep" id="harga_nonresep" tabindex="6" value="<?php echo $data['harga_nonresep']; ?>" required>
	</div>

	
	<div class="form-group">
	<input type="submit" value="Update" name="update" class="btn btn-primary" tabindex="6">
	<a href="home.php?ref=stock" class="btn btn-danger" tabindex="7">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>
</body>
</html>