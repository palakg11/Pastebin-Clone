<form method="post" name = "authform">
	Gmail:<input type="text" name="gmail" value='<?php echo $_SESSION["gmail"]; ?>' readonly><br>
	username:<input type="text" name="username"><br>
	Password:<input type="password" name="pass"><br>
	Retype-Password:<input type="password" name="repass"><br>
	Code:<input type="text" name="code"><br>
	<input type="submit" name="signup" value="SIGNUP">
</form>
<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
	if(empty($_POST["username"]) || empty($_POST["pass"]) || empty($_POST["repass"]) || empty($_POST["code"])){
		echo "<script>alert('incomplete information can't log in!!);</script>";
	}
	else {
		if($_POST["pass"] === $_POST["repass"]){
			if($_POST["code"] == $_SESSION["code"]){
				$user = $_POST["username"];
				$passq = $_POST["pass"];
				$gmaili = $_SESSION["gmail"];
				$insert = "insert into userinfo (Email, Username, Password) values ('$gmaili','$user','$passq')";
				if($conn->query($insert)){
					echo "<script>alert('Registered Successfully');</script>";
					header("Location:Homepage.php");
					/*session_destroy();*/
					exit;
			} echo $conn->error;	}
			else
				echo "<script>alert(incorrect code..);</script>";
		}
		else 
			echo "<script>alert(incorrect password..);</script>";
	}
}
?>