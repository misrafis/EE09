<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Twoje BMI</title>
	<link href="styl3.css" rel="stylesheet">
</head>
<body>
	<div class="flex">
		<div class="logo">
			<img src="wzor.png" alt="wzór BMI">
		</div>
		<div class="baner">
			<h1>Oblicz swoje BMI</h1>
		</div>
	</div>
	<div class="glowny">
		<table>
		<tr>
			<th>Interpretacja BMI</th>
			<th>Wartość minimalna</th>
			<th>Wartość maksymalna</th>
		</tr>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "egzamin");
			$zap = "SELECT informacja, wart_min, wart_max FROM bmi";
			$res = mysqli_query($conn, $zap);
			
			while($row = mysqli_fetch_row($res)) {
				echo "<tr>";
				echo "<td>{$row['0']}</td>";
				echo "<td>{$row['1']}</td>";
				echo "<td>{$row['2']}</td>";
				echo "</tr>";
			};
			
			mysqli_close($conn);
		?>
		</table>
	</div>
	<div class="flex">
		<div class="lewy">
			<h2>Podaj wagę i wzrost</h2>
			<form method="POST" action="bmi.php">
			Waga: <input type="number" min="1" name="waga"><br>
			Wzrost w cm: <input type="number" min="1" name="wzrost"><br>
			<input type="submit" value="Oblicz i zapamiętaj wynik">
			</form>
			<?php
				$conn2 = mysqli_connect("localhost", "root", "", "egzamin");
				
				if((isset($_POST['waga']) && $_POST['waga']!="") && (isset($_POST['wzrost']) && $_POST['wzrost']!="")) {
					$waga = $_POST['waga'];
					$wzrost = $_POST['wzrost'];
					
					$bmi = 10000*($waga/($wzrost*$wzrost));
					
					echo "Twoja waga: {$waga}; Twój wzrost: {$wzrost}<br>BMI wynosi: {$bmi}";
					
					if($bmi>0 && $bmi<19) {
						$bmi_id = 1;
					};
					
					if($bmi>19 && $bmi<26) {
						$bmi_id = 2;
					};
					
					if($bmi>26 && $bmi<31) {
						$bmi_id = 3;
					};
					
					if($bmi>31 && $bmi<100) {
						$bmi_id = 4;
					};
					
					$data = date('Y-m-d');
					$zap2 = "INSERT INTO wynik(bmi_id, data_pomiaru, wynik) VALUES ({$bmi_id}, '{$data}', {$bmi})";
					
					mysqli_query($conn2, $zap2);
				};
				
				mysqli_close($conn2);
			?>
		</div>
		<div class="prawy">
			<img src="rys1.png" alt="ćwiczenia">
		</div>
	</div>
	<div class="stopka">
		Autor: 00000000000 <a href="kwerendy.txt">Zobacz kwerendy</a>
	</div>
</body>
</html>