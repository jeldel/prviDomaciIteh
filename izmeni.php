<?php
require "../Prvi-domaci-iteh/db.php";
require "../Prvi-domaci-iteh/obrok.php";

session_start();

$id = 0;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: index.php?poruka=Id za izmenu nije postavljen");
}

$obrok = Obrok::getOne($id, $conn);

if ($obrok != null) {
    $id = $_GET['id'];
} else {
    header("Location: index.php?poruka=Nije pronadjen obrok po id-u " . $id);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Restoran Štutgart </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="container my-3">
        <h1 class="text-center"> Restoran Štutgart </h1>
    </div>

    <div class="container">
        <div class="row">
            <form method="post" id="izmenaObroka" action="handler/izmeniObrok.php">
                <input type="hidden" value="<?= $obrok->redni_broj ?>" name="redni_broj">
                <div class="col-md-12">
                    <label for="naziv_obroka" class="form-label"> Naziv obroka </label>
                    <input type="text" value="<?= $obrok->naziv_obroka ?>" class="form-control" name="naziv_obroka">
                </div>
                <div class="col-md-12">
                    <label for="cena" class="form-label"> Cena </label>
                    <input type="text" value="<?= $obrok->cena ?>" class="form-control" name="cena">
                </div>
                <div class="col-md-12">
                    <label for="sastojci" class="form-label"> Sastojci </label>
                    <input type="text" value="<?= $obrok->sastojci ?>" class="form-control" name="sastojci">
                </div>
                <div class="col-md-12">
                    <label for="id_kuvar_izmena" class="form-label"> Kuvar </label>
                    <select id="id_kuvar_izmena" name="id_kuvar" class="form-control">

                    </select>
                </div>
                <hr>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="izmenaObroka">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="../Prvi-domaci-iteh/js/main.js"></script>
    <script>
        function ucitajSelectKuvara() {
            $.ajax({
                url: 'handler/ucitajSelectKuvara.php',
                success: function(data) {
                    $("#id_kuvar").html(data);
                    $("#id_kuvar_izmena").html(data);
                    let dodatniPodaci = '<option value="0"> Svi kuvari</option>' + data;

                    $("#kuvarPretraga").html(dodatniPodaci);
                    pretrazi();
                }
            });
        }

        ucitajSelectKuvara();

        function pretrazi() {
            let kuvar = $("#kuvarPretraga").val();
            let sortiranje = $("#sortiranje").val();

            $.ajax({
                url: 'handler/pretrazi.php',
                data: {
                    kuvar: kuvar,
                    sortiranje: sortiranje
                },
                success: function(data) {
                    $("#rezultat").html(data);
                }
            });
        }
    </script>

</body>

</html>