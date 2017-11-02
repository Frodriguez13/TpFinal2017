<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {
    
    public function testSaldo_50() {
        $tarjeta = new Tarjeta();

        $tarjeta->cargarSaldo(50);
        $this->assertEquals($tarjeta->saldo(), 50);
    }
    
    public function testSaldo_332() {
        $tarjeta = new Tarjeta();
        
        $tarjeta->cargarSaldo(332);
        $this->assertEquals($tarjeta->saldo(), 388);   
    }
    
    public function testSaldo_624(){
        $tarjeta = new Tarjeta();
        
        $tarjeta->cargarSaldo(624);
        $this->assertEquals($tarjeta->saldo(), 776); 
    }
    
    public function testBici() {
        $bici = new Bici("123456");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        
        $tarjeta->abonarViaje($bici,'10/07/2017 15:30');
        $this->assertEquals($tarjeta->saldo(), 35.375);
        //cobra primer viaje en bici
        $tarjeta->abonarViaje($bici,'10/07/2017 15:45');
        $this->assertEquals($tarjeta->saldo(), 35.375);
        //no cobra otro viaje el mismo dia
    }
    
    public function test_1_Viaje() {
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        $bondi = new Colectivo(156);
        
        $tarjeta->abonarViaje($this->bondi,'10/07/2017 10:45');
        $this->assertEquals($tarjeta->saldo(), 40.25);          
    }    
}
