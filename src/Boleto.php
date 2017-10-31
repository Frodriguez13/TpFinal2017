<?php

namespace TpFinal;

class Boleto {
 
    protected $dia;
    protected $tipoBoleto;
    protected $saldo;
    protected $id;
    protected $lineaVehiculo;
    
    public function __construct($a, $b, $c, $d, $e) {
        $this->dia = $d;
        $this->tipoBoleto = $a;
        $this->saldo = $b;
        $this->id = $e;
        $this->lineaVehiculo = $c;
    }
