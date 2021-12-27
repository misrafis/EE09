<?php
	$lowisko = $_POST["lowisko"];
	$data = $_POST["data"];
	$sedzia = $_POST["sedzia"];

	$polaczenie = mysqli_connect("localhost", "root", "", "wedkarstwo");
	$kwerenda = "INSERT INTO zawody_wedkarskie(Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia)
VALUES (0, '{$lowisko}', '{$data}', '{$sedzia}')";

	$query = mysqli_query($polaczenie, $kwerenda);

	if($query) {
		echo "Rekord dodano poprawnie";
	} else {
		$error = mysqli_error($polaczenie);
		echo "Error: {$kwerenda} <br> {$error}";
	};

	mysqli_close($polaczenie);
?>