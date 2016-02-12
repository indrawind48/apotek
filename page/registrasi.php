<?php
include ('libs/koneksi.php');
?>
<style>
.form1 {
padding:3px;height:30px;width:200px;border:1px solid grey;
}
</style>
<div class="container">

      <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <p class="lead" align="center">Form Registrasi &amp; Obat</p>

                <!-- Author -->

                <hr>

                <!-- Date/Time -->
				<form role="form" method="POST">
               <div >
               <div>
               
               <div class="col-md-2">No Resep</div><div class="col-md-4" >
			   <select class="form1" name="k_resep" type="text"  tabindex="1" style="width:20%" required>
			   <?php 
			   $d = date('l'); 
					if  ($d =='Monday') {
					echo "<option value=S>S</option>";
					}elseif  ($d =='Tuesday') {
					echo "<option value=SE>SE</option>";
					}elseif  ($d =='Wednesday') {
					echo "<option value=R>R</option>";
					}elseif  ($d =='Thursday') {
					echo "<option value=K>K</option>";
					}elseif  ($d =='Friday') {
					echo "<option value=J>J</option>";
					}elseif  ($d =='Saturday') {
					echo "<option value=SU>SU</option>";
					}elseif  ($d =='Sunday') {
					echo "<option value=M>M</option>";
					}
			    ?>
			   </select>
				<?php
				$qa=mysql_query("SELECT MAX(kode_resep) AS mix FROM dokter_fee WHERE tanggal LIKE '".date('Y-m-d')."%' ");
				$da=mysql_fetch_assoc($qa);
				$mix=$da['mix'];
				if (substr($mix,0,2) == "SU")
				{
				$nu =substr($mix,2, 5);
				}else if (substr($mix,0,2) == "SE")
				{
				$nu =substr($mix,2, 5);
				} else
				{
				$nu =substr($mix,1, 4);
				}
				$nu++;
				//echo $nu;
						if($nu == 0) 
						{
						$ni = sprintf($nu+1);
						}
						else
						{
						$ni =  sprintf($nu);
						} 
				?>
			   <input class="form1" name="kode_resep" type="text" value="<?php echo $ni;  ?>" tabindex="1" style="width:36%" required>
			   
			   </div>
               <!--div class="col-md-2">Kode</div><div class="col-md-4"><input class="form1" name="kode" type="text" value="<?php $thn=substr(date('Y'),3,1); echo $thn; echo date('mdHis')   ?>"  readonly required></div-->
               <input class="form1" name="kode" type="hidden" value="<?php $thn=substr(date('Y'),3,1); echo $thn; echo date('mdHis')   ?>"  readonly required>
               <div class="col-md-3">Tanggal Order</div><div class="col-md-3"><input class="form1" name="tanggal" type="text" value="<?php echo date('Y-m-d') ?>" readonly></div>
               </div><br><br>
               <div>
              	<div class="col-md-2">Nama</div><div class="col-md-4"><input class="form1" name="nama" type="text" tabindex="1" required></div>
                <div class="col-md-3">Alamat</div><div class="col-md-3"><textarea style="padding:3px;height:50px;width:200px;border:1px solid grey;" name="alamat" type="text" tabindex="4" required></textarea></div>
				</div><br><br>
                <div>
                <div class="col-md-2">Umur</div><div class="col-md-4"><input class="form1" name="umur" type="number" tabindex="2" required></div>
                <div class="col-md-3">No Hp</div><div class="col-md-3"><input class="form1" name="no_hp" type="number" maxlength="12" tabindex="5" required></div>
				</div><br><br><br>
				<div>
				<div class="col-md-2">Jenis Kelamin</div><div class="col-md-4"><select class="form1" name="jenis_kelamin" tabindex="3"><option value="" hidden>Pilih Jenis Kelamin</option><option value="pria" required>Pria</option><option value="wanita">Wanita</option></select></div>
				</div>
				<div class="col-md-3">Dokter Yang Meresep </div><div class="col-md-3"><select class="form1"  name="dokter"  tabindex="6" required><option value="" hidden>Pilih Dokter</option>
				<?php
				$que=mysql_query("SELECT kode_dokter,nama_dokter FROM dokter");
				while ($data=mysql_fetch_assoc($que)) {
				echo "<option value=$data[kode_dokter]>$data[nama_dokter]</option>";
				}
				?>
				</select></div>
               </div>
               <br>
                <hr>
                
<?php

$kdobat=implode(",",$_POST['item']);
$jumlah=implode(",",$_POST['jumlah_item']);

if(isset($_POST['submit']))
{
$sql="INSERT INTO konsumen (tanggal,kode_pembelian,nama_konsumen,umur,jenis_kelamin,alamat,telp,kode_dokter,biaya_racikan) VALUES ('".$_POST['tanggal']."','".$_POST['kode']."','".$_POST['nama']."','".$_POST['umur']."','".$_POST['jenis_kelamin']."','".$_POST['alamat']."','".$_POST['no_hp']."','".$_POST['dokter']."','".$_POST['biaya_racikan']."')";
$query=mysql_query($sql);

$sql="INSERT INTO dokter_fee (tanggal,kode_resep,kode_pembelian,kode_dokter) VALUES (CURRENT_TIMESTAMP,'".$_POST['k_resep'].$_POST['kode_resep']."','".$_POST['kode']."','".$_POST['dokter']."')";
$query=mysql_query($sql);

$sql="INSERT INTO pembelian_array (tanggal,kode_pembelian,kode_obat,jumlah) VALUES ('".$_POST['tanggal']."','".$_POST['kode']."','".$kdobat."','".$jumlah."') ";
$query=mysql_query($sql);
//echo $sql;
/*
$count=3;
	for($i=0;$i<$count;$i++){
		
		
	$sql="insert into pembelian_jumlah (tanggal,kode_pembelian,kode_obat,jumlah) values ('".$_POST['tanggal']."','".$_POST['kode']."','".$_POST['item'][$i]."','".$_POST['jumlah_item'][$i]."') ";
	$query=mysql_query($sql);
	echo $sql; 	
	}
	*/
echo "<script language=javascript>parent.location.href='home.php?ref=cetak_mini';</script>";

}
?>				
				

              <div class="well" id="cari_obat">
                <h4 align="center">Cari Obat</h4>
                  <!--div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"> <span class="glyphicon glyphicon-search"></span> </button>
                    </span> 
                    </div--><br>
                  <!-- /.input-group -->
