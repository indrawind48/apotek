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

                <!-- Author --><br>

                
                
	
				

              <div class="well1">
                
				<!--a href="home.php?ref=add_obat" class="btn btn-default btn-sm btn-success" style="float:right;" title="Tambah Baru Obat"><span class="glyphicon glyphicon-plus"></span> Add New</a><br-->
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div-->
                  <!-- /.input-group -->
<?php
include ('libs/koneksi.php');
$cbulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$cnobl  = array("01","02","03","04","05","06","07","08","09","10","11","12");



$sql="SELECT a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter  WHERE a.tanggal LIKE '".date('Y-m-d')."%"."'  GROUP BY a.kode_pembelian";
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
	//echo $tg."<br>";	
	
	$sql="SELECT a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter  WHERE a.tanggal LIKE '".$thn."-".$bln."-".$tg."%"."'  GROUP BY a.kode_pembelian";
	$query=mysql_query($sql); 
	$cek=$tg." ".$blnc." ".$thn;
	
}	elseif(isset ($_POST['bln2']) AND ($_POST['periode']=="bulanan")) 
{
	
	$bln    = $cnobl[$_POST['bln2']];
	$blnc   = $cbulan[$_POST['bln2']];
	$thn    = $_POST['thn2']; 
	
	$sql="SELECT a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter WHERE MONTH(a.tanggal)='".$bln."' AND YEAR(a.tanggal)='".$thn."' GROUP BY a.kode_pembelian";
	$query=mysql_query($sql);
	$cek=$blnc." ".$thn;
	
} elseif (isset ($_POST['thn3']) AND ($_POST['periode']=="tahunan")) 
{
	$thn    = $_POST['thn3']; 
	
	$sql="SELECT a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter WHERE  YEAR(a.tanggal)='".$thn."' GROUP BY a.kode_pembelian";
	$query=mysql_query($sql); 
	$cek=$thn;
		
} elseif ($_POST['periode']=="semua")
{	
	$sql="SELECT a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter GROUP BY a.kode_pembelian";
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
            <select name="periode" id="periode" class="form1" style="width:95%">
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
			<h4 align="center">Laporan Fee Dokter</h4>
			<a href="home.php?ref=print_rekap_fee" class="btn btn-default btn-sm btn-primary" style="float:right;" title="Print"><span class="glyphicon glyphicon-print"></span> Print </a>
<div>Periode Data : <strong><?php echo $cek ?></strong></div><br>
					
                  <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
				  <th>Tanggal</th>
                  <th>Kode Resep</th>
                  <th>Dokter Peresep</th>
                  <th>Total Resep (Rp)</th>
                  <th>Fee (%)</th>
                  <th>Fee (Rp)</th>
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
                  <td><?php echo $row['kode_resep'] ?></td>
                  <td><?php echo $row['nama_dokter'] ?></td>
                  <td><?php echo number_format($row['total'],0,'.','.') ?></td>
                  <td><?php echo $row['fee']." %" ?></td>
                  <td><?php echo number_format($row['fee'] / 100 * $row['total'],0,'.','.') ?></td>
                  </tr>
				  
<?php 
$no++;
$total_fee += $row['fee'] / 100 * $row['total'];
 } ?>
                  </tbody>
                </table>
              </div>
                <br>
                <div style="float:right;margin-right:200px;border:1px #999999  solid;padding:10px;border-radius:5px;">
				Total Fee Yang Harus Di Bayarkan : Rp <strong><?php echo number_format($total_fee,0,'.','.') ;?></strong></div>             

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