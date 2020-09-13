<?php
	$username = "Oliver Vahar";
	$fulltimenow = date("d.m.Y H:i:s");
	$hournow = date("H");
	$partofday = "lihtsalt aeg";
	if($hournow < 6){
		$partofday = "uneaeg";
	}// enne 6
	if($hournow >= 6 and $hournow < 8){
		$partofday = "ülikooli mineku aeg";
	}
	if($hournow >= 8 and $hournow <= 16){
		$partofday = "õppimise aeg";
	}
	if($hournow > 16 and $hournow <= 22){
		$partofday = "puhkamise või kodutööde tegemise aeg";
	}
	if($hournow > 22 and $hournow < 24){
		$partofday = "peaaegu uneaeg";
	}
	
	//vaatame semestri kulgemist
	$semesterstart = new DateTime("2020-8-31");
	$semesterend = new DateTime("2020-12-13");
	$semesterduration = $semesterstart->diff($semesterend);
	$semesterdurationdays = $semesterduration->format("%r%a");
	$today = new DateTime("now");
	
	$semesternow = $semesterstart->diff($today);
	$semesternowdays = $semesternow->format("%r%a");
	$semesternowsent = "Esimese semestri algusest on möödas ";
	$semesternowsentday = " päeva.";
	if($semesternowdays < -1){
		$semesternowsent = "Semestri alguseni on ";
	}
	if($semesternowdays == -1){
		$semesternowsent = "Semestri alguseni on ";
		$semesternowsentday = " päev.";
	}
	if($semesternowdays == 0){
		$semesternowsent = "Täna algas semester.";
		$semesternowsentday = "";
		$semesternowdays = "";
	}
	if($semesternowdays == 1){
		$semesternowsent = "Esimese semestri algusest on möödas ";
		$semesternowsentday = " päev.";
		$semesternowdays = "1";
	}
	if($semesternowdays > 1){
		$semesternowsent = "Esimese semestri algusest on möödas ";
		$semesternowsentday = " päeva.";
	}
	if($semesternowdays > 104){
		$semesternowsent = "Esimene semester on lõppenud.";
		$semesternowsentday = "";
		$semesternowdays = "";
	}
	if($semesternowdays < 0){
		$semesternowdays = substr($semesternowdays, 1);
	}
	
	
	$semesterprot = 0;
	
	if ($semesternowdays > 0){
		$semesterprot = $semesternowdays / $semesterduration;
	}
	if ($semesternowdays > 104){
		$semesterprot = 100;
	}
?>
<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title><?php echo $username; ?> programmeerib veebi</title>

</head>
<body>
  <h1>Oliver Vahar</h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See konkreetne leht on loodud veebiprogrammeerimise kursusel aasta 2020 sügissemestril <a href="https://www.tlu.ee/">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>See tekst on lisatud koduarvutist.</p>
  <p>Lehe avamise hetk: <?php echo $fulltimenow; ?>.</p>
  <p><?php echo "Praegu on " .$partofday ."."; ?></p>
  <p><?php echo "Esimene semester kestab " .$semesterdurationdays ." päeva." ?></p>
  <p><?php echo $semesternowsent .$semesternowdays .$semesternowsentday ?></p>
  <p><?php echo "Semestri õppetööst on tehtud: " .$semesterprot ."%" ?></p>
</body>
</html>