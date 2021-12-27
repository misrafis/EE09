<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "dane4");
    ?>
    <header class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <main class="flex">
        <div class="lewy">
            <h4>Użytkownicy</h4>
            <?php
            $sql1 = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
            $result1 = mysqli_query($conn, $sql1);

            while($row = mysqli_fetch_row($result1)) {
                $wiek = 2021-($row["3"]);
                echo "{$row['0']}. {$row['1']} {$row['2']}, {$wiek} lat<br>";
            };
            ?>
            <a href="settings.html">Inne ustawienia</a>
        </div>
        <div class="prawy">
            <h4>Podaj id użytkownika</h4>
            <form action="users.php" method="post">
                <input type="number" name="id">
                <input type="submit" value="ZOBACZ" class="przycisk">
            </form>
            <hr>
            <?php
                if(!empty($_POST["id"])) {
                    $id = $_POST["id"];
                    $sql2 = "SELECT osoby.imie, nazwisko, rok_urodzenia, opis, zdjecie, hobby.nazwa FROM osoby JOIN hobby ON osoby.hobby_id=hobby.id WHERE osoby.id={$id}";
                    $result2 = mysqli_query($conn, $sql2);
                    
                    if($row = mysqli_fetch_row($result2)) {
                        echo "<h2>{$id}. {$row['0']} {$row['1']}, {$wiek}</h2>";
                        echo "<img src='{$row["4"]}' alt='{$id}'>";
                        echo "<p>Rok urodzenia: {$row['2']}</p>";
                        echo "<p>Opis: {$row['3']}</p>";
                        echo "<p>Hobby: {$row['5']}</p>";
                    };
                };
            ?>
        </div>
    </main>
    <footer class="stopka">
        Stronę wykonał: 00000000000
    </footer>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>