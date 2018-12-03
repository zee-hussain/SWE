<?php

if (isset($_COOKIE["success"])) {
    header("Location: ..");
    die();
}

$host = "localhost";
$user = "root";
$pwd = ""; // Note: PW is clear text!!
$dbs = "cs329e_zah339";

$connect = mysqli_connect ($host, $user, $pwd, $dbs);

if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());
}

// Check if email in use
$username = $_POST['username'];
$result = mysqli_query($connect, "select * from credentials where email = '$username'");
if (mysqli_num_rows($result) > 0) {
    echo "That email is already in use. Please try again.";
    die();
}

// Get most recent ID
$result = mysqli_query($connect, "select max(id) from userinfo");
$id = $result->fetch_row()[0] + 1;
$result->free();

// Add row to userinfo table
$FIRST = $_POST["firstName"];
$LAST = $_POST["lastName"];
$PRICERANGE = $_POST["pricerange"];
$TRANSPORTATION = $_POST["transportation"];

if(isset($_POST['languages'])){
	$LANGUAGE = implode(", ", $_POST['languages']);
}
if(isset($_POST['payments'])){
	$PAYMENT = implode(", ", $_POST['payments']);
}

$query = mysqli_query($connect, "insert into userinfo values ($id, '$FIRST','$LAST','$LANGUAGE','$PRICERANGE','$PAYMENT','$TRANSPORTATION', 4.5)");


// Add row to credentials table
$USER = $_POST["username"];
$PASS = $_POST["password"];

$query1 = mysqli_query($connect, "insert into credentials values ($id, '$USER', '$PASS')");
mysqli_close($connect);

// Set that cookie
setcookie("success", $USER, time() + 86400*1095, "/");

header("Location: ..");
die();
?>
