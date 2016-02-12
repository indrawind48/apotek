<style type="text/css">		
			
			body {
				padding-top: 20px;
				padding-bottom: 40px;
				font-size: 0.8em;
				color:#333;
			}

</style>
<div class="container">

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
$sql=" SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter GROUP BY a.kode_pembelian ";
$query=mysql_query($sql);
//echo $sql;

if(isset($_POST['tanggal']) AND ($_POST['periode']=="semua"))
{	
	$sql="SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter GROUP BY a.kode_pembelian";
	$query=mysql_query($sql); 
	$cek=$_POST['periode'];
	
}	elseif(isset($_POST['tanggal']) AND ($_POST['periode']=="harian"))
{
	$sql="SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter  WHERE a.tanggal LIKE '".$_POST['tanggal']."%"."'  GROUP BY a.kode_pembelian";
	$query=mysql_query($sql); 
	$cek=$_POST['tanggal'];
	
} elseif (isset ($_POST['tanggal']) AND ($_POST['periode']=="bulanan")) 
{
	$bln=substr($_POST['tanggal'],5,2);
	$thn=substr($_POST['tanggal'],0,4);
	$sql="SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter WHERE MONTH(a.tanggal)='".$bln."' AND YEAR(a.tanggal)='".$thn."' GROUP BY a.kode_pembelian";
	$query=mysql_query($sql);
	$cek=$_POST['periode']." (".$bln." - ".$thn.")";	
		
} elseif (isset ($_POST['tanggal']) AND ($_POST['periode']=="tahunan")) 
{
	$thn=substr($_POST['tanggal'],0,4);
	$sql="SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,SUM(b.total)total,c.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter WHERE  YEAR(a.tanggal)='".$thn."' GROUP BY a.kode_pembelian";
	$query=mysql_query($sql); 
	$cek=$_POST['periode']." (".$thn.")";
}

?>
			<div align="center" style="font-size:1.5em">Laporan Rekap Fee</div><br>
					
                  <table id="example11" class="table  table-striped" >
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
                  <td><?php echo $row['kode_pembelian'] ?></td>
                  <td><?php echo $row['nama_dokter'] ?></td>
                  <td><?php echo number_format($row['total'],0,'.','.') ?></td>
                  <td><?php echo $row['fee']." %" ?></td>
                  <td><?php echo number_format($row['fee'] / 100 * $row['total'],0,'.','.') ?></td>
                  </tr>
<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
     <script>
		window.load = print_d();
		function print_d(){
			window.print();
			window.location.href = 'home.php?ref=rekap_fee';
		}
	</script>         
                             

                <!-- Posted Comments -->

            <!-- Comment --><!-- Comment --></div>

        <!-- Blog Sidebar Widgets Column --></div>
        <!-- /.row --><!-- Footer -->
        <!--footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; OpenCode 2015</p>
                </div>
            </div>
            <!-- /.row >
        </footer-->

    </div>