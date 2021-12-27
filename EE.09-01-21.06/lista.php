<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lista przyjaciół</title>
	<link href="styl.css" rel="stylesheet">
</head>
<body>
	<div class="baner">
		<h1>Portal Społecznościowy - moje konto</h1>
	</div>
	<div class="glowny">
		<h2>Moje zainteresowania</h2>
		<ul>
			<li>muzyka</li>
			<li>film</li>
			<li>komputery</li>
		</ul>
		<h2>Moi znajomi</h2>
		<?php
			skrypt();
		?>
	</div>
	<footer class="flex">
		<div class="stopka">
			Stronę wykonał: 00000000000
		</div>
		<div class="stopka">
			<a href="mailto:ja@adres.pl">napisz do mnie</a>
		</div>
	</footer>
	<?php
		function skrypt() {
			$conn = mysqli_connect("localhost", "root", "", "dane");
			$sql = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE hobby_id=1 OR hobby_id=2 OR hobby_id=6";
			
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_row($result)) {
				echo "<div class='flex'>";
				echo "<img src='{$row["3"]}' alt='przyjaciel'>";
				echo "<div class='opis'>
				<h3>{$row['0']} {$row['1']}</h3>
				<p>Ostatni wpis: {$row['2']}</p>
				</div>";
				echo "</div>";
				echo "<hr>";
				
			};
			
			mysqli_close($conn);
		};
	?>
</body>
</html>