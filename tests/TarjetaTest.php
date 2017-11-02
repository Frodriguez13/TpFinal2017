<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {

    public function testSaldo-50() {
        $tarjeta = new Tarjeta();

        $tarjeta->cargarSaldo(50);
        $this->assertEquals($tarjeta->saldo(), 50);
    }
    
    public function testSaldo-332() {
        $tarjeta = new Tarjeta();
        
        $tarjeta->cargarSaldo(332);
        $this->assertEquals($tarjeta->saldo(), 388);   
    }
    
    public function testSaldo-624(){
        $tarjeta = new Tarjeta();
        
        $tarjeta->cargarSaldo(624);
        $this->assertEquals($tarjeta->saldo(), 776); 
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
