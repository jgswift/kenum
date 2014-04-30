<?php
namespace kenum\Enum {
    use kenum,qtil;
    
    abstract class Base implements qtil\Interfaces\Comparable, kenum\Interfaces\Enum {
        use kenum\Enum;
        
        /**
         * Default constructor for base enum
         * @param mixed $data
         */
        function __construct($data=null) {
            $property = Registry::getAccessProperty($this);
            
            if(!is_null($data)) {
                $this->{$property} = $data;
            }
        }

        /**
         * Checks equality between enums
         * @param Base|integer|string $compare
         * @return boolean
         */
        public function equals($compare) {
            $property = Registry::getAccessProperty($this);
            if($compare instanceof kenum\Interfaces\Enum) {
                $compare = $compare->value();
            }
            return ($this->{$property} == $compare) ? true : false;
        }

        /**
         * Retrieve enum raw value or set new enum raw value
         * @param mixed $value
         * @return mixed
         */
        public function value($value = null) {
            $property = Registry::getAccessProperty($this);
            if(!is_null($value) && in_array($value,self::values())) {
                $this->{$property} = $value;
            }

            return $this->{$property};
        }

        /**
         * Builds enum string representation using names
         * @return string
         */
        public function __toString() {
            $property = Registry::getAccessProperty($this);
            $constants = self::getConstants();

            $results = [];
            foreach($constants as $name => $flag) {
                if($this->{$property} === $flag) {
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