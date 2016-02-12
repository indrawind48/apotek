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


$sql=" SELECT a.tanggal,a.kode_obat,b.no_batch,a.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_masuk FROM stock_masuk a 
LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan
LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk WHERE a.tanggal LIKE '".date('Y-m-d')."%"."'";
$query=mysql_query($sql);
$cek="Hari Ini";


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
	$sql="SELECT a.tanggal,a.kode_obat,b.no_batch,a.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_masuk FROM stock_masuk a 
LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan
LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk WHERE a.tanggal LIKE '".$thn."-".$bln."-".$tg."%"."'";
	$query=mysql_query($sql); 
	$cek=$tg." ".$blnc." ".$thn;
	
} elseif(isset ($_POST['bln2']) AND ($_POST['periode']=="bulanan")) 
{
	
	$bln    = $cnobl[$_POST['bln2']];
	$blnc   = $cbulan[$_POST['bln2']];
	$thn    = $_POST['thn2']; 
	
	$sql="SELECT a.tanggal,a.kode_obat,b.no_batch,a.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_masuk FROM stock_masuk a 
LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan
LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk WHERE MONTH(a.tanggal)='".$bln."' AND YEAR(a.tanggal)='".$thn."'";
	$query=mysql_query($sql);
	$cek=$blnc." ".$thn;	
		
} elseif (isset ($_POST['thn3']) AND ($_POST['periode']=="tahunan")) 
{
	$thn    = $_POST['thn3']; 
	
	$sql="SELECT a.tanggal,a.kode_obat,b.no_batch,a.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_masuk FROM stock_masuk a 
LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan
LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk WHERE  YEAR(a.tanggal)='".$thn."'";
	$query=mysql_query($sql); 
	$cek=$thn;
} elseif ($_POST['periode']=="semua")
{
	$sql=" SELECT a.tanggal,a.kode_obat,b.no_batch,a.nama_obat,c.golongan,d.nama_jenis,e.nama_bentuk,a.stock_masuk FROM stock_masuk a 
LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN golongan_obat c ON (b.kode_golongan)=c.kode_golongan
LEFT JOIN jenis_obat d ON (b.kode_jenis)=d.kode_jenis LEFT JOIN bentuk_obat e ON (b.kode_bentuk)=e.kode_bentuk";
	$query=mysql_query($sql);
	$cek="Semua Data";
}
//echo $sql;
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
			<h4 align="center">Laporan Stock Masuk</h4>
			<a href="home.php?ref=print_stock_masuk" class="btn btn-default btn-sm btn-primary" style="float:right;" title="Print"><span class="glyphicon glyphicon-print"></span> Print </a>
<div>Periode Data : <strong><?php echo $cek ?></strong></div><br>
			
                  <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
				  <th>Tanggal</th>
				  <th>Kode Obat</th>
				  <th>No Batch</th>
				  <th>Nama Obat</th>
				  <th>Golongan</th>
				  <th>Jenis</th>
				  <th>Bentuk</th>
                  <th>Stock Masuk/Di Tambahkan</th>
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
                  <td><?php echo $row['no_batch'] ?></td>
                  <td><?php echo $row['nama_obat'] ?></td>
                  <td><?php echo $row['golongan'] ?></td>
                  <td><?php echo $row['nama_jenis'] ?></td>
                  <td><?php echo $row['nama_bentuk'] ?></td>
                  <td><?php echo $row['stock_masuk'] ?></td>
                  </tr>
<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
                
                             

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