<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Twój wskaźnik BMI</title>
	<link href="styl4.css" rel="stylesheet">
</head>
<body>
	<div class="flex">
	<div class="baner">
		<h2>Oblicz wskaźnik BMI</h2>
	</div>
	<div class="logo">
		<img src="wzor.png" alt="liczymy BMI">
	</div>
	</div>
	<div class="flex">
		<div class="lewy">
			<img src="rys1.png" alt="zrzuć kalorie!">
		</div>
		<div class="prawy">
			<h1>Podaj dane</h1>
			<form method="POST" action="waga.php">
				Waga: <input type="number" name="waga"><br>
				Wzrost [cm]: <input type="number" name="wzrost"><br>
				<input type="submit" value="Licz BMI i zapisz wynik"><br>
				<?php
					skrypt1();
				?>
			</form>
		</div>
	</div>
	<div class="glowny">
		<table>
		<tr>
			<th>lp.</th>
			<th>Interpretacja</th>
			<th>zaczyna się od...</th>
		</tr>
		<?php
				skrypt2();
		?>
		</table>
	</div>
	<div class="stopka">
		Autor: 00000000000 <a href="kw2.jpg">Wynik działania kwerendy 2</a>
	</div>
	<?php
	
		function skrypt1() {
			$conn = mysqli_connect("localhost", "root", "", "egzamin");
			
			if( (!empty($_POST['waga'])) && (!empty($_POST['wzrost'])) ) {
				$waga = $_POST['waga'];
				$wzrost = $_POST['wzrost'];
				$data = date("Y-m-d");
				
				$bmi = 10000*($waga/($wzrost*$wzrost));
				
				echo "Twoja waga: {$waga}; Twój wzrost: {$wzrost}<br>BMI wynosi: {$bmi}";
				
				if($bmi>=0 && $bmi<19) {
					$bmi_id = 1;
				};
				
				if($bmi>=19 && $bmi<26) {
					$bmi_id = 2;
				};
				
				if($bmi>=26 && $bmi<31) {
					$bmi_id = 3;
				};
				
				if($bmi>=31 && $bmi<100) {
					$bmi_id = 4;
				};
				
				$sql = "INSERT INTO wynik(bmi_id, data_pomiaru, wynik) VALUES ({$bmi_id}, '{$data}', {$bmi});";
				
				if($conn) {
					mysqli_query($conn, $sql);
				};
			};
			
			mysqli_close($conn);
		};
		
		function skrypt2() {
			$conn = mysqli_connect("localhost", "root", "", "egzamin");
			$sql = "SELECT id, informacja, wart_min FROM bmi";
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";
				echo "<td>{$row['0']}</td>";
				echo "<td>{$row['1']}</td>";
				echo "<td>{$row['2']}</td>";
				echo "</tr>";
			};
			
			mysqli_close($conn);
		};
	?>
</body>
</html>