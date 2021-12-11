<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rozgrywki futbolowe</title>
	<link href="styl.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="baner">
		<h2>Światowe rozgrywki piłkarskie</h2>
		<img src="obraz1.jpg" alt="boisko">
	</div>
	<div class="flex">
			<?php
				$pol = mysqli_connect("localhost", "root", "", "baza6");
				$zap = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG'";
				$wynik = mysqli_query($pol, $zap);
				
				while($row = mysqli_fetch_row($wynik)) {
					echo "<div class='mecz'>";
					echo "<h3>{$row['0']} - {$row['1']}</h3>";
					echo "<h4>{$row['2']}</h4>";
					echo "<p>w dniu: {$row['3']}</p>";
					echo "</div>";
				};
				mysqli_close($pol);
			?>
	</div>
	<div class="glowny">
		<h2>Reprezentacja Polski</h2>
	</div>
	<div class="flex">
		<div class="lewy">
			<p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
			<form method="POST" action="futbol.php">
			<input type="number" name="pozycja">
			<input type="submit" value="Sprawdź">
			<ul>
				<?php
					$pol2 = mysqli_connect("localhost", "root", "", "baza6");
				
					if(isset($_POST['pozycja']) && $_POST['pozycja'] != "") {
						$pozycja = $_POST['pozycja'];
						$zap2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id={$pozycja}";
						$wynik2 = mysqli_query($pol2, $zap2);
						
						while($row2 = mysqli_fetch_row($wynik2)) {
							echo "<li>";
							echo "<p>{$row2['0']} {$row2['1']}</p>";
							echo "<p></p>";
							echo "</li>";
						};
						
					};
					mysqli_close($pol2);
				?>
			</ul>
			</form>
		</div>
		<div class="prawy">
			<img src="zad1.png" alt="piłkarz">
			<p>Autor: 00000000000</p>
		</div>
	</div>
</body>
</html>