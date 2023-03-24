<?php
require "../Prvi-domaci-iteh/db.php";
require "../Prvi-domaci-iteh/obrok.php";

session_start();

$poruka = "";

if (isset($_GET['poruka'])) {
    $poruka = $_GET['poruka'];
}

$rezultat = Obrok::getAll($conn);


if (!$rezultat) {
    echo "Nastala je greška";
    die();
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

        <?php
        if ($poruka != "") {
        ?>

            <div class="alert alert-info" role="alert">
                <?= $poruka ?>
            </div>
        <?php
        }
        ?>

        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#dodajObrokModal">
            Dodaj novi obrok
        </button>
    </div>

    <div class="container">
        <div id="pregled" class="panel panel-success">

            <div class="row">
                <div class="col-md-6">
                    <label for="kuvarPretraga" class="form-label"> Pretraži po kuvaru </label>
                    <select id="kuvarPretraga" name="kuvarPretraga" class="form-control">

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sortiranje" class="form-label"> Sortiraj po ceni </label>
                    <select id="sortiranje" name="sortiranje" class="form-control">
                        <option value="asc">Rastuće po ceni</option>
                        <option value="desc">Opadajuće po ceni</option>
                    </select>
                </div>

                <hr>
                <div class="col-md-12">
                    <button id="dugme" type="button" onclick="pretrazi()" class="btn btn-primary">Pretraži</button>
                </div>
            </div>

            <hr>
            <div class="col-md-12 panel-body" id="rezultat">

            </div>
        </div>

        <!-- Modal za dodavanje novih obroka -->
        <div class="modal fade" id="dodajObrokModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="noviObrok">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Novi obrok</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="naziv_obroka" class="form-label"> Naziv obroka </label>
                                <input type="text" class="form-control" name="naziv_obroka">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="cena" class="form-label"> Cena </label>
                                <input type="text" class="form-control" name="cena">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="sastojci" class="form-label"> Sastojci </label>
                                <input type="text" class="form-control" name="sastojci">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="id_kuvar" class="form-label"> Kuvar </label>
                                <select id="id_kuvar" name="id_kuvar" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="noviObrok">Sačuvaj</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                        </div>
                    </form>
                </div>
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