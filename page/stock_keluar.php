<div class="container">
<style>
.form1 {
padding:3px;height:30px;width:70px;border:1px solid grey;
}
</style>
      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <!--p class="lead" align="center">Form Registrasi &amp; Obat</p-->

                <!-- Author -->

                
                
	
				

              <div class="well1">
                
				<!--a href="home.php?ref=add_obat" class="btn btn-default btn-sm btn-success" style="float:right;" title="Tambah Baru Obat"><span class="glyphicon glyphicon-plus"></span> Add New</a><br-->
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div--><br>
                  <!-- /.input-group -->
<?php
include ('libs/koneksi.php');
$cbulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$cnobl  = array("01","02","03","04","05","06","07","08","09","10","11","12");

$sql=" SELECT a.tanggal,b.kode_obat,b.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_keluar,CASE WHEN f.kode_pembelian IS NOT NULL THEN  b.harga_resep*a.stock_keluar WHEN f.kode_pembelian IS NULL THEN b.harga_nonresep*a.stock_keluar END total_harga,CASE WHEN f.kode_pembelian IS NULL THEN 'Jual Non Resep' WHEN f.kode_pembelian IS NOT NULL THEN 'Jual Resep' END keterangan FROM stock_keluar a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk LEFT JOIN konsumen f ON (a.kode_pembelian)=f.kode_pembelian WHERE a.tanggal LIKE '".date('Y-m-d')."%"."'";
$query=mysql_query($sql);
$cek="Hari Ini";
$period_txt="Total Penjualan Hari Ini";

if(isset($_POST['tgl1']) AND ($_POST['periode']=="harian"))
{
	$tgl    = $_POST['tgl1'];
	$bln    = $cnobl[$_POST['bln1']];
	$blnc   = $cbulan[$_POST['bln1']];
	$thn    = $_POST['thn1']; 

	if($tgl<=9){
		$tg="0".$tgl;
		}else{
		$tg=$tgl;
		}		
	$sql="SELECT a.tanggal,b.kode_obat,b.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_keluar,CASE WHEN f.kode_pembelian IS NOT NULL THEN  b.harga_resep*a.stock_keluar WHEN f.kode_pembelian IS NULL THEN b.harga_nonresep*a.stock_keluar END total_harga,CASE WHEN f.kode_pembelian IS NULL THEN 'Jual Non Resep' WHEN f.kode_pembelian IS NOT NULL THEN 'Jual Resep' END keterangan FROM stock_keluar a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk LEFT JOIN konsumen f ON (a.kode_pembelian)=f.kode_pembelian WHERE a.tanggal LIKE '".$thn."-".$bln."-".$tg."%"."'";
	$query=mysql_query($sql); 
	$cek=$tg." ".$blnc." ".$thn;
	$period_txt="Total Penjualan Tanggal ".$cek;
	
} elseif(isset ($_POST['bln2']) AND ($_POST['periode']=="bulanan")) 
{
	
	$bln    = $cnobl[$_POST['bln2']];
	$blnc   = $cbulan[$_POST['bln2']];
	$thn    = $_POST['thn2']; 
	
	$sql="SELECT a.tanggal,b.kode_obat,b.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_keluar,CASE WHEN f.kode_pembelian IS NOT NULL THEN  b.harga_resep*a.stock_keluar WHEN f.kode_pembelian IS NULL THEN b.harga_nonresep*a.stock_keluar END total_harga,CASE WHEN f.kode_pembelian IS NULL THEN 'Jual Non Resep' WHEN f.kode_pembelian IS NOT NULL THEN 'Jual Resep' END keterangan FROM stock_keluar a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk LEFT JOIN konsumen f ON (a.kode_pembelian)=f.kode_pembelian WHERE MONTH(a.tanggal)='".$bln."' AND YEAR(a.tanggal)='".$thn."'";
	$query=mysql_query($sql);
	$cek=$blnc." ".$thn;
	$period_txt="Total Penjualan Bulan ".$cek;	
		
} elseif (isset ($_POST['thn3']) AND ($_POST['periode']=="tahunan")) 
{
	$thn    = $_POST['thn3']; 
	
	$sql="SELECT a.tanggal,b.kode_obat,b.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_keluar,CASE WHEN f.kode_pembelian IS NOT NULL THEN  b.harga_resep*a.stock_keluar WHEN f.kode_pembelian IS NULL THEN b.harga_nonresep*a.stock_keluar END total_harga,CASE WHEN f.kode_pembelian IS NULL THEN 'Jual Non Resep' WHEN f.kode_pembelian IS NOT NULL THEN 'Jual Resep' END keterangan FROM stock_keluar a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk LEFT JOIN konsumen f ON (a.kode_pembelian)=f.kode_pembelian WHERE  YEAR(a.tanggal)='".$thn."'";
	$query=mysql_query($sql); 
	$cek=$thn;
	$period_txt="Total Penjualan Tahun ".$cek;
} elseif ($_POST['periode']=="semua")
{
	$sql="SELECT a.tanggal,b.kode_obat,b.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_keluar,CASE WHEN f.kode_pembelian IS NOT NULL THEN  b.harga_resep*a.stock_keluar WHEN f.kode_pembelian IS NULL THEN b.harga_nonresep*a.stock_keluar END total_harga,CASE WHEN f.kode_pembelian IS NULL THEN 'Jual Non Resep' WHEN f.kode_pembelian IS NOT NULL THEN 'Jual Resep' END keterangan FROM stock_keluar a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk LEFT JOIN konsumen f ON (a.kode_pembelian)=f.kode_pembelian";
	$query=mysql_query($sql);
	$cek="Semua Data";
	$period_txt="Total Penjualan Semua Data";
}
?>
			<form id="form_input" method="POST">	
			<table width="380" border="0">
            <tr>
            <td width="70">Periode</td>
            <td width="300">
            <select name="periode" id="periode" class="form-control" style="width:95%">
				<option hidden >Silahkan pilih</option>
				<option value="harian">Harian</option>
				<option value="bulanan">Bulanan</option>
				<option value="tahunan">Tahunan</option>
				<option value="semua">Semua</option>
			</select>
            </td>
			<td></td>
			<td>  <span class="form-group">
                <input type="submit" value="Filter" name="filter" class="btn btn-primary">
              </span> </td>
            </tr>
			<tr>
			<td >&nbsp; </td>
			<td >&nbsp; </td>
			</tr>
            <tr >
            <td ></td>
            <td>
			<div id="output"></div>
			<!--input type="text" class="form-control form_date " data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>" style="width:50%"-->
			</td>
            </tr>
            
            </table>
			</form>
			<h4 align="center">Laporan Stock Keluar</h4>
			<a href="home.php?ref=print_stock_keluar" class="btn btn-default btn-sm btn-primary" style="float:right;" title="Print"><span class="glyphicon glyphicon-print"></span> Print </a>
