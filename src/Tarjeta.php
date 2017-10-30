<?php

namespace TpFinal;

class Tarjeta {
    
    protected saldo = 0;
    protected diaBici = 0;
    protected id;
    
    public function saldo() {
        return $this->saldo;
    }

    public function cargarSaldo($s) {
        if($s==332) {
            $this->saldo = $this->saldo + 388;
        }
        else {
            if($s==624) {
                $this->saldo = $this->saldo + 776;
            }
            else {
                $this->saldo = $this->saldo + $s;
            }
        }
    }
    
    public function sacarBici(Transporte $transporte) {
        if($this->diaBici != $transporte->dia) {
            $this->diaBici = 0;
        }
        if($this->diaBici = 0) {
            if($this->saldo < 12.75) {
                echo "No se puede retirar la bicicleta.";
            }
            else {
                $this->saldo = $this->saldo - 12.75;
                $this->diaBici = $transporte->dia;
                echo "Se ha retirado la bicicleta.";
            }
        }
        else {
            echo "Se ha retirado la bicicleta.";
        }
    }
}


class Transporte {
    
    protected $lineaVehiculo;
    protected $patente;
    protected $hora;
    protected $dia;
    
    public function __construct($a, $b, $c, $d) {
        $this->lineaVehiculo = $a;
        $this->patente = $b;
        $this->hora = $c;
        $this->dia = $d;
    }
    
    public function viaje(Transporte $transporte) {
        $Time=time();
        if(is_a($transporte, 'colectivo') {
            if($this->ultimoColectivo == $transporte || $this->ultimoColectivo==0){
                $this->saldo=$this->saldo - 9.75;
                array_unshift($this->viajesRealizados), new viaje("normal",9.75, $transporte));
            }
            else
            {
                $this->saldo=$this->saldo - 3.20;
                array_unshift($this->viajesRealizados), new viaje("trasbordo",3.20, $transporte));
                $this->ultimoColectivo= $transporte;
            }
        }
    }
}

class Boleto {
    
    protected $dia;
    protected $tipoBoleto;
    protected $saldo;
    protected $id;
    protected $lineaVehiculo;
}
