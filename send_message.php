<?php 
function conn(){
    $conn = new mysqli("localhost", "root","", "artisandb");
    return $conn;
}

$conn = conn();
if (isset($_POST)) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
}
echo $sql = "INSERT INTO message (name, email, subject, message) VALUES ('$fname', '$email', '$subject', '$message');";
$conn->query($sql);

header("location: http://localhost/artisan/contact.php?alert=true");
echo "<script>alert('Test');</script>";
exit(0);
?>
