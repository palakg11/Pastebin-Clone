<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PASTEBIN</title>
	<link rel="stylesheet" type="text/css" href="Style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Style/Homepage.css">
</head>
<body>
	<?php 
	require_once 'connection.php';
	require_once 'autodelete.php';
	require_once 'login.php';
	require_once 'publicpost.php';
	$user=$pass=$passerr=""; 
	?>
	<h1 class="display-3">PasteBin</h1>
	<div class="login">
		<form class="loginform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<span>Username:</span> <input type="text" name="username" placeholder="Name....">
			<span>Password:</span> <input type="Password" name="pass1" placeholder="Password...">
			<input type="submit" name="login" value="login">
		</form>
	</div>
	<div class="postarea">
		<div class="signup">
			<?php include 'signup.php'; ?>
		</div>
		<div class="publicpastes">
			<h2>Posts</h2>
			<table class = "table">
				<?php
				while($pastepost=$publicpost->fetch_assoc()) {
					if($pastepost["Publicposts"]!=NULL){
						$content = '<tr>
						<td>'.$pastepost["Username"].'</td>
						<td>'.$pastepost["Publicposts"].'</td>
					</tr>
					';
					echo $content;
				}
			}
			?>
		</table>
	</div>
</div>
</body>
</html>