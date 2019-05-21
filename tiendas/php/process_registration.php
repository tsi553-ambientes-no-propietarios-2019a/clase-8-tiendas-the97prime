<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['store']) && isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['store']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$store = $_POST['store'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql_insert = "INSERT INTO user
		(store, username, password)
		VALUES ('$store','$username', MD5('$password'))";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../index.php');
		}
	} else {
		redirect('../registration.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../registration.php');
}