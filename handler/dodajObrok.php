<?php
require "../db.php";
require "../obrok.php";

if(isset($_POST['naziv_obroka']) && isset($_POST['cena']) 
    && isset($_POST['sastojci']) && isset($_POST['id_kuvar'])){
        $obrok = new Obrok(null, $_POST['naziv_obroka'], $_POST['cena'], $_POST['sastojci'], $_POST['id_kuvar']);

        $status = Obrok::add($obrok, $conn);
        //zasto mi vraca failure?
        if ($status){
            echo 'Success';
        }else{
            echo 'Failure';
        }
    }
?>
