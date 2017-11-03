<?php

namespace TpFinal;

include 'Boleto.php';

class colectivo {
    protected $linea;
    
    public function obtenerLinea() {
        return $this->linea;
    }
    
    public function __construct ($linea) {
        $this->linea = $linea;
    }
}

class Bici {
    protected $patente;
    
    public function __construct ($pate) {
        $this->patente = $pate;
    }
    
    public function obtenerPatente() {
        return $this->patente;
    }
}

class Tarjeta { 
    protected $saldo = 0;
    protected $diaBici = 0;
    protected $viajesRealizados = array ();
    protected $ultimoBondi;
    protected $diaColectivo = 0;
    protected $primeraFecha;
    protected $boleto;
    
    public function boleto() {
        return $this->boleto;    
    }
    
    public function saldo() {
        return $this->saldo;
    }

    public function cargarSaldo($carga) {
        if($carga==332) {
            $this->saldo = $this->saldo + 388;
        }
        else {
            if($carga==624) {
                $this->saldo = $this->saldo + 776;
            }
            else {
                $this->saldo = $this->saldo + $carga;
            }
        }
    }
    
    public function abonarViaje($transporte, $fecha) {
        $this->primeraFecha = strtotime($fecha);
        if($transporte instanceof colectivo) {
            if($this->saldo >= 9.75) {
                if($this->ultimoBondi == $transporte || is_null($this->ultimoBondi)) {
                        $this->diaColectivo = $this->primeraFecha;
                        $this->ultimoBondi = $transporte;
                        $this->saldo=$this->saldo - 9.75;
                        array_unshift(($this->viajesRealizados), $this->boleto = new Boleto("normal", 9.75, $transporte->obtenerLinea(), $fecha));
                }
                else {
                    if($this->ultimoBondi->obtenerLinea() != $transporte->obtenerLinea() && ($this->primeraFecha-$this->diaColectivo)<3600 ) {
                        $this->saldo = $this->saldo - 3.20;
                        array_unshift(($this->viajesRealizados), $this->boleto = new Boleto("trasbordo", 3.20, $transporte->obtenerLinea(), $fecha));
                        $this->ultimoBondi = $transporte;
                    }
                }
            }
            else {
                print ("No tiene saldo suficiente");
            }
        }
        else {
            if(($this->primeraFecha-$this->diaBici)<86400) {
                array_unshift(($this->viajesRealizados), $this->boleto = new Boleto("bicicleta", 0.0, $transporte->obtenerPatente(), $fecha));
            }
            else {
                if($this->saldo >= 14.625){
                    $this->saldo = $this->saldo - 14.625;
                    $this->diaBici = $this->primeraFecha;
                    array_unshift(($this->viajesRealizados), $this->boleto = new Boleto("bicicleta", 14.625, $transporte->obtenerPatente(), $fecha));
                }
                else{
                    print ("No tiene saldo suficiente");
                }
            }
        }
    }
}
