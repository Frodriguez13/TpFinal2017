<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {

    public function testSaldo() {
        $tarjeta = new Tarjeta();
        $tarjeta1 = new Tarjeta();

        $this->assertEquals($tarjeta->saldo(), 0);
        //saldo de la tarjeta = 0
        $tarjeta->cargarSaldo(50);
        $this->assertEquals($tarjeta->saldo(), 50);
        //cargar $50
        $tarjeta1->cargarSaldo(332);
        $this->assertEquals($tarjeta1->saldo(), 388);
        //cargar $332 y se acreditan $388    
    }
    
    public function testBici() {
        $bici = new Transporte("bicicleta", "123456", "4 de mayo");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        
        $tarjeta->abonarViaje($bici);
        $this->assertEquals($tarjeta1->saldo(), 38.25);
        //cobra primer viaje en bici
        $tarjeta->abonarViaje($bici);
        $this->assertEquals($tarjeta1->saldo(), 38.25);
        //no cobra otro viaje el mismo dia
    }
}
