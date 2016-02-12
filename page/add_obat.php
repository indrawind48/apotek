<html>
<head>
<title>Edit Data</title>

</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="page-header1">
            <h3>Tambah Obat </h3>
        </div>
    </div>
</div>
<br><br>
<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
include ('../libs/koneksi.php');

$query = "SELECT max(kode_obat) as maxID FROM obat ";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$noUrut =substr($idMax,3,3);
$noUrut++;
$char = "OBT";
$new = $char . sprintf("%03s", $noUrut);
//echo $idMax;
$cek=substr($new,3,3);
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
	$sql="insert into obat (kode_obat,no_batch,nama_obat,kode_golongan,kode_jenis,kode_bentuk,kemasan,harga_kemasan,harga_resep,harga_nonresep,jumlah,expired) values ('".$_POST['kode']."','".$_POST['no_batch']."','".$_POST['nama_obat']."','".$_POST['golongan']."','".$_POST['jenis']."','".$_POST['bentuk']."','".$_POST['kemasan']."','".$_POST['harga_kemasan']."','".$_POST['harga_resep']."','".$_POST['harga_nonresep']."','".$_POST['jumlah']."','".$_POST['expired']."')";
	$query=mysql_query($sql);
	echo "<script language=javascript>parent.location.href='home.php?ref=stock';</script>";
	//writeMsg('save.sukses');
	//echo $sql;
}
?>

	<div class="form-group">
  		<label class="control-label" for="kode">Kode Obat</label>
  		<input type="text" class="form-control" name="kode" id="kode" value="<?php echo $newID; ?>" readonly>
		  
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="no_batch">No Batch</label>
  		<input type="text" class="form-control" name="no_batch" id="no_batch" tabindex="1" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="nama_obat">Nama Obat</label>
  		<input type="text" class="form-control" name="nama_obat" id="nama_obat" tabindex="2" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="golongan">Golongan</label>
  		<select type="text" class="form-control" name="golongan" id="golongan" tabindex="3" required>
		<option value="">Silahkan Pilih Golongan</option>
		<?php $sql1="SELECT kode_golongan,golongan FROM golongan_obat "; $query1=mysql_query($sql1);  while ($data=mysql_fetch_assoc($query1))
		{
		echo "<option value=$data[kode_golongan]>$data[golongan]</option>";
		} ?>
		</select>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="jenis">Jenis</label>
  		<select type="text" class="form-control" name="jenis" id="jenis" tabindex="4" required>
		<option value="">Silahkan Pilih Jenis</option>
		<?php $sql1="SELECT kode_jenis,nama_jenis FROM jenis_obat "; $query1=mysql_query($sql1);  while ($data=mysql_fetch_assoc($query1))
		{
		echo "<option value=$data[kode_jenis]>$data[nama_jenis]</option>";
		} ?>
		</select>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="bentuk">Bentuk</label>
  		<select type="text" class="form-control" name="bentuk" id="bentuk" tabindex="5" required>
		<option value="">Silahkan Pilih Bentuk</option>
		<?php $sql1="SELECT kode_bentuk,nama_bentuk FROM bentuk_obat "; $query1=mysql_query($sql1);  while ($data=mysql_fetch_assoc($query1))
		{
		echo "<option value=$data[kode_bentuk]>$data[nama_bentuk]</option>";
		} ?>
		</select>
	</div>

	<div class="form-group">
  		<label class="control-label" for="kemasan">Kemasan</label>
  		<input type="text" class="form-control" name="kemasan" id="kemasan" tabindex="6" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="harga_kemasan">Harga Kemasan Terbesar (Rp)</label>
  		<input type="number" class="form-control" name="harga_kemasan" id="harga_kemasan" tabindex="6" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="harga_resep">Harga Jual Resep Satuan Terkecil (Rp)</label>
  		<input type="number" class="form-control" name="harga_resep" id="harga_resep" tabindex="6" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="harga_nonresep">Harga Jual Non Resep Satuan Terkecil (Rp)</label>
  		<input type="number" class="form-control" name="harga_nonresep" id="harga_nonresep" tabindex="6" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="jumlah">Jumlah</label>
  		<input type="number" class="form-control" name="jumlah" id="jumlah" tabindex="6" required>
	</div>
	
	<div class="form-group">
  		<label class="control-label" for="expired">Expired Date (Bulan-Tanggal-Tahun)</label>
  		<input type="date" class="form-control" name="expired" id="expired" tabindex="6" required>
	</div>

	
<br>
	<div class="form-group">
	<input type="submit" value="Tambah" name="tambah" class="btn btn-primary" tabindex="8">
	<a href="home.php?ref=stock" class="btn btn-danger" tabindex="9">Batal</a>
	</div>

	</form>
	</div>
</div>

</div>


</body>
</html>