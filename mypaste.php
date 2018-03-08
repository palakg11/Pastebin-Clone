<!DOCTYPE html>
<html>
<head>
	<title>Mypastes</title>
</head>
<body>
	<?php
	require_once ('connection.php');
	require_once ('autodelete.php');
	$string = "";
	$string = $_GET["paste"];
	$mypaste = "";
	$paste12 = "select * from userpaste where Uniquestring = '$string'";
	$pastepost = $conn->query($paste12);
	if(($pastepost->num_rows)!==0){
		while($result=$pastepost->fetch_assoc()){
			if(empty($result["Publicposts"]))
				$mypaste = $result["Privateposts"];
			if(empty($result["Publicposts"]))
				$mypaste = $result["Publicposts"];
		}}
		else 
			echo "<h1>Error 404 Page Not Found</h1>";
		?>
	</body>
	</html>