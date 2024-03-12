<?php
	$db_host = 'localhost';
	$db_username = 'root';
	$db_password = '';
  $db_name = "test";


	// MySQLi connection
	$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);

	// MySQLi error
	if (mysqli_connect_errno()){
		exit('Impossibile connettersi al database'. mysqli_connect_error());
	}

	// Check params presence
	if (!isset($_POST['username'], $_POST['password'])){
		exit('Riempire tutti i campi.');
	}
	if (empty($_POST['username']) || empty($_POST['password'])) {
		alert('Riempire tutti i campi.');
	}


	if ($stmt = $conn->prepare('select id_utente, password from tbl_test where username = ?')){
		// Bind parameters (s = string, i = int, etc)
		$stmt->bind_param('s', $_POST['username']);
		$stmt->execute();
		$stmt->store_result();

		if ($stmt->num_rows > 0) {
			// Username already exists
			echo 'Username exists, please choose another!';
		}
		else {
			if ($stmt = $conn->prepare('insert into tbl(username, password) values(?, ?)')){
				echo "<script>alert('You are now successfully registered! You will be redirected to the login page in 5 seconds.')</script>";
				header('location: ../index/index.html');
			}
			else {
				// Insert error
				echo 'Could not prepare insert query.'. mysqli_error($conn);
			}
		}
		$stmt->close();
	}
	else {
		// Select error
		echo 'Could not prepare select query.'. mysqli_error($conn);
	}
	$conn->close();