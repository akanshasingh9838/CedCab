<?php
	// $values=$_POST['values'];
	// echo json_encode($values);
	// print_r($values);
	$fare=0;
	$pickup=$_POST['pickup'];
	$drop=$_POST['drop'];
	$cabtype=$_POST['cabtype'];
	$luggage=$_POST['luggage'];

	$distance=array(
		"charbagh"=>"0",
		"IndiraNagar"=>"10",
		"bbd"=>"30",
		"barabanki"=>"60",
		"faizabad"=>"100",
		"basti"=>"150",
		"gorakhpur"=>"210",
	);
	$TotalDistance= abs($distance[$drop] - $distance[$pickup]);

	if($cabtype=="CedMicro"){
		$fare+=50;
		if($TotalDistance<=10){
			$fare+=$TotalDistance*13.50;
		}
		else if($TotalDistance>10 && $TotalDistance<=60){
			$fare+=10*13.5;
			$fare+=($TotalDistance-10)*12.0;
		}
		else if($TotalDistance>60 && $TotalDistance<=160){
			$fare+=(10*13.5)+(50*12.0);
			$fare+=($TotalDistance-60)*12.0;
		}
		else{
			$fare+=(10*13.5)+(50*12.0)+(100*10.20);
			$fare+=($TotalDistance-160)*8.50;
		}
		// echo $fare;
	}

	elseif($cabtype=="CedMini"){
		$fare+=150;
		if($TotalDistance<=10){
			$fare+=$TotalDistance*14.50;
		}
		else if($TotalDistance>10 && $TotalDistance<=60){
			$fare+=10*14.50;
			$fare+=($TotalDistance-10)*13.0;
		}
		else if($TotalDistance>60 && $TotalDistance<=160){
			$fare+=(10*14.50)+(50*13.0);
			$fare+=($TotalDistance-60)*11.20;
		}
		else{
			$fare+=(10*14.50)+(50*13.0)+(100*11.20);
			$fare+=($TotalDistance-160)*9.50;
		}
		// echo $fare;
	}

	elseif($cabtype=="CedRoyal"){
		$fare+=200;
		if($TotalDistance<=10){
			$fare+=$TotalDistance*15.50;
		}
		else if($TotalDistance>10 && $TotalDistance<=60){
			$fare+=10*15.50;
			$fare+=($TotalDistance-10)*14.0;
		}
		else if($TotalDistance>60 && $TotalDistance<=160){
			$fare+=(10*15.50)+(50*14.0);
			$fare+=($TotalDistance-60)*12.20;
		}
		else{
			$fare+=(10*15.50)+(50*14.0)+(100*12.20);
			$fare+=($TotalDistance-160)*10.50;
		}
		// echo $fare;
	}

	else{
		$fare+=250;
		if($TotalDistance<=10){
			$fare+=$TotalDistance*16.50;
		}
		else if($TotalDistance>10 && $TotalDistance<=60){
			$fare+=10*16.50;
			$fare+=($TotalDistance-10)*15.0;
		}
		else if($TotalDistance>60 && $TotalDistance<=160){
			$fare+=(10*16.50)+(50*15.0);
			$fare+=($TotalDistance-60)*13.20;
		}
		else{
			$fare+=(10*16.50)+(50*15.0)+(100*13.20);
			$fare+=($TotalDistance-160)*11.50;
		}
		 
	}
	// echo $fare;
if($cabtype != "CedSUV")
{
	if($luggage != ""){
	if($luggage ==0){
		$fare+=0;
	}
	else if($luggage >0 && $luggage <=10 ){
		$fare+=50;
	}
	else if ($luggage >10 && $luggage <=20) {
		$fare+=100;
	}
	else{
		$fare+=200;
	}

	echo $fare;
	}
	else{
	echo $fare;
	}
}
else{
	if($luggage != ""){
	if($luggage ==0){
		$fare+=0;
	}
	else if($luggage >0 && $luggage <=10 ){
		$fare+=100;
	}
	else if ($luggage >10 && $luggage <=20) {
		$fare+=200;
	}
	else{
		$fare+=400;
	}

	echo $fare;
	}
	else{
	echo $fare;
	}
}

?>





 