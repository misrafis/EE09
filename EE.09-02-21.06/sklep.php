<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Warzywniak</title>
	<link href="styl3.css" rel="stylesheet">
</head>
<body>
	<?php
		function skrypt1() {
			$conn = mysqli_connect("localhost", "root", "", "dane2");
			$sql = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE rodzaje_id=1 OR rodzaje_id=2";
			
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_row($result)) {
				echo "<div class='produkt'>";
				echo "<img src='{$row["4"]}'>";
				echo "<h5>{$row['0']}</h5>";
				echo "<p>opis: {$row['2']}</p>";
				echo "<p>na stanie: {$row['1']}</p>";
				echo "<h2>{$row['3']} zł</h2>";
				echo "</div>";
			};
			mysqli_close($conn);
		};
		
		function skrypt2() {
			$conn = mysqli_connect("localhost", "root", "", "dane2");
			if(!empty($_POST["nazwa"]) && !empty($_POST["cena"])) {
				$nazwa = $_POST["nazwa"];
				$cena = $_POST["cena"];
				$sql = "INSERT INTO produkty(rodzaje_id, producenci_id, nazwa, ilosc, opis, cena, zdjecie) VALUES (1, 4, '{$nazwa}', 10, '', {$cena}, 'owoce.jpg')";
				if($conn) {
					mysqli_query($conn, $sql);
				};
			};
			mysqli_close($conn);
		};
	?>
	<header class="flex">
	<div class="baner">
		<h1>Internetowy sklep z eko-warzywami</h1>
	</div>
	<div class="baner">
		<ol>
			<li>warzywa</li>
			<li>owoce</li>
			<li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
		</ol>
	</div>
	</header>
	<main class="flex">
	<?php
		skrypt1();
	?>
	</main>
	<footer>
	<form method="POST" action="sklep.php">
	Nazwa: <input type="text" name="nazwa">
	Cena: <input type="number" name="cena">
	<input type="submit" value="Dodaj produkt"><br>
	Stronę wykonał: 00000000000
	<?php
		skrypt2();
	?>
	</form>
	</footer>
</body>
</html>