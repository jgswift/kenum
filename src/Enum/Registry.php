<?php
namespace kenum\Enum {
    use qtil;
    
    class Registry extends qtil\Access\Registry {
        use qtil\Reflector;
        
        /**
         * local storage of enum constants keyed by uid
         * @var array
         */
        private static $constants = [];
        
        /**
         * Retrieves list of constants on given object
         * @param mixed $object
         * @return array
         */
        public static function getConstants($object) {
            if(is_object($object)) {
                $uid = self::identify($object);
            
                if(!isset(self::$constants[$uid])) {
                    self::$constants[$uid] = self::reflect(get_class($object))->getConstants();
                }
                return self::$constants[$uid];
            } elseif(is_string($object)) {
                $class = $object;
                if(!isset(self::$constants[$class])) {
                    self::$constants[$class] = self::reflect($class)->getConstants();
                }
                return self::$constants[$class];
            }
        }
    }
}
