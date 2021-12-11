<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Odloty samolotów</title>
	<link href="styl6.css" rel="stylesheet">
</head>
<body>
	<header class="flex">
		<div class="baner">
			<h2>Odloty z lotniska</h2>
		</div>
		<div class="baner"
			<img src="zad6.png" alt="logotyp">
		</div>
	</header>
	
	<main class="glowny">
		<h4>tabela odlotów</h4>
		<table>
			<tr>
			<th>lp.</th>
			<th>numer rejsu</th>
			<th>czas</th>
			<th>kierunek</th>
			<th>status</th>
			</tr>
			<?php
			$conn = mysqli_connect("localhost", "root", "", "baza6");
			$sql = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC";
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";
				echo "<td>{$row['0']}</td>";
				echo "<td>{$row['1']}</td>";
				echo "<td>{$row['2']}</td>";
				echo "<td>{$row['3']}</td>";
				echo "<td>{$row['4']}</td>";
				echo "</tr>";
			};
			mysqli_close($conn);
			?>
		</table>
	</main>
	
	<footer class="flex">
		<div class="stopka">
			<a href="kw1.jpg">Pobierz obraz</a>
		</div>
		<div class="stopka">
		<?php
		if(!isset($_COOKIE["ciastko"])) {
			setcookie("ciastko", "1", time()+3600);
			echo "<p><i>Dzień dobry! Sprawdź regulamin naszej strony</i></p>";
		} else {
			echo "<p><b>Miło nam, że nas znowu odwiedziłeś</b></p>";
		};
		?>
		</div>
		<div class="stopka">
			Autor: 00000000000
		</div>
	</footer>
</body>
</html>