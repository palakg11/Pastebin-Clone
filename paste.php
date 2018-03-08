<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PASTEBIN</title>
	<link rel="stylesheet" type="text/css" href="Style/mypastes.css">
	<script type="text/javascript" src = "script.js"></script>
</head>
<body>
	<?php
	include 'connection.php';
	include 'randomstring.php';
	include 'autodelete.php';
	?>
	<h1>Welcome <?php echo $_SESSION["admin"]; ?></h1> 
	<h2><a href = "logout.php">Sign Out</a></h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		Paste:<br>
		<textarea name="paste" rows="20" cols="100%"></textarea>
		<br>
		<input type="submit" name="go" value="Paste"><br>
		Make It Public:
		<label class="switch">
			<input type="checkbox" name="checkbox">
			<span class="slider round"></span>
		</label>
	</form>
	<?php 
	$uniqstr = "";
	$paste1 = $randstring="";
	$owner = $_SESSION["admin"];
	if($_SERVER["REQUEST_METHOD"] === "POST"){
		if(isset($_POST["go"]) && !empty($_POST["paste"]) && !empty($owner)){
			$postpaste = $_POST["paste"];
			$randstring = generateRandomKey();
			if(isset($_POST["checkbox"]))
				$paste1 = "insert into userpaste (Username, Publicposts, uniquestring) values ('$owner' , '$postpaste','$randstring')";
			else 
				$paste1 = "insert into userpaste (Username, Privateposts, uniquestring) values ('$owner' , '$postpaste','$randstring')";
			
			if ($conn->query($paste1) === TRUE) 
				echo "<script>alert('Posted');</script>";
		}
		if(isset($_POST["delete"])){
			$str = $_POST["deli"];
			$del = "delete from userpaste where Uniquestring = '$str'";
			if($conn->query($del))
				echo "<script>alert('Post Deleted');</script>";
		}
	}
	?>
	<br>
	My Pastes:
	<br>
	<?php 
	$display = "select * from userpaste where Username = '$owner'";
	$display1 = $conn->query($display);
	for($i=0;$display2=$display1->fetch_assoc();$i++){
		if(empty($display2["Publicposts"]))
			{	$uniqstr = $display2['Uniquestring'];
		$link = "https://pastebin/mypaste.php?paste=".$display2['Uniquestring'];
		echo "Private-----";
		echo "<span id='bold'>".$display2["Date"]." ".$display2["Privateposts"]."</span>"." "."<button onclick="."'"."alert('".$link."')"."'".";".">".
		"Share"."</button>"."<br>";
	}
	if(empty($display2["Privateposts"]))
		{	$uniqstr = $display2['Uniquestring'];
	$link = "https://pastebin/mypaste.php?paste=".$display2['Uniquestring'];
	echo "Public-----";
	echo "<span id='bold'>".$display2["Date"]." ".$display2["Publicposts"]."</span>"." "."<button id = 'link'>".
	"Share"."</button>"."<br>";	
}
include 'delete.php';
}
	/*echo "document.getElementById('link').addEventListener('click',function(){
		alert(".$link.")";
	}"*/
	/*echo "<script>document.getElementById('link').addEventListener('click',function(){
			alert('".$link."');</script>
			";*/
			?>
		</body>
		</html>