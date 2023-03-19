<?php
    require "..//db.php";
    require "..//obrok.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $status = Obrok::deleteByRB($id, $conn);

        $poruka = "";

        if ($status) {
            $poruka = 'Uspešno ste obrisali obrok';
        } else {
            $poruka =  'Došlo je do greške';
        }
    }

    header("Location: ../index.php?poruka=$poruka")
?>