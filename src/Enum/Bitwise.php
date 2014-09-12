<?php
namespace kenum\Enum {
    use kenum,qtil;

    /***
     * Bitwise constants must be defined as integers in multiples of 2
     * const OPTION1 = 0x0001;
     * const OPTION2 = 0x0002;
     * const OPTION3 = 0x0004;
     * const OPTION4 = 0x0008;
     * const OPTION5 ...
     */
    abstract class Bitwise extends Base {
        /**
         * Default enum constructor
         * @param mixed $data
         */
        function __construct($data=null) {
            if(is_numeric($data)) {
                $this->value($data);
            }
        }

        /**
         * Checks if bitwise enum has flag
         * @param mixed $compare
         * @return boolean
         */
        function hasFlag($compare) {
            $property = qtil\Access\Registry::getAccessProperty($this);
            
            return ($this->{$property} & (int)$compare) ? true : false;
        }

        /**
         * adds flag to bitwise enum
         * @param mixed $flag
         * @return \kenum\Enum\Bitwise
         */
        function addFlag($flag) {
            $property = qtil\Access\Registry::getAccessProperty($this);
            
            if(in_array($flag,self::values())) {
                $this->{$property} |= $flag;
            }

            return $this;
        }

        /**
         * removes flag from bitwise enum
         * @param mixed $flag
         * @return \kenum\Enum\Bitwise
         */
        function removeFlag($flag) {
            $property = qtil\Access\Registry::getAccessProperty($this);
            
            if($this->{$property} & (int)$flag) {
                $this->{$property} &= ~$flag;
            }

            return $this;
        }

        /**
         * Default bitwise string conversion method
         * @return string
         */
        public function __toString() {
            $constants = $this->getConstants();

            $results = [];
            
            $property = qtil\Access\Registry::getAccessProperty($this);
            
            foreach( $constants as $name => $flag ) {
                if($this->{$property} & (int)$flag) {
                    $results[] = $name;
                }
            }

            if( count( $results ) > 0 ) {
                return implode(' ', $results);
            }

            return '';
        }
    }
}

