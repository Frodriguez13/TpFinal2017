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
    
    public function testDosBici() {
        $bici = new Bici("123456");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        
        $tarjeta->abonarViaje($bici,'10/07/2017 15:30');
        //cobra primer viaje en bici
        $tarjeta->abonarViaje($bici,'10/07/2017 15:45');
        $this->assertEquals($tarjeta->saldo(), 35.375);
        //no cobra otro viaje el mismo dia
    }
    
    public function testUnaBici() {
        $bici = new Bici("654321");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        
        $tarjeta->abonarViaje($bici,'10/07/2017 15:45');
        $this->assertEquals($tarjeta->saldo(), 35.375);
    }
    
    public function test_1_Viaje() {
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        $bondi = new colectivo(156);
        
        $tarjeta->abonarViaje($bondi,'10/07/2017 10:45');
        $this->assertEquals($tarjeta->saldo(), 40.25);          
    }
    
    public function test_2_viajes() {
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        $bondi = new colectivo(156);
        
        $tarjeta->abonarViaje($bondi,'10/07/2017 10:45');
        $tarjeta->abonarViaje($bondi,'10/07/2017 10:46');
        $this->assertEquals($tarjeta->saldo(), 30.50); 
    }
    
    public function testTrasbordo() {
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        $bondi = new colectivo(156);
        $bondi2 = new colectivo(132);
        
        $tarjeta->abonarViaje($bondi,'10/07/2017 10:45');
        $tarjeta->abonarViaje($bondi2,'10/07/2017 11:30');
        $this->assertEquals($tarjeta->saldo(), 37.05);
    }
    
    public function testBoleto() {
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(50);
        $bondi = new colectivo(156);    
        
        $tarjeta->abonarViaje($bondi,'10/07/2017 10:45');
        $this->assertEquals($tarjeta->boleto->obtenerBoleto(),"normal");
        $this->assertEquals($tarjeta->boleto->obtenerSaldo(), 9.75);
        $this->assertEquals($tarjeta->boleto->obtenerLinea(), 156);
        $this->assertEquals($tarjeta->boleto->obtenerFecha(),'10/07/2017 10:45');
    }
}
