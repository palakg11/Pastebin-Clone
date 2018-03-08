<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<input type="hidden" value="<?php echo $uniqstr; ?>" name = "deli">
	<input type="submit" name="delete" value="Delete">
</form>