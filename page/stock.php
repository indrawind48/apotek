<div class="container">

      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <!--p class="lead" align="center">Form Registrasi &amp; Obat</p-->

                <!-- Author -->

                
	
				

              <div class="well1">
                <h4 align="center">Stock Obat</h4>
				<a href="home.php?ref=add_obat" class="btn btn-default btn-sm btn-success" style="float:right;" title="Tambah Baru Obat"><span class="glyphicon glyphicon-plus"></span> Add New</a><br>
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div--><br>
                  <!-- /.input-group -->
<?php
include ('libs/koneksi.php');


$sql="  SELECT a.kode_obat,a.no_batch,a.nama_obat,b.golongan,c.nama_jenis,d.nama_bentuk,a.kemasan,a.harga_kemasan,a.harga_resep,a.harga_nonresep,a.jumlah,a.expired FROM obat a LEFT JOIN golongan_obat b ON (a.kode_golongan)=b.kode_golongan LEFT JOIN jenis_obat c ON (a.kode_jenis)=c.kode_jenis LEFT JOIN bentuk_obat d ON (a.kode_bentuk)=d.kode_bentuk  GROUP BY a.kode_obat";
$query=mysql_query($sql);
//echo $sql;

?>
                  <table id="example1" class="table table-bordered table-striped" style="font-size:0.85em">
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Kode Obat</th>
                  <th>No Batch</th>
                  <th>Nama</th>
                  <th>Golongan</th>
                  <th>Jenis</th>
                  <th>Bentuk</th>
                  <th>Kemasan</th>
                  <th>H.Kemasan</th>
                  <th>H.Resep</th>
                  <th>H.Non Resep</th>
                  <th>Stock</th>
				  <th>Expired</th>
                  <th width="100">Action</th>   
                  </tr>
                  </thead>
                  <tbody>
<?php
$no=1;
while ($row=mysql_fetch_assoc($query)) {
?>
                  <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['kode_obat'] ?></td>
                  <td><?php echo $row['no_batch'] ?></td>
                  <td><?php echo $row['nama_obat'] ?></td>
                  <td><?php echo $row['golongan'] ?></td>
                  <td><?php echo $row['nama_jenis'] ?></td>
                  <td><?php echo $row['nama_bentuk'] ?></td>
                  <td><?php echo $row['kemasan'] ?></td>
                  <td><?php echo number_format($row['harga_kemasan'],0,'.','.') ?></td>
                  <td><?php echo number_format($row['harga_resep'],0,'.','.') ?></td>
                  <td><?php echo number_format($row['harga_nonresep'],0,'.','.') ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                  <td><?php echo $row['expired'] ?></td>
		          <!--td><?php //echo "<a href=home.php?ref=detail_stock&kode_obat=$row[kode_obat]>Detail</a>"; ?></td-->		  
                  <td align="center">
				<!--a title="Tambah Stock" name="stock" href="home.php?ref=stock_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-warning"><span class="glyphicon glyphicon-pushpin"></span></a--> 
				 
				<a title="Edit Obat" name="update" href="home.php?ref=edit_obat&kode_obat=<?php echo $row['kode_obat']; ?>" class="btn btn-default btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
									
				<a title="Delete Obat" name="delete" href="home.php?ref=del_obat&kode_obat=<?php echo $row['kode_obat']; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;"class="btn btn-default btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>						
				  </td>
                  </tr>
<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
                
                             

                <!-- Posted Comments -->
				<br><br>
				<div style="color:red;"><u>Obat Yang Akan Mendekati Tanggal Kardaluarsa Dalam Sebulan :</u></div><br>
			<div class="well col-lg-7" style="padding:3px;overflow:auto;width:auto;height:250px;border:0px solid grey">
			<table id="example11" class="table  table-striped " >
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Tanggal Kardaluarsa</th>
				  <th>Sisa Hari</th>
                  </tr>
                  </thead>
                  <tbody>
	<?php 
		$sq=mysql_query("SELECT kode_obat,nama_obat,expired,DATEDIFF(expired,CURRENT_DATE)selisih FROM obat WHERE expired < CURRENT_DATE + INTERVAL 30 DAY ORDER BY expired");
		$no1=1;
		while ($data=mysql_fetch_assoc($sq)) {
		?>		
					<tr>
					<td><?php echo $no1; ?></td>
					<td><?php echo $data['kode_obat']; ?></td> 
					<td><?php echo $data['nama_obat']; ?></td> 
					<td><?php echo $data['expired']; ?></td> 
					<td><?php echo $data['selisih']; ?></td> 
					</tr>
				  
		<?php $no1++; } ?>		  
				  </tbody>
				  </table>
			
			</div>
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