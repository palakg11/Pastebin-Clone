<?php 
function generateRandomString($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateRandomKey(){
	include ('connection.php');
	$key = generateRandomString();
	$exist = "select * from userpaste where Uniquestring ='$key'";
	$xist = $conn->query($exist);
	if($xist->num_rows ===0)
		return $key;
	else
		generateRandomKey();
	$conn->close();
}
?>