<?php
include ('libs/koneksi.php');

$sql=mysql_query("UPDATE obat a, stock_keluar b SET a.jumlah=a.jumlah-b.stock_keluar WHERE a.kode_obat=b.kode_obat AND tag='Y'");

$sql=mysql_query("UPDATE stock_keluar set tag='N' ");

$sql="SELECT a.kode_obat,a.no_batch,a.nama_obat,b.golongan,c.nama_jenis,d.nama_bentuk,a.harga_resep,a.jumlah FROM obat a LEFT JOIN golongan_obat b ON (a.kode_golongan)=b.kode_golongan LEFT JOIN jenis_obat c ON (a.kode_jenis)=c.kode_jenis LEFT JOIN bentuk_obat d ON (a.kode_bentuk)=d.kode_bentuk  WHERE a.jumlah > 0 GROUP BY a.kode_obat";
$query=mysql_query($sql);
//echo $sql;

//semen2
$m=mysql_query("SELECT tanggal,kode_pembelian,kode_obat,jumlah FROM pembelian_array");
	while ($rw=mysql_fetch_array($m)) {
	$tgl = $rw['tanggal'];
	$reg = $rw['kode_pembelian'];
	$jmlh = explode(',',$rw['jumlah']);
	$para = explode(',',$rw['kode_obat']);
	$pp = count($para);
	//echo $para;
	$indeks=0; 
while($indeks < count($para)){ 
//echo $para[$indeks]; 
//echo "<br>";
$sql1="insert ignore pembelian (tanggal,kode_obat,kode_pembelian,jumlah) values ('".$tgl."','".$para[$indeks]."','".$reg."','".$jmlh[$indeks]."')";
$query1=mysql_query($sql1);
//echo $sql1;



$indeks++; 
}}
$sql2=mysql_query("UPDATE pembelian a, obat b SET a.harga_satuan=b.harga_resep WHERE a.kode_obat = b.kode_obat AND a.kode_pembelian ='".$_POST['kode']."' ");
$sql3=mysql_query("UPDATE pembelian SET total= jumlah * harga_satuan where kode_pembelian ='".$_POST['kode']."'");

?>
                  <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th width="10">No</th>
                  <th>Nama</th>
                  <th>Golongan</th>
                  <th>Jenis</th>
                  <th>Bentuk</th>
                  <th>Harga (Rp)</th>
                  <th>Stock</th>
                  <th width="15">Action</th>   
                  </tr>
                  </thead>
                  <tbody>
<?php
$no=1;
while ($row=mysql_fetch_assoc($query)) {
?>
                  <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['nama_obat'] ?></td>
                  <td><?php echo $row['golongan'] ?></td>
                  <td><?php echo $row['nama_jenis'] ?></td>
                  <td><?php echo $row['nama_bentuk'] ?></td>
                  <td><?php echo number_format($row['harga_resep'],0,'.','.') ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                  <td align="center">
				<input  id="chk<?php echo $no; ?>" type="checkbox" value="<?php echo $row['kode_obat']; ?>" data="<?php echo $row['kode_obat']; ?>" data2="<?php echo $row['nama_obat']; ?>" data3="<?php echo number_format($row['harga_resep'],0,'.','.'); ?>" price="<?php echo $row['harga_resep']; ?>" jumlah="<?php echo $row['jumlah']; ?>" class="btn btn-default btn-sm btn-success "><!--span class="glyphicon glyphicon-plus"></span--> 								
				  </td>
                  </tr>
<?php $no++; } ?>
                  </tbody>
                </table>
              </div>
                
              <div class="well">
                    <h4>Informasi Penjualan :</h4>
                    <!--form role="form" method="POST"-->
                        <div class="form-group">
                  
					<div style="padding:3px;overflow:auto;width:auto;height:250px;border:0px solid grey">
					<table  class="mtable table table-bordered table-striped" >
                  <thead>
                  <tr>
				  <th>Kode Obat</th>
                  <th>Nama</th>
                  <th>Harga (Rp)</th>
                  <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
				  <tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td></td>
				  </tr>
					 </tbody>
                </table>
				<div id="output" style="padding-left:20px;">
					</div>
					</div>
					<div style="float:right"> Biaya Racikan : <input name="biaya_racikan" type="number" id="biaya_racikan"  value="0"></div><br><br>
					<div style="float:right"> <strong>Rp Total :</strong> <input type="text" id="total_biaya"  value="0" readonly></div>
                      </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        <button id="reset" name="reset" type="reset" class="btn btn-danger">Reset</button>
                    </form>
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