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
        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#dodajObrokModal"> <!--target i id moraju da imaju isti naziv-->
            Dodaj novi obrok
        </button>
    </div>


    <!-- Modal za dodavanje novih obroka -->
    <div class="modal fade" id="dodajObrokModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Novi obrok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nazivObroka" class="form-label"> Naziv obroka </label>
                        <input type="text" class="form-control" id="nazivObroka">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cenaObroka" class="form-label"> Cena </label>
                        <input type="text" class="form-control" id="cenaObroka" >
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="sastojci" class="form-label"> Sastojci </label>
                        <input type="text" class="form-control" id="sastojci" >
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idKuvar" class="form-label"> ID kuvara </label>
                        <input type="text" class="form-control" id="idKuvar" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Sačuvaj</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>