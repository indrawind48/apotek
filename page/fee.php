<div class="container">

      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <!--p class="lead" align="center">Form Registrasi &amp; Obat</p-->

                <!-- Author -->

                
                
	
				

              <div class="well1">
                <h4 align="center">Fee Dokter</h4>
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
$sql=" SELECT a.tanggal,a.kode_pembelian,c.nama_dokter,c.alamat_praktek,c.telp,SUM(b.total)total,a.fee FROM dokter_fee a LEFT JOIN pembelian b ON (a.kode_pembelian)=b.kode_pembelian LEFT JOIN dokter c ON (a.kode_dokter)=c.kode_dokter GROUP BY a.kode_pembelian";
$query=mysql_query($sql);
//echo $sql;

?>
                  <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Tanggal</th>
                  <th>Kode Resep</th>
                  <th>Nama Dokter</th>
                  <th>Alamat Praktek</th>
                  <th>No Telp</th>
				  <th>Total Resep (Rp)</th>
                  <th>Fee Dokter (Rp)</th>
                  <th width="50">Action</th>   
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
                  <td><?php echo $row['alamat_praktek'] ?></td>
                  <td><?php echo $row['telp'] ?></td>
                  <td align="right"><?php echo number_format($row['total'],0,'.','.') ?></td>
                  <td align="right"><?php echo number_format($row['fee'],0,'.','.') ?></td>
                  <td align="center">
				<a title="Set Fee" name="stock" href="home.php?ref=set_fee&kode_pembelian=<?php echo $row['kode_pembelian']; ?>" class="btn btn-default btn-sm btn-success"><span class="glyphicon glyphicon-pushpin"></span></a> 
				 
				<!--a title="Edit Obat" name="update" href="home.php?ref=edit_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
									
				<a title="Delete Obat" name="delete" href="home.php?ref=del_obat&kode_obat=<?php echo $row['kode_obat']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;"class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a-->						
				  </td>
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
                    <p>Copyright &copy; Your Website 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>