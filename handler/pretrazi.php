<?php
require "../db.php";
require "../obrok.php";

$kuvar = $_GET['kuvar'];
$sortiranje = $_GET['sortiranje'];

$nizObroka = Obrok::getAllSortedAndSearched($conn, $kuvar, $sortiranje);

?>
<table id="myTable" class="table table-hover table-striped">
    <thead class="thead">
        <tr>
            <th scope="col">Naziv obroka</th>
            <th scope="col">Cena</th>
            <th scope="col">Sastojci</th>
            <th scope="col">Kuvar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($nizObroka as $obrok) {
        ?>
            <tr>
                <td><?php echo $obrok->naziv_obroka ?></td>
                <td><?php echo $obrok->cena ?></td>
                <td><?php echo $obrok->sastojci ?></td>
                <td><?php echo $obrok->ime_kuvar . " " . $obrok->prezime_kuvar ?></td>
                <td>
                    <a href='izmeni.php?id="<?php echo $obrok->redni_broj ?>"'><button class="btn btn-info">Izmeni</button></a>
                    <a href='handler/obrisiObrok.php?id="<?php echo $obrok->redni_broj ?>"'><button class="btn btn-danger">Obriši</button></a>
                </td>

            </tr>

        <?php
        }
        ?>

    </tbody>
</table>