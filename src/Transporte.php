<?php

namespace TpFinal;

class Transporte {
    
    protected $lineaVehiculo;
    protected $patente;
    protected $dia;
    
    public function __construct($a, $b, $c) {
        $this->lineaVehiculo = $a;
        $this->patente = $b;
        $this->dia = $c;
    }
}
