<html>
<head>
<title> Browse Photographers</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php include "../head-content.html"; ?>
</head>
<body>
<?php include "../navbar.php"; ?>
<div class="container setmax">
<div class="py-5 text-center">
<table class="table mb-3">
	<thead class="burnt-orange">
    	<tr>
      	<th scope="col">Name</th>
      	<th scope="col">Languages</th>
      	<th scope="col">Price Range</th>
      	<th scope="col">Preferred Form of Payment</th>
      	<th scope="col">Transportation</th>
      	<th scope="col">Rating</th>
    	</tr>
    </thead>
<?php

	$host = "localhost";
	$user = "root";
	$pwd = "";
	$dbs = "cs329e_zah339";

	$connect = mysqli_connect ($host, $user, $pwd, $dbs);

	if (empty($connect)) {
  		die("mysqli_connect failed: " . mysqli_connect_error());
	}

	$table = "userinfo";
	$result = mysqli_query($connect, "SELECT firstname, lastname, languages, pricerange, payment, transportation,stars from $table order by firstname;");
	while ($row = $result->fetch_row()) {
		$name = $row[0] . " " . $row[1];
		print "<tr>";
		print "<td><a href='../Profile/generic'>$name</a></td>";
		for ($i = 2; $i < count($row); $i++) {
			print "<td>{$row[$i]}</td>";
		}
		print "</tr>";
	}

	$result->free();

	mysqli_close($connect);
?>
</table>
</div>
</div>
<?php include "../footer.php"; ?>
</body>
</html>
