<?php
namespace kenum {
    
    trait Enum {
        /**
         * Retrieves an array of constants defined locally
         * @return array
         */
        public function getConstants() {
            return Enum\Registry::getConstants(get_called_class());
        }

        /**
         * Checks if value is defined in local constants
         * @param mixed $find_value
         * @return boolean
         */
        public function defined($find_value = null) {
            $constants = $this->getConstants();

            foreach ($constants as $value) {
                if (!is_null($find_value) && $value == $find_value) {
                    return true;
                }
            }
            
            return false;
        }

        /**
         * Retrieves the names of local constants
         * @return array
         */
        public function names() {
            return array_keys($this->getConstants());
        }

        /**
         * Retrieves the values of local constants
         * @return array
         */
        public function values() {
            return array_values($this->getConstants());
        }
        
        /**
         * Alias for isEnumState
         * @param mixed $compare
         * @return boolean
         */
        public function equals($compare) {
            return $this->isEnumState($compare);
        }

        /**
         * Checks if enum matches given state
         * @param mixed $compare
         * @return boolean
         */
        public function isEnumState($compare) {
            $property = Enum\Registry::getAccessProperty($this);
            
            if(self::defined($compare)) {
                $constants = $this->getConstants();
                
                $value = $this->{$property};
                
                $constantName = array_search($compare,$constants);
                if($constants[$constantName] === $value) {
                    return true;
                } else {
                    return false;
                }
            }
            
            if($this->{$property} === $compare) {
                return true;
            }
            
            return false;
        }

        /**
         * Helper function to retrieve and set enum value
         * @param mixed $value
         * @return mixed
         */
        public function value($value = null) {
            $property = Enum\Registry::getAccessProperty($this);
            if(is_null($value)) {
                return $this->{$property};
            } else {
                $this->{$property} = $value;
            }

            return $this;
        }

        /**
         * Default method to convert enum to string
         * @return string
         */
        function __toString() {
            $value = $this->value();

            if(is_string($value)) {
                return (string)$value;
            }

            return '';
        }
    }
}