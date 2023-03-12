<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stranica za brisanje obroka</title>
    <link rel="stylesheet" href="../handler/obrisiObrok.css">
</head>

<body>
    <?php
    require "..//db.php";
    require "..//obrok.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $status = Obrok::deleteByRB($id, $conn);

        if ($status){
            echo 'Uspešno ste obrisali obrok';
        } else {
            echo 'Došlo je do greške';
        }
    }
    ?>

    <h3>Vratite se na prethodnu stranicu klikom na dugme ispod:</h3>
    <button id="dugmePovratak" onclick="history.back()">Povratak na prethodnu stranicu</button>
</body>
</html>