<html>
<title>Sturk Pembelian</title>
	<head>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		
		<style type="text/css">		
			
			body {
				margin-top: 0;
				padding-top: 0;
				padding-bottom: 0;
				color:#000;
			}
			.page-header {
					border: 0px solid #999;
					
			}
			.spc {
			padding:3px 0;
			}
</style>
<div class="header" >
    <div id="logo_image1"><!--img src=../images/odhea.jpg /--></div>
                <div >
						<div style="font-size:10px;font-family:arial;">Apotik Bersama<br></div>
						<div style="font-size:12px;font-family:arial;"><strong>Berkah</strong></div>
						<div style="font-size:8px;font-family:arial;">Jl. Lintas Melawi Kelurahan Ladang SINTANG</div>
						<div style="font-size:7px;font-family:arial;">Telp : 0812 5321 5471 Email : - </div>
						</div><br>
	</div>
	</head>
	<?php
	error_reporting (0);
	$date1=date('Y-m-d');
	
			include ('../libs/koneksi.php');
			//include ('../header.php');
			$sql = "SELECT b.nama_obat,a.jumlah,a.harga_satuan,a.total,c.biaya_racikan FROM pembelian a LEFT JOIN obat b ON (a.kode_obat)=b.kode_obat LEFT JOIN konsumen c ON (a.kode_pembelian)=c.kode_pembelian WHERE a.tag='Y'";
			$query = mysql_query($sql) or die(mysql_error());
				//echo $sql;
			$null="";
			
			
			?>
	<body>
	
		<div class='col-md-4' style="margin-left:0;padding-left:0;">
			<h4 align="center" style="font-family:arial;font-size:10px;"><strong>Struk Pembelian</strong></h4>
			<table style="max-height:10px" cellpadding="0" cellspacing="0"  class="table">
				<thead  style="font-size:10px;">
					<td><b>Nama Item</b></td>
					<td><b>Harga</b></td>
					<td><b> </b></td>
					<td><b>Sub Total</b></td>
				<tbody  style="font-size:10px;">
					<?php
while($rows=mysql_fetch_object($query)){
//$total ="";
$total +=$rows -> total;
$biaya_racikan = $rows -> biaya_racikan;
					?>

					<tr>
						<td><?php		echo $rows -> nama_obat."<br>".$rows -> jumlah."   x" ?></td>
						<td><?php		echo "<br>".number_format($rows -> harga_satuan,0,'.','.') ?></td>
						<td><?php		echo $null ?></td>
						<td align="right"><?php		echo "<br>".number_format($rows -> total,0,'.','.') ?></td>
					</tr>
					<?php
}?>		
				</tbody>
			</table>
			<hr>
		<div  style=font-size:10px;font-family:arial;padding-left:20px;width:60%;text-align:right;float:left;>Biaya Racikan  :</div>
		<div  style=font-size:10px;font-family:arial;width:20%;text-align:right;float:right;padding-right:40px;><?php echo number_format($biaya_racikan,0,'.','.'); ?></div><br>
		<div  style=font-size:10px;font-family:arial;padding-left:20px;width:60%;text-align:right;float:left;>Total  :</div>
		<div  style=font-size:10px;font-family:arial;width:20%;text-align:right;float:right;padding-right:40px;><?php echo number_format($total+$biaya_racikan,0,'.','.'); ?></div><br>
		<!--div class=span5 style=font-size:16px;font-family:arial;width:40%;color:#333;float:right;padding-right:20px;text-align:right;>Sub Total :  400.000</div><br>
		<div class=span5 style=font-size:16px;font-family:arial;width:40%;color:#333;float:right;padding-right:20px;text-align:right;>Discount :  000.000</div><br>
		<div class=span5 style=font-size:16px;font-family:arial;width:40%;color:#333;float:right;padding-right:20px;text-align:right;>Total :  400.000</div><br-->
		<br>
		<div  style=font-size:7px;font-family:arial;>Terima Kasih Telah Melakukan Pembelian , Silahkan Cek Struk Kembali</div>
		<?php 
		$sql="update pembelian set  tag='N'";
		$query=mysql_query($sql);
			?>
		<script>
		window.load = print_d();
		function print_d(){
			window.print();
			window.location.href = 'home.php?ref=registrasi';
		}
	</script>
	</body>
</html>
