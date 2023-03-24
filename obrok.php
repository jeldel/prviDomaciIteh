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
        $query = "INSERT INTO obrok(naziv_obroka,cena,sastojci,id_kuvar) VALUES ('$obrok->naziv_obroka','$obrok->cena','$obrok->sastojci','$obrok->id_kuvar')";
        return mysqli_query($conn, $query);
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM obrok o JOIN kuvar k ON o.id_kuvar = k.id_kuvar";
        return mysqli_query($conn, $query);
    }

    public static function deleteByRB($rb, mysqli $conn)
    {
        $query = "DELETE FROM obrok WHERE redni_broj = $rb";
        return mysqli_query($conn, $query);
    }

    public static function update(Obrok $obrok, mysqli $conn)
    {
        $query = "UPDATE obrok SET naziv_obroka = '$obrok->naziv_obroka' , cena = $obrok->cena ,sastojci = '$obrok->sastojci', id_kuvar = $obrok->id_kuvar WHERE redni_broj = $obrok->redni_broj";
        return mysqli_query($conn, $query);
    }

    public static function getOne($rb, mysqli $conn)
    {
        $query = "SELECT * FROM obrok o JOIN kuvar k ON o.id_kuvar = k.id_kuvar WHERE redni_broj = $rb";
        $rs = $conn->query($query);

        //ovo ovde mi ne radi
        while($red = $rs->fetch_object()){
            return $red;
        }

        return null;
    }


    public static function getAllSortedAndSearched($conn, $kuvar, $sortiranje)
    {
        $query = "SELECT * FROM obrok o JOIN kuvar k ON o.id_kuvar = k.id_kuvar";

        if($kuvar != 0){
            $query .= " WHERE o.id_kuvar = " . $kuvar;
        }

        $query .= " ORDER BY o.cena " . $sortiranje;

        $rs =  $conn->query($query);

        $niz = [];

        while ($red = $rs->fetch_object()){
            $niz[] = $red;
        }

        return $niz;
    }
}

?>