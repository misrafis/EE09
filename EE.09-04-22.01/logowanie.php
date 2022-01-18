<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forum o psach</title>
		<link rel="stylesheet" href="styl4.css">
	</head>
	
	<body>
		<header class="baner">
			<h1>Forum wielbicieli psów</h1>
		</header>
		
		<div class="flex">
			<section class="lewy">
				<img src="obraz.jpg" alt="foksterier">
			</section>
		
			<div class="flex flex-dir-col">
				<section class="prawy">
					<h2>Zapisz się</h2>
					<form method="POST" action="logowanie.php">
						<label>login: <input type="text" name="login"></label><br>
						<label>hasło: <input type="password" name="haslo1"></label><br>
						<label>powtórz hasło: <input type="password" name="haslo2"></label><br>
						<input type="submit" value="Zapisz">
					</form>
					<?php
						$conn = mysqli_connect("localhost", "root", "", "psy");
						
						if(!empty($_POST['login']) && !empty($_POST['haslo1']) && !empty($_POST['haslo2'])) {
							$login = $_POST['login'];
							$haslo1 = $_POST['haslo1'];
							$haslo2 = $_POST['haslo2'];
							$blad = 0;
							
							$sql1 = "SELECT login FROM uzytkownicy;";
							$res = mysqli_query($conn, $sql1);
							
							while($row = mysqli_fetch_assoc($res)) {
								if($row['login'] == $login) {
									echo "<p>login występuje w bazie danych, konto nie został dodane</p>";
									$blad = 1;
									break;
								};
							};
							
							if($haslo1 != $haslo2) {
								echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
								$blad = 1;
							};
							
							if($blad == 0) {
								$hash = sha1($haslo1);
								$sql2 = "INSERT INTO uzytkownicy(login, haslo) VALUES('{$login}', '{$hash}');";
								
								mysqli_query($conn, $sql2);
								echo "<p>Konto zostało dodane</p>";
							};
						} else {
							echo "<p>wypełnij wszystkie pola</p>";
						};
						
						mysqli_close($conn);
					?>
				</section>
				<section class="prawy">
					<h2>Zapraszamy wszystkich</h2>
					<ol>
						<li>właścicieli psów</li>
						<li>weterynarzy</li>
						<li>tych, co chcą kupić psa</li>
						<li>tych, co lubią psy</li>
					</ol>
					<a href="regulamin.html">Przeczytaj regulamin forum</a>
				</section>
			</div>
		</div>
		
		<footer class="stopka">
			Stronę wykonał: 00000000000
		</footer>
	</body>
</html>