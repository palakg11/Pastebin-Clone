<?php 
	include 'publicpost.php';
	$currentdate = date("Y-m-d H:i:s");
	$link = $uniqstr=$oldtime="";
	for($i=0;$displayi2=$publicpost->fetch_assoc();$i++){
			$oldtime = $displayi2["Date"];
			$start_date = new DateTime($oldtime);
			$since_start = $start_date->diff(new DateTime($currentdate));
		if(($since_start->d)>=1){
			$timeover = "delete from userpaste where Date = '$oldtime'";
			$conn->query($timeover);
		}
	}
?>