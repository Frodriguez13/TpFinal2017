<?php

namespace TpFinal;

include 'Boleto.php';

class Colectivo {
    protected $linea;
    protected $clase;
    
    
    public function obtenerLinea() {
        return $this->linea;
    }
    
    public function __construct ($linea) {
        $this->linea = $linea;
    }
}

class Bici {
    protected $patente;
    
    public function obtenerPatente() {
        return $this->patente;
    }
    
    public function __construct ($patente) {
        $this->patente = $patente;
    }
}

class Tarjeta {
    
    protected $saldo = 0;
    protected $diaBici = 0;
    protected $viajesRealizados = array ();
    protected $ultimoBondi = 0;
    protected $diaColectivo = 0;
    protected $primeraFecha;
    
    
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
        $this->primeraFecha = $fecha;
        $this->primeraFecha = strtotime($fecha);
        if(get_class($transporte) == 'Colectivo') {
            if($this->saldo >= 9.75) {
                if($this->ultimoBondi == $transporte || $this->ultimoBondi == 0) {
                        $this->diaColectivo = $this->primeraFecha;
                        $this->saldo=$this->saldo - 9.75;
                        array_unshift(($this->viajesRealizados), new Boleto("normal", 9.75, $transporte->obtenerLinea(), $this->primeraFecha));
                }
                else {
                    if($this->ultimoBondi->obtenerLinea() != $transporte->obtenerLinea() && ($fecha-$this->diaColectivo)<3600 ) {
                        $this->saldo = $this->saldo - 3.20;
                        array_unshift(($this->viajesRealizados), new Boleto("trasbordo", 3.20, $transporte->ObtenerLinea(), $this->primeraFecha));
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
                array_unshift(($this->viajesRealizados), new Boleto("bicicleta", 0.0, $transporte, $this->primeraFecha));
            }
            else {
                if($this->saldo >= 14.625){
                    $this->saldo = $this->saldo - 14.625;
                    $this->diaBici = $this->primeraFecha;
                    array_unshift(($this->viajesRealizados), new Boleto("bicicleta", 14.625, $transporte->obtenerPatente(),$this->primeraFecha));
                }
                else{
                    print ("No tiene saldo suficiente");
                }
            }
        }
    }
}
