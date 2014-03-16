<?php
namespace kenum\Interfaces {
    interface Flagable {
        /**
         * adds flag
         * @param mixed $flag
         */
        function addFlag($flag);

        /**
         * removes flag
         * @param mixed $flag
         * @return \kenum\Enum\Bitwise
         */
        function removeFlag($flag);
    }
}

