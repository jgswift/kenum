<?php
namespace kenum\Enum {
    use kenum,qtil;
    
    abstract class Base implements qtil\Interfaces\Comparable, kenum\Interfaces\Enum {
        use kenum\Enum;

        function __construct($data=null) {
            if(!is_null($data)) {
                $this->data = $data;
            }
        }

        public function equals($compare) {
            if($compare instanceof kenum\Interfaces\Enum) {
                $compare = $compare->value();
            }
            return ($this->data == $compare) ? true : false;
        }

        public function value($value = null) {
            if(!is_null($value) && in_array($value,self::values())) {
                $this->data = $value;
            }

            return $this->data;
        }

        public function __toString() {
            $constants = self::getConstants();

            $results = [];
            foreach($constants as $name => $flag) {
                if($this->data === $flag) {
                    $results[] = $name;
                }
            }

            if(count( $results ) > 0) {
                return implode(' ', $results);
            }

            return '';
        }
    }
}