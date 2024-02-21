<?php

class Reservation
{
    private $_Nombre_Reservation;
    private $_Tarif_reduit;
    private $_Pass_jour_1;
    private $_Pass_jour_2;
    private $_Pass_jour_3;
    private $_Nombre_casque;
    private $_Nombre_luge;
    private $_Emplacement_tente;
    private $_Emplacement_camion;

    public function __construct(int $Nombre_Reservation, bool $Tarif_reduit, $Pass_jour_1, $Pass_jour_2, $Pass_jour_3, $Nombre_casque, $Nombre_luge, $Emplacement_tente, $Emplacement_camion)
    {
        $this->setNombre_Reservation($Nombre_Reservation);
        $this->setTarif_reduit($Tarif_reduit);
        $this->setPass_jour_1($Pass_jour_1);
        $this->setPass_jour_2($Pass_jour_2);
        $this->setPass_jour_3($Pass_jour_3);
        $this->setNombre_casque($Nombre_casque);
        $this->setNombre_luge($Nombre_luge);
        $this->setEmplacement_tente($Emplacement_tente);
        $this->setEmplacement_camion($Emplacement_camion);
    }

    function getNombre_Reservation()
    {
        return $this->_Nombre_Reservation;
    }
    function setNombre_Reservation($Nombre_Reservation)
    {
        $this->_Nombre_Reservation = $Nombre_Reservation;
    }
    function getTarif_reduit()
    {
        return $this->_Tarif_reduit;
    }
    function setTarif_reduit($Tarif_reduit)
    {
        $this->_Tarif_reduit = $Tarif_reduit;
    }
    function getPass_jour_1()
    {
        return $this->_Pass_jour_1;
    }
    function setPass_jour_1($Pass_jour_1)
    {
        $this->_Pass_jour_1 = $Pass_jour_1;
    }
    function getPass_jour_2()
    {
        return $this->_Pass_jour_2;
    }
    function setPass_jour_2($Pass_jour_2)
    {
        $this->_Pass_jour_2 = $Pass_jour_2;
    }
    function getPass_jour_3()
    {
        return $this->_Pass_jour_3;
    }
    function setPass_jour_3($Pass_jour_3)
    {
        $this->_Pass_jour_3 = $Pass_jour_3;
    }
    function getNombre_casque()
    {
        return $this->_Nombre_casque;
    }
    function setNombre_casque($Nombre_casque)
    {
        $this->_Nombre_casque = $Nombre_casque;
    }
    function getNombre_luge()
    {
        return $this->_Nombre_luge;
    }
    function setNombre_luge($Nombre_luge)
    {
        $this->_Nombre_luge = $Nombre_luge;
    }
    function getEmplacement_tente()
    {
        return $this->_Emplacement_tente;
    }
    function setEmplacement_tente($Emplacement_tente)
    {
        $this->_Emplacement_tente = $Emplacement_tente;
    }
    function getEmplacement_camion()
    {
        return $this->_Emplacement_camion;
    }
    function setEmplacement_camion($Emplacement_camion)
    {
        $this->_Emplacement_camion = $Emplacement_camion;
    }
}
