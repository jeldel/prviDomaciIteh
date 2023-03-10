<?php


class Obrok
{
    public $redni_broj;
    public $naziv_obroka;
    public $cena;
    public $sastojci;
    public $id_kuvar;

    public function __construct($redni_broj = null, $naziv_obroka = null, $cena = null, $sastojci = null, $id_kuvar = null)
    {
        $this->redni_broj = $redni_broj;
        $this->naziv_obroka = $naziv_obroka;
        $this->cena = $cena;
        $this->sastojci = $sastojci;
        $this->id_kuvar = $id_kuvar;
    }

    public static function add(Obrok $obrok, mysqli $conn)
    {
        $query = "INSERT INTO obrok(naziv_obroka,cena,sastojci,id_kuvar) VALUES('$obrok->naziv_obroka','$obrok->cena','$obrok->sastojci','$obrok->id_kuvar')";
        return $conn->query($query);
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM obrok";
        return mysqli_query($conn, $query);
    }
}

?>