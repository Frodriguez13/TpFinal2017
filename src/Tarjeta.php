<?php

namespace TpFinal;

class Tarjeta {
    
    protected $saldo = 0;
    protected $diaBici = 0;
    protected $id;
    protected $viajesRealizados = array ();
    protected $ultimoColectivo = 0;
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
    
    public function abonarViaje(Transporte $transporte) {
        if(is_a($transporte->lineaVehiculo, 'bicicleta')) {
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
        else {
            if($this->saldo != 0) {
                $this->diaColectivo = $transporte->dia;
                if($this->ultimoColectivo == $transporte || $this->ultimoColectivo == 0) {
                    $this->saldo=$this->saldo - 9.75;
                    array_unshift($this->viajesRealizados), new Boleto("normal", $this->saldo, $transporte->lineaVehiculo, $this->diaColectivo, $this->id);
                }
                else {
                    if($this->diaColectivo == $transporte->dia) {
                        $this->saldo=$this->saldo - 3.20;
                        array_unshift($this->viajesRealizados), new Boleto("trasbordo", $this->saldo, $transporte->lineaVehiculo, $this->diaColectivo, $this->id);                            $this->ultimoColectivo= $transporte;
                    }
                    else {
                        $this->saldo=$this->saldo - 9.75;
                        array_unshift($this->viajesRealizados), new Boleto("normal", $this->saldo, $transporte->lineaVehiculo, $this->diaColectivo, $this->id);
                    }
                }
            }
        }
    }
}




