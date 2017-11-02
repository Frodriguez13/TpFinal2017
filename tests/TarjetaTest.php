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
        $bici = new bici("123456");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        
        $tarjeta->abonarViaje($bici,'10/07/2017 15:30');
        $this->assertEquals($tarjeta1->saldo(), 38.25);
        //cobra primer viaje en bici
        $tarjeta->abonarViaje($bici,'10/07/2017 15:45');
        $this->assertEquals($tarjeta1->saldo(), 38.25);
        //no cobra otro viaje el mismo dia
    }
}
