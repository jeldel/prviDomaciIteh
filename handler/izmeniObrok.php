<?php
require "../db.php";
require "../obrok.php";

$redni_broj = trim($_POST['redni_broj']);
$naziv_obroka = trim($_POST['naziv_obroka']);
$cena = trim($_POST['cena']);
$sastojci = trim($_POST['sastojci']);
$id_kuvar = trim($_POST['id_kuvar']);

$obrok = new Obrok($redni_broj,$naziv_obroka, $cena, $sastojci, $id_kuvar);

if(Obrok::update($obrok, $conn)){
    header("Location: ../index.php?poruka=Uspešno ažuriran obrok");
}else{
    header("Location: ../index.php?poruka=Neuspešno ažuriran obrok");
}

?>