<div class="container">

      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <!--p class="lead" align="center">Form Registrasi &amp; Obat</p-->

                <!-- Author -->

                
	
				

              <div class="well1">
                <h4 align="center">Detail Stock Obat</h4>
				<a href="home.php?ref=stock" class="btn btn-default btn-sm btn-warning"  title="Back"><span class="glyphicon glyphicon-arrow-left"></span> Back</a><br>
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div--><br>
                  <!-- /.input-group -->
<?php
include ('libs/koneksi.php');

$sql="  SELECT tanggal,no_batch,kode_obat,nama_obat,stock_masuk,kardaluarsa FROM stock_masuk WHERE kode_obat='".$_GET['kode_obat']."'";
$query=mysql_query($sql);
//echo $sql;

?>
                  <table id="example11" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Tanggal Obat Masuk</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Stock Masuk</th>
                  <th>No Batch</th>
                  <th>Tanggal Kardaluarsa</th>
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
                  <td><?php echo $row['kode_obat'] ?></td>
                  <td><?php echo $row['nama_obat'] ?></td>
                  <td><?php echo $row['stock_masuk'] ?></td>
                  <td><?php echo $row['no_batch'] ?></td>
                  <td><u><?php echo $row['kardaluarsa'] ?></u></td>
                  <!--td align="center">
				<a title="Tambah Stock" name="stock" href="home.php?ref=stock_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-warning"><span class="glyphicon glyphicon-pushpin"></span></a> 
				 
				<a title="Edit Obat" name="update" href="home.php?ref=edit_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
									
				<a title="Delete Obat" name="delete" href="home.php?ref=del_obat&kode_obat=<?php echo $row['kode_obat']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;"class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>						
				  </td-->
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