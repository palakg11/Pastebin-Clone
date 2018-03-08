<h3>Register with gmail</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name = "mailform">
	Gmail:<input type="text" name="gmail" placeholder="Mail"><br>
	<input type="submit" name="send" value="Go">
</form>
<?php 
$gmail = $checkmail="";
if($_SERVER["REQUEST_METHOD"] === "POST"){
	if(empty($_POST["gmail"]))
		echo "<script>alert('Provide mail adderss')</script>";
	else{		$checkmail = $_POST["gmail"];
	$sql = "select * from userinfo where Email = '$checkmail'";
	$some = $conn->query($sql);
	if(($some->num_rows)===0)
	{
		if((filter_var($_POST["gmail"], FILTER_VALIDATE_EMAIL))&& preg_match('/@gmail.com/',$_POST["gmail"])){
			$gmail=$_POST["gmail"];
		}
		else
			echo "<script>alert('Provide a valid gmail adderss')</script>";
	}
	else {
		echo "<script>alert('Already registered mail adderess')</script>";
	}}
	if(isset($_POST["send"])&&(!empty($gmail))){
		$_SESSION["gmail"] = $gmail;
		include 'mail.php';
	}
	}
?>