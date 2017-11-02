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
          return $this->tipo;
       }
       public function obtenerSaldo(){
          return $this->monto;
       }
       public function obtenerLinea(){
          return $this->transporte;
       }
       public function obtenerFecha() {
           return $this->fecha_y_hora;
       }
