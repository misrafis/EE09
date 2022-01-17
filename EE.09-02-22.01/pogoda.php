<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Prognoza pogody Wrocław</title>
		<link rel="stylesheet" href="styl2.css">
	</head>
	<body>
		<header class="flex">
			<div class="baner__lewy">
				<img src="logo.png" alt="meteo">
			</div>
			<div class="baner__srodkowy">
				<h1>Prognoza dla Wrocławia</h1>
			</div>
			<div class="baner__prawy">
				<p>maj, 2019 r.</p>
			</div>
		</header>
		
		<main class="glowny">
			<table>
				<tr>
					<th>DATA</th>
					<th>TEMPERATURA W NOCY</th>
					<th>TEMPERATURA W DZIEŃ</th>
					<th>OPADY [mm/h]</th>
					<th>CIŚNIENIE [hPa]</th>
				</tr>
				<?php 
					$conn = mysqli_connect("localhost", "root", "", "prognoza");
					$sql = "SELECT * FROM pogoda WHERE miasta_id=1 ORDER BY data_prognozy ASC;";
					$res = mysqli_query($conn, $sql);
					
					if($conn) {
						while($row = mysqli_fetch_row($res)) {
							echo "<tr>";
							echo "<td> {$row['2']} </td>";
							echo "<td> {$row['3']} </td>";
							echo "<td> {$row['4']} </td>";
							echo "<td> {$row['5']} </td>";
							echo "<td> {$row['6']} </td>";
							echo "</tr>";
						};
					};
					
					mysqli_close($conn);
				?>
			</table>
		</main>
		
		<section class="flex">
			<article class="lewy">
				<img src="obraz.jpg" alt="Polska, Wrocław">
			</article>
			<article class="prawy">
				<a href="kwerendy.txt">Pobierz kwerendy</a>
			</article>
		</section>
		
		<footer class="stopka">
			<p>Stronę wykonał: 00000000000</p>
		</footer>
	</body>
</html>