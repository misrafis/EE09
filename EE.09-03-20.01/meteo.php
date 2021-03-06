<html>
<head>
	<meta charset="UTF-8">
	<title>Prognoza pogody Poznań</title>
	<link href="styl4.css" rel="stylesheet" type="text/css">
</html>
<body>
	<div class="flex">
		<div class="baner-lewy">
			<p>maj, 2019 r.</p>
		</div>
		<div class="baner-srodkowy">
			<h2>Prognoza dla Poznania</h2>
		</div>
		<div class="baner-prawy">
			<img src="logo.png" alt="prognoza">
		</div>
	</div>
	
	<div class="flex">
		<div class="lewy">
			<a href="kwerendy.txt">Kwerendy</a>
		</div>
		<div class="prawy"><img src="obraz.jpg" alt="Polska, Poznań"></div>
	</div>
	
	<div class="glowny">
		<table>
			<tr>
				<th>Lp.</th>
				<th>DATA</thead>
				<th>NOC - TEMPERATURA</th>
				<th>DZIEŃ - TEMPERATURA</th>
				<th>OPADY [mm/h]</th>
				<th>CIŚNIENIE [hPa]</th>
			</tr>
			<tr>
<?php
	$polaczenie = mysqli_connect("localhost", "root", "", "prognoza");
	$zapytanie = "SELECT * FROM pogoda WHERE miasta_id=2 ORDER BY data_prognozy DESC";
	
	$kwerenda = mysqli_query($polaczenie, $zapytanie);
	
	while($wynik = mysqli_fetch_row($kwerenda)) {
		echo "<tr>";
		echo "<td>{$wynik[0]}</td>";
		echo "<td>{$wynik[2]}</td>";
		echo "<td>{$wynik[3]}</td>";
		echo "<td>{$wynik[4]}</td>";
		echo "<td>{$wynik[5]}</td>";
		echo "<td>{$wynik[6]}</td>";
		echo "</tr>";
	};
	
	mysqli_close($polaczenie);
?>
		</table>
	</div>
	
	<div class="stopka">
		<p>Stronę wykonał: 00000000000</p>
	</div>
</body>
</html>
