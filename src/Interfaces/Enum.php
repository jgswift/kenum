<?php
namespace kenum\Interfaces {
    interface Enum {
        /**
         * Checks enum equality
         * @param Enum $compare
         */
        public function isEnumState($compare);
        
        /**
         * Alias of isEnumState
         */
        public function equals($compare);
        
        /**
         * Transform enum value into human-readable text
         */
        public function __toString();
    }
}

