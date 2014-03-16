<?php
namespace kenum\Tests {
    class Bitwise extends kenumTestCase {
        function testBitwiseEquality() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum2 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum2->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $equals = $fooBitwiseEnum1->equals($fooBitwiseEnum2);
            
            $this->assertEquals(true,$equals);
        }
        
        function testBitwiseFlagCheck() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option2);
            
            $hasFlag = $fooBitwiseEnum1->hasFlag(Mock\FooBitwiseEnum::Option2);
            
            $this->assertEquals(true,$hasFlag);
        }
        
        function testBitwiseFlagChange() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option2);
            
            $equals = $fooBitwiseEnum1->equals(Mock\FooBitwiseEnum::Option1 | Mock\FooBitwiseEnum::Option2);
            
            $this->assertEquals(true,$equals);
        }
        
        function testBitwiseFlagRemove() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option2);
            
            $fooBitwiseEnum1->removeFlag(Mock\FooBitwiseEnum::Option1);
            
            $equals = $fooBitwiseEnum1->equals(Mock\FooBitwiseEnum::Option2);
            
            $this->assertEquals(true,$equals);
        }
        
        function testBitwiseStringConversion() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option2);
            
            $value = (string)$fooBitwiseEnum1;
            
            $this->assertEquals('Option1 Option2',$value);
        }
        
        function testBitwiseState() {
            $fooBitwiseEnum1 = new Mock\FooBitwiseEnum();
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option1);
            
            $fooBitwiseEnum1->addFlag(Mock\FooBitwiseEnum::Option2);
            
            $isState = $fooBitwiseEnum1->isEnumState(Mock\FooBitwiseEnum::Option1 | Mock\FooBitwiseEnum::Option2);
            
            $this->assertEquals(true,$isState);
        }
    }
}