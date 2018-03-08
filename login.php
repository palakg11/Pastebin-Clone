<?php 
	if ($_SERVER["REQUEST_METHOD"] === "POST"){
		if(!empty($_POST["username"]) && !empty($_POST["pass1"]) && isset($_POST["login"])){
			$user = $_POST["username"];
			$pass = $_POST["pass1"];
			$check = "select Password from userinfo where Username ='$user'";
			$check1 = $conn->query($check);
			$check2 = $check1->fetch_assoc();
			var_dump($check2);
			die();
			if($check2["Password"] === $pass){
				$_SESSION["admin"] = $user;
				header("Location: paste.php");
				die();
			}
			else {
				$passerr = "Incorrect Password";
				echo "<script>alert('Incorrect Email or Password');</script>";
				header("Location:Homepage.php");
				die();
			}
		}
	}	
?>