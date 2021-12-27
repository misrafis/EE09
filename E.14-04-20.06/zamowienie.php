<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Sklep</title>
</head>
<body>
    <header class="baner">
        <h1>Ozdoby - sklep</h1>
    </header>

    <main>
        <section class="lewy">
            <h2>OZDOBY</h2>
            <a href="galeria.html">Galeria</a>
            <a href="zamowienie.php">Zamówienie</a>
        </section>

        <section class="srodkowy">
            <p>Dodaj użytkownika</p>
            <form action="zamowienie.php" method="post">
                <label for="">Imię: <input type="text" name="imie" id=""></label><br>
                <label for="">Nazwisko: <input type="text" name="nazwisko" id=""></label><br>
                <label for="">e-mail: <input type="email" name="email" id=""></label><br>
                <button type="submit">WYŚLIJ</button>
            </form>
        </section>

        <section class="prawy">
            <img src="animacja.gif" alt="">
        </section>
    </main>

    <footer class="stopka">
        <h3>Autor strony: 00000000000</h3>
    </footer>

    <?php
        $conn = mysqli_connect("localhost", "root", "", "sklep");
        if (!empty($_POST["imie"]) && !empty($_POST["nazwisko"]) && !empty($_POST["email"])) {
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $email = $_POST["email"];
            $sql = "INSERT INTO zamowienia(imie, nazwisko, adres_email) VALUES ('{$imie}', '{$nazwisko}', '{$email}')";

            mysqli_query($conn, $sql);
            
        }
        mysqli_close($conn);
    ?>
</body>
</html>