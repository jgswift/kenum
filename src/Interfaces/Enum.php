<?php
namespace kenum\Interfaces {
    interface Enum {
        /**
         * Checks enum equality
         * @param Enum $compare
         */
        public function isEnumState($compare);
    }
}

