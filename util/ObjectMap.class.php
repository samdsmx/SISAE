<?php

class ObjectMap {
    
    public static function map ( array $properties, $object){
        $reflect = new ReflectionClass($object);
        $props = $reflect->getProperties();

        foreach ($props as $prop) {
            
            if (array_key_exists($prop->getName (),$properties)){
                $p = $prop->getName ();
                $object->$p = $properties[$prop->getName ()];
            }
        }
        
        return $object;
    }
}