<div>Periode Data : <strong><?php echo $cek ?></strong></div><br>
	
                  <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
				  <th>Tanggal</th>
				  <th>Kode Obat</th>
				  <th>Nama Obat</th>
				  <th>Golongan</th>
				  <th>Jenis</th>
				  <th>Bentuk</th>
                  <th width="10">Stock Keluar/Terjual</th>
                  <th>Total Harga</th>
                  <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$no=1;
$null="-";
while ($row=mysql_fetch_assoc($query)) {
?>
                  <tr>
                  <td><?php echo $no ?></td>
				  <td><?php echo $row['tanggal'] ?></td>
                  <td><?php echo $row['kode_obat'] ?></td>
                  <td><?php echo $row['nama_obat'] ?></td>
                  <td><?php echo $row['golongan'] ?></td>
                  <td><?php echo $row['nama_jenis'] ?></td>
                  <td><?php echo $row['nama_bentuk'] ?></td>
                  <td ><?php echo $row['stock_keluar'] ?></td>
                  <td ><?php echo number_format($row['total_harga'],0,'.','.') ?></td>
				  <td ><?php echo $row['keterangan'] ?></td>
                  </tr>
<?php 
$no++;
$total_keluar += $row['total_harga'];
 } ?>
                  </tbody>
                </table>
              </div>
                
                 <br>
                <div style="float:right;margin-right:200px;border:1px #999999  solid;padding:10px;border-radius:5px;">
				<?php echo $period_txt ?> : Rp <strong><?php echo number_format($total_keluar,0,'.','.') ;?></strong></div>              

                <!-- Posted Comments -->

            <!-- Comment --><!-- Comment --></div>

        <!-- Blog Sidebar Widgets Column --></div>
        <!-- /.row --><!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; OpenCode 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>