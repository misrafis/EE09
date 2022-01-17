<?php
	$conn = mysqli_connect("localhost", "root", "", "wedkowanie");

	if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['adres'])) {
		$imie = $_POST['imie'];
		$nazwisko = $_POST['nazwisko'];
		$adres = $_POST['adres'];
		
		$sql = "INSERT INTO Karty_wedkarskie(imie, nazwisko, adres, data_zezwolenia, punkty) VALUES('{$imie}', '{$nazwisko}', '{$adres}', NULL, NULL);";
		
		if($conn) {
			mysqli_query($conn, $sql);
		};
	};

	mysqli_close($conn);
?>