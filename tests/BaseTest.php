<?php
namespace kenum\Tests {
    class BaseTest extends kenumTestCase {
        function testInheritance() {
            $bar = new Mock\BarEnum();
            
            $const = $bar->getConstants();
            
            $this->assertEquals(6,count($const));
        }
        
        function testBaseValueMutator() {
            $fooEnum = new Mock\FooEnum();
            
            $fooEnum->value(Mock\FooEnum::Option1);
            
            $value = $fooEnum->value();
            
            $this->assertEquals('option_1',$value);
        }
        
        function testBaseEquality() {
            $fooEnum1 = new Mock\FooEnum();
            
            $fooEnum1->value(Mock\FooEnum::Option1);
            
            $fooEnum2 = new Mock\FooEnum();
            
            $fooEnum2->value(Mock\FooEnum::Option1);
            
            $equals = $fooEnum1->equals($fooEnum2);
            
            $this->assertEquals(true,$equals);
        }
        
        function testBaseState() {
            $fooEnum1 = new Mock\FooEnum();
            
            $fooEnum1->value(Mock\FooEnum::Option1);
            
            $state = $fooEnum1->isEnumState(Mock\FooEnum::Option1);
            
            $this->assertEquals(true,$state);
        }
        
        function testBaseStringConversion() {
            $fooEnum1 = new Mock\FooEnum();
            
            $fooEnum1->value(Mock\FooEnum::Option1);
            
            $value = (string)$fooEnum1;
            
            $this->assertEquals('Option1',$value);
        }
    }
}