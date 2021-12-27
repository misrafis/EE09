<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
        <?php
            function skrypt1() {
                $conn = mysqli_connect("localhost", "root", "", "dane3");
                $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id=18 OR id=22 OR id=23 OR id=25";

                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_row($result)) {
                    echo "<div class='film'>";
                    echo "<h4>{$row['0']} {$row['1']}</h4>";
                    echo "<img src='{$row["3"]}' alt='film'>";
                    echo "<p>{$row['2']}</p>";
                    echo "</div>";
                };

                mysqli_close($conn);
            };

            function skrypt2() {
                $conn = mysqli_connect("localhost", "root", "", "dane3");
                $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE rodzaje_id=12";

                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_row($result)) {
                    echo "<div class='film'>";
                    echo "<h4>{$row['0']} {$row['1']}</h4>";
                    echo "<img src='{$row["3"]}' alt='film'>";
                    echo "<p>{$row['2']}</p>";
                    echo "</div>";
                };

                mysqli_close($conn);
            };

            function skrypt3() {
                $conn = mysqli_connect("localhost", "root", "", "baza3");
                if(!empty($_POST["num"])) {
                    $id = $_POST["num"];
                    $sql = "DELETE FROM produkty WHERE id={$id}";

                    mysqli_query($conn, $sql);
                };

                mysqli_close($conn);
            };
           
        ?>
    <header class="flex">
        <div class="baner">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div class="baner">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </header>
    <div class="lista">
        <h3>Polecamy</h3>
        <div class="flex">
        <?php 
            skrypt1();
        ?>
        </div>
    </div>
    <div class="lista">
        <h3>Filmy fantastyczne</h3>
        <div class="flex">
        <?php 
            skrypt2();
        ?>
        </div>
    </div>
    <footer class="stopka">
        <form method="POST" action="video.php">
            Usuń film nr.: <input type="number" name="num">
            <input type="submit" value="Usuń film"><br>
            <?php
                skrypt3();
            ?>
            Stronę wykonał: <a href="mailto:ja@poczta.com">00000000000</a>
        </form>
    </footer>
</body>
</html>