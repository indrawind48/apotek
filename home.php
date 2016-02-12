<!DOCTYPE html>
<html lang="en">
<?php
$today = date("j-n-Y");
$cbulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$cnobl  = array("01","02","03","04","05","06","07","08","09","10","11","12");
$nthm = date("Y") - 10;
$ntha = date("Y") + 10;
$nthini = date("Y");
$ntgini = date("j") -1 ;
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Aplikasi Apotik</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php 
    //include 'page/registrasi.php';
	include 'libs/koneksi.php';

			error_reporting(0);
			$pages_dir='page'; //value directory
			if(!empty($_GET['ref'])) { //kalo ga kosong ambil link page
			$pages = scandir($pages_dir, 0); //scan directory
			unset($pages[0],$pages[1]); // hapus index[0](.) , hapus index[1] (..)
			$ref = $_GET['ref']; //link page
			if(in_array($ref.'.php',$pages)) {  //pencocokan data link page dan directory
				include($pages_dir.'/'.$ref.'.php'); //excute
			} else {
			echo 'halaman tidak di temukan'; }
			} else {
			/*include('body.php'); */ }
	 ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        
        	<!-- Menu Tampilan Mobile-->
        	<div class="navbar-header">
            	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#contoh">
                	<span class="sr-only">Toogle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Apotek Berkah</a>
            </div>
            
            <!-- Menu Tampilan Dekstop -->
            <div class="collapse navbar-collapse" id="contoh">
            	<ul class="nav navbar-nav">
                	<li><a href="home.php?ref=stock">Obat & Stock</a></li>
                    <li><a href="home.php?ref=dokter">Data Dokter Peresep</a></li>
                    <li class="dropdown">
                    	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jual<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	<li><a href="home.php?ref=jual">Jual Biasa</a></li>
                            <li><a href="home.php?ref=registrasi">Jual Dari Resep</a></li>
                            
                        </ul>
                    </li>
					<li class="dropdown">
                    	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	<li><a href="home.php?ref=stock_masuk">Laporan Stock Masuk</a></li>
                            <li><a href="home.php?ref=stock_keluar">Laporan Stock Keluar</a></li>
                            <li><a href="home.php?ref=rekap_fee">Laporan Rekap Fee Dokter</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>

    <!-- Page Content -->
    
    <!-- /.container -->
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
	
	<!--script-->
	<!--script>
	var $ver = jQuery.noConflict();
	$ver(document).ready(function() {
	$ver(".txt").each(function() {

			$ver(this).keyup(function(){
				var max = $ver(this).attr("data-max");
  					if(this.value > parseInt(max)){
    				alert("Melebihi Jumlah Stock");
            this.value = "";
			}
			});
		});
	});
	</script-->
	<script>
	var $fil = jQuery.noConflict();
	$fil(document).ready(function() {
	$fil("#periode").change(function(){
 
	dropdown = $fil('#periode').val();

        
        if (dropdown == 'harian')
        {
          $fil(document.getElementById('m2')).remove();
          $fil(document.getElementById('y2')).remove();
          $fil(document.getElementById('y3')).remove();
          $fil('<select id="d1" name="tgl1" class="form1"><?php 
				for ($ntg = 1; $ntg<=31;$ntg++) {
				if ($ntg == date("j") ) {
					echo "<option value= $ntg selected>$ntg";
				} else{
					echo "<option value= $ntg>$ntg";
				}
			} ?></select> <select id="m1" name="bln1" class="form1"><?php
				for ($nbl = 0; $nbl<=11;$nbl++) {
				if ($nbl == date("n") - 1) {
				echo "<option value= $nbl selected> $cbulan[$nbl]";
				} else {
				echo "<option value= $nbl> $cbulan[$nbl]";
				}
			} ?></select> <select id="y1" name="thn1" class="form1"><?php
				for ($nth = $nthm; $nth<=$ntha;$nth++) {
				if ($nth == date("Y")) {
				echo "<option value= $nth selected> $nth";
				} else {
				echo "<option value= $nth> $nth";
				}
			}?></select>').appendTo('#output');
        
        }
        else if (dropdown == 'bulanan') 
        {
          $fil(document.getElementById('d1')).remove();
          $fil(document.getElementById('m1')).remove();
          $fil(document.getElementById('y1')).remove();
          $fil(document.getElementById('y3')).remove();
           $fil('<select id="m2" name="bln2" class="form1"><?php
				for ($nbl = 0; $nbl<=11;$nbl++) {
				if ($nbl == date("n") - 1) {
				echo "<option value= $nbl selected> $cbulan[$nbl]";
				} else {
				echo "<option value= $nbl> $cbulan[$nbl]";
				}
			} ?></select> <select id="y2" name="thn2" class="form1"><?php
				for ($nth = $nthm; $nth<=$ntha;$nth++) {
				if ($nth == date("Y")) {
				echo "<option value= $nth selected> $nth";
				} else {
				echo "<option value= $nth> $nth";
				}
			}?></select>').appendTo('#output');
        }
        else if (dropdown == 'tahunan') 
        {
          $fil(document.getElementById('d1')).remove();
          $fil(document.getElementById('m1')).remove();
          $fil(document.getElementById('y1')).remove();
          $fil(document.getElementById('m2')).remove();
          $fil(document.getElementById('y2')).remove();
           $fil('<select id="y3" name="thn3" class="form1"><?php
				for ($nth = $nthm; $nth<=$ntha;$nth++) {
				if ($nth == date("Y")) {
				echo "<option value= $nth selected> $nth";
				} else {
				echo "<option value= $nth> $nth";
				}
			}?></select>').appendTo('#output');
        }
        else if (dropdown == 'semua') 
        {
          $fil(document.getElementById('d1')).remove();
          $fil(document.getElementById('m1')).remove();
          $fil(document.getElementById('y1')).remove();
          $fil(document.getElementById('m2')).remove();
          $fil(document.getElementById('y2')).remove();
          $fil(document.getElementById('y3')).remove();

        }
        

		});
	});
	</script>

	<script>
	var $total = jQuery.noConflict();
	$total(document).click(function(){

		//iterate through each textboxes and add keyup
		//handler to trigger sum event
		$total(".txt").each(function() {

			$total(this).keyup(function(){
				calculateSum();
				var max = $total(this).attr("data-max");
  					if(this.value > parseInt(max)){
    				alert("Melebihi Jumlah Stock");
            this.value = "";
			
			}
			});
			$total(document.getElementById('total_biaya')).value = 0;
			
			$total("#biaya_racikan").keyup(function(){
				calculateSum();
			});
		});

	});

	function calculateSum() {

		var sum = 0;
		var tt = 0;
		//iterate through each textboxes and add the values
		$total(".txt").each(function() {

			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseInt(this.value,10) * $total(this).attr("data");
			}

		});
		//fungsi biaya racikan
		
		var tt = sum + parseInt($total('#biaya_racikan').val(),10);
		//
		//.toFixed() method will roundoff the final sum to 2 decimal places
		//$("#sum").html(sum.toFixed(0));
    $total("#total_biaya").val(tt);
	}
	
	</script>
	
	<script>
	var $reset = jQuery.noConflict();
	$reset("#reset").click(function(){
	$reset('.mtable tbody tr:not(:first)').remove();
	});
	</script>
	
	<script>
	var $autosum = jQuery.noConflict();
	$autosum(document).ready(function() {
	$autosum("input[type=checkbox]").change(function(){
	//recalculate();
      if (this.checked) {
        var isi = $autosum(this).attr("data");
        var isi2 = $autosum(this).attr("data2");
        var isi3 = $autosum(this).attr("data3");
        var price = $autosum(this).attr("price");
        var jumlah = $autosum(this).attr("jumlah");
		var u = $autosum("input[sz=jl]").size() + 1;
        //$autosum('<div id="d">'+ isi +' - '+ isi2 +' - '+ isi3 + ' <input type="number" name="jumlah"> ' + '</div>').appendTo('#output');
        $autosum('.mtable tbody').append($autosum(".mtable tbody tr:last").clone());
        $autosum('.mtable tbody tr:last td:first-child').html(isi);
        $autosum('.mtable tbody tr:last td:nth-child(2)').html(isi2);
        $autosum('.mtable tbody tr:last td:nth-child(3)').html(isi3);
        $autosum('.mtable tbody tr:last td:last-child').html('<input type="hidden" name="ver" value='+ isi +'><input type="hidden" name="item[]" value='+ isi +'><input type="number" data='+ price +' class="txt" name="jumlah_item[]" id="isi' + u + '" sz="jl" data-max='+ jumlah +'>');
        
    }else{
         $autosum('.mtable tbody tr:last').remove();} 
       // $autosum('<div id="d">'+ isi2 + ':' + ' <input type="number" name="jumlah" style="width:100px;"> ' + '</div>').appendTo('#output');
		//} else {
        // $autosum(document.getElementById('d')).remove();
    //} 
	});
	/*function recalculate(){
    var sum = 0;
	var jumlah = $autosum('.isi').val();
	
    $autosum("input[type=checkbox]:checked").each(function(){
      sum += parseInt($autosum(this).attr("price"));
    });
	//  alert(sum);
	////$("#output").html(sum);
    document.getElementById('total_biaya').value = sum
	}*/
	});
	</script>	
	
	<script>
	var $jnoc = jQuery.noConflict();
	$jnoc(function() {
    $jnoc('#example1').dataTable();
    });
	</script>

</body>

</html>
