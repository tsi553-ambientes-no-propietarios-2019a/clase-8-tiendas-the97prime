<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'tiendas');

if($conn->connect_error) {
	echo 'Existió un error en la conexión ' . $conn->connect_error;
	exit;
}

function redirect($url) {
	header('Location: ' . $url);
	exit;
}

function getProducts($conn) {
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM product
		WHERE user='$user_id'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$products = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$products[] = $row;
			}
		}

		return $products;
}

if ($_SERVER['SCRIPT_NAME'] != '/tiendas/index.php' && $_SERVER['SCRIPT_NAME'] != '/tiendas/php/process_login.php' && $_SERVER['SCRIPT_NAME'] != '/tiendas/php/process_registration.php' && !isset($_SESSION['user'])) {
	redirect($_SERVER["HTTP_HOST"] . 'tiendas/index.php');
} elseif( $_SERVER['SCRIPT_NAME'] == '/tiendas/index.php' && isset($_SESSION['user']) ) {

	redirect($_SERVER["HTTP_HOST"] . 'tiendas/home.php');
}

