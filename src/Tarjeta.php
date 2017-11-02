<?php

namespace TpFinal;

class Tarjeta {
    
    protected $saldo = 0;
    protected $diaBici = 0;
    protected $viajesRealizados = array ();
    protected $ultimoBondi = 0;
    protected $diaColectivo = 0;
    
    
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
        $primeraFecha = $fecha;
        $fecha = strtotime($fecha);
        if(get_class($transporte) == 'colectivo') {
            if($this->saldo >= 9.75) {
                if($this->ultimoBondi == $transporte || $this->ultimoBondi == 0) {
                        $this->saldo=$this->saldo - 9.75;
                        array_unshift($this->viajesRealizados), new Boleto("normal", 9.75, $transporte->lineaVehiculo, $primeraFecha);)
                }
                else {
                    if($this->ultimoBondi->obtenerLinea() != $transporte->obtenerLinea() && ($fecha-$this->dia)<3600 ) {
                        $this->saldo = $this->saldo - 3.20;
                        array_unshift($this->viajes_realizados, new Boleto("trasbordo", 3.20, $Transporte->obtenerLinea(),$primeraFecha));
                        $this->ultimoBondi = $transporte;
                    }
                }
            }
            else {
                print ("No tiene saldo suficiente");
            }
