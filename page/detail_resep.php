<div class="container">

      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <!--p class="lead" align="center">Form Registrasi &amp; Obat</p-->

                <!-- Author -->

<?php
include ('libs/koneksi.php');

$sql=mysql_query("SELECT kode_dokter,nama_dokter,alamat_praktek,telp,fee FROM dokter WHERE kode_dokter='".$_GET['kode_dokter']."' ");
$fetch=mysql_fetch_assoc($sql);


?>                
	
				

              <div class="well1">
                <h4 align="center">Detail Resep Masuk</h4>
				<div style="font-size:16px;">Nama Dokter : <?php echo $fetch['nama_dokter'] ?></div>
				<div style="font-size:16px;">Fee : <?php echo $fetch['fee']." %" ?></div>
				
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div--><br>
                  <!-- /.input-group -->
<?php
//include ('libs/koneksi.php');

$sql="SELECT a.kode_dokter,a.tanggal,a.kode_resep,a.kode_pembelian,c.nama_dokter,c.fee,SUM(b.total)total,SUM(c.fee/100*b.total)fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter WHERE a.kode_dokter='".$_GET['kode_dokter']."' GROUP BY a.kode_pembelian";
$query=mysql_query($sql);
//echo $sql;

?>

                  <table id="example11" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Tanggal Resep Masuk</th>
                  <th>Kode Resep</th>
                  <th>Total Resep</th>
                  <th>Fee Rupiah</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$no=1;
while ($row=mysql_fetch_assoc($query)) {
?>
                  <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['tanggal'] ?></td>
                  <td><?php echo $row['kode_resep'] ?></td>
                  <td><?php echo "Rp. ".number_format($row['total'],0,'.','.') ?></td>
                  <td><?php echo "Rp. ".number_format($row['fee'],0,'.','.') ?></td>
                  <!--td align="center">
				<a title="Tambah Stock" name="stock" href="home.php?ref=stock_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-warning"><span class="glyphicon glyphicon-pushpin"></span></a> 
				 
				<a title="Edit Obat" name="update" href="home.php?ref=edit_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
									
				<a title="Delete Obat" name="delete" href="home.php?ref=del_obat&kode_obat=<?php echo $row['kode_obat']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;"class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>						
				  </td-->
                  </tr>
<?php $no++;
$total_fee += $row['fee'] ;
 } ?>
                  </tbody>
                </table>
				<a href="home.php?ref=dokter" class="btn btn-default btn-sm btn-warning"  title="Back"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
              </div>
                
                 
                <div style="float:right;border:1px #999999  solid;padding:10px;border-radius:5px;">
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