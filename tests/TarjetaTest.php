<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {

    /**
     * Comprueba que el saldo de una tarjeta nueva sea cero.
     */
    public function testSaldoCero() {
        $tarjeta = new Tarjeta;
        $tarjeta1 = new Tarjeta;

        $this->assertEquals($tarjeta->saldo(), 0);
        $tarjeta->cargarSaldo(50);
        $this->assertEquals($tarjeta->saldo(), 50);
        $tarjeta1->cargarSaldo(332);
        $this->assertEquals($tarjeta1->saldo(),388);
    }
    public function testTransporte() {
        
}
