<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>piłka nożna</title>
	<link href="styl2.css" rel="stylesheet">
</head>
<body>
	<div class="baner">
		<h3>Reprezentacja polski w piłce nożnej</h3>
		<img src="obraz1.jpg" alt="reprezentacja">
	</div>
	<div class="flex">
		<div class="lewy">
			<form method="POST" action="liga.php">
			<select name="pozycja">
			<option value="1">Bramkarze</option>
			<option value="2">Obrońcy</option>
			<option value="3">Pomocnicy</option>
			<option value="4">Napastnicy</option>
			</select>
			<input type="submit">
			</form>
			<img src="zad2.png" alt="piłka">
			<p>Autor: 00000000000</p>
		</div>
		<div class="prawy">
			<ol>
			<?php
			$conn = mysqli_connect("localhost", "root", "", "baza7");
			
			if(isset($_POST['pozycja'])) {
				$pozycja = $_POST['pozycja'];
				$query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id={$pozycja}";
				$result = mysqli_query($conn, $query);
				
				while($row=mysqli_fetch_row($result)) {
					echo "<li><p>{$row['0']} {$row['1']}</p></li>";
				};
			};
			
			mysqli_close($conn);
			?>
			</ol>
		</div>
	</div>
	<div class="glowny">
		<h3>Liga mistrzów</h3>
	</div>
	<div class="flex">
	<?php
	$conn2 = mysqli_connect("localhost", "root", "", "baza7");
	$query2 = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC";
	$result2 = mysqli_query($conn2, $query2);
	
	while($row2=mysqli_fetch_row($result2)) {
		echo "<div class='liga'>";
		echo "<h2>{$row2['0']}</h2>";
		echo "<h1>{$row2['1']}</h1>";
		echo "<p>grupa: {$row2['2']}</p>";
		echo "</div>";
	};
	
	mysqli_close($conn2);
	?>
	</div>
</body>
</html>
