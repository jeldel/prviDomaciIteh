<?php
require '../db.php';
require '../kuvar.php';

$nizKuvara = Kuvar::getAll($conn);

foreach ($nizKuvara as $kuvar){
    ?>

    <option value="<?= $kuvar->id_kuvar ?>"><?= $kuvar->ime_kuvar . " " . $kuvar->prezime_kuvar ?></option>

<?php
}
?>