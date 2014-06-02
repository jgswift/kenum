<?php
namespace kenum\Tests\Mock {
    use kenum;
    
    class FooBitwiseEnum extends kenum\Enum\Bitwise {
        const Option1 = 0x01;
        const Option2 = 0x02;
        const Option3 = 0x04;
        const Option4 = 0x08;
        
        public $data;
    }
}