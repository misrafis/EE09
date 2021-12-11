<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Port Lotniczy</title>
	<link href="styl5.css" rel="stylesheet">
</head>
<body>
	<header class="flex">
		<div class="baner">
			<img src="zad5.png" alt="logo lotnisko">
		</div>
		<div class="baner">
			<h1>Przyloty</h1>
		</div>
		<div class="baner">
			<h3>przydatne linki</h3>
			<a href="kwerendy.txt">Pobierz...</a>
		</div>
	</header>
	
	<main class="glowny">
		<table>
			<tr>
			<th>czas</th>
			<th>kierunek</th>
			<th>numer rejsu</th>
			<th>status</th>
			</tr>
			<?php
			$conn = mysqli_connect("localhost", "root", "", "baza5");
			$sql = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC";
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";
				echo "<td>{$row['0']}</td>";
				echo "<td>{$row['1']}</td>";
				echo "<td>{$row['2']}</td>";
				echo "<td>{$row['3']}</td>";
				echo "</tr>";
			};
			mysqli_close($conn);
			?>
		</table>
	</main>
	
	<footer class="flex">
	<div class="stopka">
		<?php
			if(isset($_COOKIE['ciastko'])) {
				echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
				
			} else {
				setcookie("ciastko", "1", time()+7200);
				echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
			};
		?>
	</div>
	<div class="stopka">
		Autor: 00000000000
	</div>
	</footer>
</body>
</html>