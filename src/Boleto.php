<?php

namespace TpFinal;

class Boleto {
 
    protected $dia;
    protected $tipoBoleto;
    protected $saldo;
    protected $lineaVehiculo;
    
    public function __construct($a, $b, $c, $d) {
        $this->dia = $d;
        $this->tipoBoleto = $a;
        $this->saldo = $b;
        $this->lineaVehiculo = $c;
    }
 
    public function obtenerBoleto(){
          return $this->tipoBoleto;
       }
       public function obtenerSaldo(){
          return $this->saldo;
       }
       public function obtenerLinea(){
          return $this->lineaVehiculo;
       }
       public function obtenerFecha() {
           return $this->dia;
       }
}
