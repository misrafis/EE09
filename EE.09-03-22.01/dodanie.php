<?php
	$conn = mysqli_connect("localhost", "root", "", "ee09");
	if(isset($_POST['numer']) && isset($_POST['imie_nazwisko1']) && isset($_POST['imie_nazwisko2']) && isset($_POST['imie_nazwisko3'])) {
		$numer_karetki = $_POST['numer'];
		$imie_nazwisko1 = $_POST['imie_nazwisko1'];
		$imie_nazwisko2 = $_POST['imie_nazwisko2'];
		$imie_nazwisko3 = $_POST['imie_nazwisko3'];
		
		$sql = "INSERT INTO ratownicy(nrKaretki, ratownik1, ratownik2, ratownik3) VALUES({$numer_karetki}, '{$imie_nazwisko1}', '{$imie_nazwisko2}', '{$imie_nazwisko3}');";
		
		if($conn) {
			mysqli_query($conn, $sql);
			echo "Do bazy zostało wysłane apytanie: {$sql}";
		};
	};
	mysqli_close($conn);
?>