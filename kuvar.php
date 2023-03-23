<?php

class Kuvar
{
    public $id_kuvar;
    public $ime_kuvar;
    public $prezime_kuvar;
    public $datum_rodjenja;
    public $grad;
    public $specijalnost;

    public function __construct($id_kuvar = null, $ime_kuvar = null, $prezime_kuvar = null, $datum_rodjenja = null, $grad = null, $specijalnost = null)
    {
        $this->id_kuvar = $id_kuvar;
        $this->ime_kuvar = $ime_kuvar;
        $this->prezime_kuvar = $prezime_kuvar;
        $this->datum_rodjenja = $datum_rodjenja;
        $this->grad = $grad;
        $this->specijalnost = $specijalnost;
    }

    public static function getAll(Mysqli $conn)
    {
        $query = "SELECT * FROM kuvar";
        $rs =  $conn->query($query);

        $niz = [];

        while ($red = $rs->fetch_object()){
            $niz[] = new Kuvar($red->id_kuvar,$red->ime_kuvar, $red->prezime_kuvar, $red->datum_rodjenja, $red->grad, $red->specijalnost);
        }

        return $niz;

    }

}