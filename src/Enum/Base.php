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
            if(!is_null($data)) {
                $this->data = $data;
            }
        }

        /**
         * Checks equality between enums
         * @param Base|integer|string $compare
         * @return boolean
         */
        public function equals($compare) {
            if($compare instanceof kenum\Interfaces\Enum) {
                $compare = $compare->value();
            }
            return ($this->data == $compare) ? true : false;
        }

        /**
         * Retrieve enum raw value or set new enum raw value
         * @param mixed $value
         * @return mixed
         */
        public function value($value = null) {
            if(!is_null($value) && in_array($value,self::values())) {
                $this->data = $value;
            }

            return $this->data;
        }

        /**
         * Builds enum string representation using names
         * @return string
         */
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