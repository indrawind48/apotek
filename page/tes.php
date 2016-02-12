<?php
$today = date("j-n-Y");
$cbulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$cnobl  = array("01","02","03","04","05","06","07","08","09","10","11","12");
$nthm = date("Y") - 10;
$ntha = date("Y") + 10;
$nthini = date("Y");
$ntgini = date("j") -1 ;
?>
<html>
<head>
<title></title>
</head>
<body>
<select>
	<?php
	for ($ntg = 1; $ntg<=31;$ntg++) {
		if ($ntg == date("j") ) {
		echo "<option value= $ntg selected>$ntg";
		} else{
		echo "<option value= $ntg>$ntg";
		}
	}
	
	?>
  </select>
    
  <select>
	<?php
	for ($nbl = 0; $nbl<=11;$nbl++) {
		if ($nbl == date("n") - 1) {
		echo "<option value= $nbl selected> $cbulan[$nbl]";
		} else {
		echo "<option value= $nbl> $cbulan[$nbl]";
		}
	}
	?>
    </select>
    
    <select>
	<?php
	for ($nth = $nthm; $nth<=$ntha;$nth++) {
		if ($nth == date("Y")) {
		echo "<option value= $nth selected> $nth";
		} else {
		echo "<option value= $nth> $nth";
		}
	}
	?>
	</select>

</body>
</html>